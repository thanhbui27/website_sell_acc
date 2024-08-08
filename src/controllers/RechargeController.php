<?php

namespace Controllers;

use Models\CardModel;
use Models\Category;
use Models\Game;
use Models\Users;

class RechargeController
{
    private $category; 
    private $game;
    private $cardModel;
    private $user;
    public function __construct()
    {
      $this->category = new Category;
      $this->game = new Game;
      $this->cardModel = new CardModel;
      $this -> user = new Users;
    }
    public function rechargeCard()
    {
        if (!isset($_SESSION["user"])) {
            header('location: ' . URLROOT . '/', true, 302);
            return;
        }
        view("profile/rechargeCard");
    }
    public function rechargeBanking()
    {
        if (!isset($_SESSION["user"])) {
            header('location: ' . URLROOT . '/', true, 302);
            return;
        }
        view("profile/rechargeBanking");
    }

     public function handleCallback() {
        $validate = $this->validateCallback($_POST);
        if ($validate !== false) {
            $status = $validate['status'];
            $serial = $validate['serial'];
            $pin = $validate['code'];
            $card_type = $validate['telco'];
            $amount = $validate['amount'];
            $declared = $validate['declared_value'] * 1;
            $content = $validate['trans_id'];
            

            $result = $this->cardModel->findTransaction($content, $pin, $serial);
            if ($result) {
                if ($status == '1') {
                    $this->user->updateMoneyUser($result ->uid, $declared);
                    $this->cardModel->updateTransaction($result->id, '1');
                } elseif ($status == '2') {
                    $this->cardModel->updateTransaction($result->id, '2', $amount);
                } else {
                    $this->cardModel->updateTransaction($result->id, '3');
                }
            } 
        }
    }

    private function validateCallback($out) {
        $jsonData = file_get_contents('php://input');
        $jsonArray = json_decode($jsonData, true);
        if (isset(
            $jsonArray['status'],
            $jsonArray['message'],
            $jsonArray['request_id'],
            $jsonArray['declared_value'],
            $jsonArray['value'],
            $jsonArray['amount'],
            $jsonArray['code'],
            $jsonArray['serial'],
            $jsonArray['telco'],
            $jsonArray['trans_id'],
            $jsonArray['callback_sign']
        )) {
            return $jsonArray;
        } else {
            return false;
        }
    }

    public function getGameInCategory($status,$message) {
        $data = [ 'category' => [],
        "message" => $message,
        "status" => $status];
        $cates = $this -> category -> getAllCategory();
        foreach($cates as $cate) {
          $data["category"][] = [
            "id" => $cate -> id,
            "title"  => $cate -> title,
            "games" => $this -> game -> getGameByCate($cate -> id),
          ];
        }
        return $data;
      }

    public function SubmitRechargeCard()
    {
        if (!isset($_POST['pin'], $_POST['serial'], $_POST['card_type'], $_POST['card_amount'])) {
            header('location: ' . URLROOT . '/', true, 302);
            return;
        }

        if (empty($_POST['pin']) ||  empty($_POST['serial']) || empty($_POST['card_type']) || empty($_POST['card_amount'])) {
            header('location: ' . URLROOT . '/', true, 302);
            return;
        }
        $pin = $_POST["pin"];
        $serial = $_POST["serial"];
        $card_type = $_POST["card_type"];
        $card_amount = $_POST["card_amount"];

        sleep(1);

        $requestId = rand(1000000, 9999999);
        $sign = md5(PARTNER_KEY . $_POST['pin'] . $_POST['serial']);
        $command = 'charging';

        $data = array(
            'telco' => $card_type,
            'code' => $pin,
            'serial' => $serial,
            'amount' => $card_amount,
            'request_id' => $requestId,
            'partner_id' => PARTNER_ID,
            'sign' => $sign,
            'command' => $command
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, URL_TSR);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $jsonData = json_decode($response);
        $http_code = 0;
        if (isset($jsonData->status)) {
            $http_code = 200;
        }
        curl_close($ch);
        if ($http_code == 200) {
            if ($jsonData->status == '1') {
                $data = $this -> getGameInCategory("success",'Thành công Nạp thành công mệnh giá: "' . $jsonData->declared_value . '"! Refresh trang để cập nhật số tiền');
                view('home',$data );
            } else if ($jsonData->status == '2') {
                $data = $this -> getGameInCategory("error",'Nạp thành công nhưng sai mệnh giá. Cư dân sẽ không được cộng tiền! Liên hệ ADMIN để được hỗ trợ');
                view('home',$data );
            } else if ($jsonData->status == '3') {
                $data = $this -> getGameInCategory("error",'Thẻ lỗi hoặc nhập sai giá trị ' . $sign . '"');
                view('home',$data );
            } else if ($jsonData->status == '4') {
                $data = $this -> getGameInCategory("error",'Hệ thống nạp đang bảo trì!');
                view('home',$data );
            } else if ($jsonData->status == '99') {
                $currentMillis = time();
                $this -> cardModel -> insertTransaction($_SESSION["user"]["username"],$card_amount,$serial,$pin,$card_type,$currentMillis,$jsonData->trans_id );
                $data = $this -> getGameInCategory("success",'Gửi thẻ thành công và đang chờ xử lý! Liên hệ ADMIN nếu không được cộng tiền sau 10 phút');
                view('home',$data );
            } else {
                $data = $this -> getGameInCategory("error",'' . $jsonData->message . '');
                view('home',$data );            
            }
        } else {
            $data = $this -> getGameInCategory("error",'Có lỗi máy chủ vui lòng thử lại sau!');
            view('home',$data );   
        }
    }
}
