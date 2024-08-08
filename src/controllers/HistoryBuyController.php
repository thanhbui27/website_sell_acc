<?php

namespace Controllers;

use Models\AccountGame;
use Models\Game;
use Models\Order;
use Models\Transactions;
use Models\Users;

class HistoryBuyController
{
    private $order;
    private $user;
    private $account_game;
    private $game;
    private $transaction;
    public function __construct()
    {
        $this->order = new Order;
        $this->user = new Users;
        $this->account_game = new AccountGame;
        $this->game = new Game;
        $this->transaction = new Transactions;
    }
    public function index()
    {
        if (!isset($_SESSION["user"])) {
            header('location: ' . URLROOT . '/', true, 302);
            return;
        }
        $getUser = $this->user->getUserByUsername($_SESSION["user"]["username"]);
        if ($getUser) {
            $data = [
                "history" =>   $this->account_game->getHistoryBuy($getUser->id)
            ];
            view("profile/historyBuy", $data);
        }
    }

    public function managerBilling()
    {
        if (!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]) {
            header('location: ' . URLROOT . '/', true, 302);
            exit();
        }
        $data = [
            "billing" =>   $this->order->getAllInfoOrder()
        ];
        view("admin/managerBill",  $data);
    }

    public function orderAccount()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            if (!isset($_SESSION["user"])) {
                $data = [
                    "status" => "error",
                    "message" => "session not exists"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }

            $getUser = $this->user->getUserByUsername($_SESSION["user"]["username"]);
            if (!$getUser) {
                $data = [
                    "status" => "error",
                    "message" => "user not found"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }
            $getAccountGame = $this->account_game->searchAccountGame($id);
            if (count($getAccountGame) === 0) {
                $data = [
                    "status" => "error",
                    "message" => "account not found"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }

            if ($getUser->money < $getAccountGame[0]->price) {
                $data = [
                    "status" => "error",
                    "message" => "Bạn không đủ tiền"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }

            $getGame = $this->game->getGameById($getAccountGame[0]->game_id);
            $getServerGame = $this->game->getServerGameById($getAccountGame[0]->id_server);

            $addOrder = $this->order->addOrder($getUser->id, $getGame->name, $getAccountGame[0]->account_username, $getAccountGame[0]->account_password, $getAccountGame[0]->price, $getServerGame->name);
            if ($addOrder) {
                $updateStatusGame = $this->account_game->updateStatusGame($id);
                $preAmount = $getUser->money;
                $changeAmount = $getAccountGame[0]->price;
                $newAmount = $getUser->money - $getAccountGame[0]->price;
                $description = "Mua " . $getGame->name . "";

                $addHistoryTransition = $this->order->addHistoryTransactions($preAmount, $changeAmount, $newAmount, $description, $getUser->id);
                $updateMoney = $this->user->subMoney($getAccountGame[0]->price, $getUser->username);
                if ($updateStatusGame && $addHistoryTransition && $updateMoney) {
                    $data = [
                        "status" => "success",
                        "message" => "Mua nick thành công"
                    ];
                }
            } else {
                $data = [
                    "status" => "error",
                    "message" => "Order loi"
                ];
            }
        } else {
            $data = [
                "status" => "error",
                "message" => "id not found"
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function extractUsername($description)
    {
        // Chuyển tất cả ký tự về chữ thường
        $normalized_description = strtolower($description);

        // Sử dụng regex để tìm kiếm cú pháp "napstarai<username>"
        if (preg_match('/nap\s*starai\s*(\w+)/', $normalized_description, $matches)) {

            return $matches[1];
        }
        return null;
    }
    public function checkIsTransactionExist($transactionID)
    {
        $trans = $this->transaction->selectTransactionIDTransaction($transactionID);
        if ($trans) {
            return true;
        }
        return false;
    }

    public function historyBanking()
    {
        if (!isset($_SESSION["user"])) {
            header('location: ' . URLROOT . '/', true, 302);
            exit();
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, API_BANKING);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === false) {
            $response = array(
                'status' => 'error',
                'message' => 'Lỗi cURL: ' . curl_error($ch)
            );
            view("profile/historyBanking", $response);
            exit();
        } else {
            $data = json_decode($response, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                $dataConvert = $data['transactions'];

                $filteredItems = array_filter($dataConvert, function ($item) {
                    $normalized_description = strtolower($item['description']);
                    return preg_match('/nap\s*starai/', $normalized_description);
                    //return strpos($item['description'], 'NAPSTARAI') !== false;
                });

                $filteredItems = array_map(function ($item) {
                    $item['username'] = $this->extractUsername($item['description']);
                    if ($this->checkIsTransactionExist($item['transactionID'])) {
                        $item["approved"] = 1;
                    } else {
                        $item["approved"] = 0;
                    }
                    return $item;
                }, $filteredItems);

                if (!isset($_SESSION["user"])) {
                    $err = array(
                        'status' => 'error',
                        'message' => "may k co sesssion"
                    );
                    view("profile/historyBanking", $err);
                    exit();
                }

                $finalData = array_filter($filteredItems, function ($item) {
                    return strtolower($item['username']) === strtolower($_SESSION["user"]["username"]);
                });


                $data["transactions"] = array_values($finalData);
                view("profile/historyBanking", $data);
                // echo json_encode($data);
            } else {
                $err = array(
                    'status' => 'error',
                    'message' => 'Lỗi giải mã JSON: ' . json_last_error_msg()
                );
                view("profile/historyBanking", $err);
            }
        }
        curl_close($ch);
    }
    public function approvedBanking()
    {
        if (!isset($_SESSION["user"])) {
            $response = array(
                'status' => 'error',
                'message' => 'session k tồn tại',
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
        if (!isset($_POST["id"])) {
            $response = array(
                'status' => 'error',
                'message' => 'id không tồn tại',
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
        $username = $_SESSION["user"]["username"];
        $transactionID = $_POST["id"];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, API_BANKING);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if ($response === false) {
            $response = array(
                'status' => 'error',
                'message' => 'loi api',
            );
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        } else {
            $data = json_decode($response, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $dataConvert = $data['transactions'];
                $filteredItems = array_filter($dataConvert, function ($item) use ($transactionID) {
                    return $item['transactionID'] === $transactionID;
                });

                if (count($filteredItems) > 0) {
                    if ($this->checkIsTransactionExist($transactionID)) {
                        $response = array(
                            'status' => 'success',
                            'message' => 'Tài khoản này đã được cộng thêm tiền',
                        );
                        header('Content-Type: application/json');
                        echo json_encode($response);
                        exit();
                    } else {
                        $dataTrans = array_values($filteredItems)[0];
                        $amount = $dataTrans['amount'];
                        $description = $dataTrans['description'];
                        $insertTrans = $this->transaction->insertTransaction($transactionID, $amount, $description, $username);
                        $getUser = $this->user->getUserByUsername($username);
                        $preAmount = $getUser->money;
                        $newAmount = $getUser->money + $amount;
                        $description = "Nạp " . $amount . " vào tài khoản " . $username . "";
                        if ($insertTrans) {
                            $updateMoneyUser = $this->user->updateMoneyUser($username, $amount);
                            $addHistoryBalance = $this->order->addHistoryTransactions($preAmount, $amount, $newAmount, $description, $getUser->id);

                            if ($updateMoneyUser && $addHistoryBalance) {
                                $response = array(
                                    'status' => 'success',
                                    'message' => 'Thêm tiền thành công',
                                    'transactions' =>  []
                                );
                                header('Content-Type: application/json');
                                echo json_encode($response);
                                exit();
                            } else {
                                $response = array(
                                    'status' => 'error',
                                    'message' => 'Thêm tiền thất bại',
                                );
                                header('Content-Type: application/json');
                                echo json_encode($response);
                                exit();
                            }
                        } else {
                            $response = array(
                                'status' => 'error',
                                'message' => 'Thêm thất bại',

                            );
                            header('Content-Type: application/json');
                            echo json_encode($response);
                            exit();
                        }
                    }
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'Transition ID k hợp lệ',
                    );
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit();
                }
            }
        }
    }
}
