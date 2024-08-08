<?php
namespace Controllers;

use Models\AccountGame;
use Models\Game;
use Models\Order;
use Models\Users;

class HistoryBuyController
{
    private $order;
    private $user;
    private $account_game;
    private $game;
    public function __construct()
    {
        $this -> order = new Order;
        $this -> user = new Users;
        $this -> account_game = new AccountGame;
        $this -> game = new Game;
    }
    public function index(){
        if(!isset($_SESSION["user"])){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        $getUser = $this -> user -> getUserByUsername($_SESSION["user"]["username"]);
        if($getUser){       
            $data = [
                "history" =>   $this -> account_game -> getHistoryBuy($getUser -> id)
            ];
            view("profile/historyBuy",$data);
        }
      
    }

    public function managerBilling(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            header('location: ' . URLROOT . '/', true,302);
            exit();
        }
        $data = [
            "billing" =>   $this -> order -> getAllInfoOrder()
        ];
        view("admin/managerBill",  $data);
    }

    public function orderAccount(){
        if(isset($_POST["id"])){
            $id = $_POST["id"];
            if(!isset($_SESSION["user"])){
                $data = [
                    "status" => "error",
                    "message" => "session not exists"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }

            $getUser = $this -> user -> getUserByUsername($_SESSION["user"]["username"]);
            if(!$getUser){
                $data = [
                    "status" => "error",
                    "message" => "user not found"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }
            $getAccountGame = $this -> account_game -> searchAccountGame($id);
            if(count($getAccountGame) === 0){
                $data = [
                    "status" => "error",
                    "message" => "account not found"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }

            if($getUser -> money < $getAccountGame[0] -> price){
                $data = [
                    "status" => "error",
                    "message" => "Bạn không đủ tiền"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }
    
            $getGame = $this-> game -> getGameById($getAccountGame[0] -> game_id); 
            $getServerGame = $this -> game -> getServerGameById($getAccountGame[0] ->id_server); 
            
            $addOrder = $this -> order -> addOrder($getUser -> id,$getGame -> name,$getAccountGame[0] -> account_username,$getAccountGame[0] -> account_password,$getAccountGame[0] -> price,$getServerGame -> name);
            if($addOrder){               
                $updateStatusGame = $this ->account_game -> updateStatusGame($id);                        
                $preAmount = $getUser -> money;
                $changeAmount = $getAccountGame[0] -> price;
                $newAmount = $getUser -> money - $getAccountGame[0] -> price;
                $description = "Mua ".$getGame -> name."";

                $addHistoryTransition = $this -> order -> addHistoryTransactions($preAmount,$changeAmount,$newAmount,$description,$getUser->id);
                $updateMoney = $this -> user -> subMoney($getAccountGame[0] -> price,$getUser -> username);
                if($updateStatusGame && $addHistoryTransition && $updateMoney){
                    $data = [
                        "status" => "success",
                        "message" => "Mua nick thành công"
                    ];
                }          
              
            }else {
                $data = [
                    "status" => "error",
                    "message" => "Order loi"
                ];
            }
           
        }else{
            $data = [
                "status" => "error",
                "message" => "id not found"
            ];
        }   
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}