<?php
namespace Controllers;

use Models\AccountGame;
use Models\ServerGame;

class AccountController
{
    private $serverGame;
    private $accountGame;
    public function __construct() {
        $this->serverGame = new ServerGame;
        $this ->accountGame = new AccountGame;
    }
    public function index(array  $param){
        $svGame = $this -> serverGame -> getServerGameById($param["id"]);
        if(!isset($param["id"])){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        if(empty($svGame)){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        $data = [
            "serverGame" =>  $svGame,
            "accountGame" => $this ->accountGame -> getAccountGameByGame( $svGame -> id_game, $param["id"])
        ];
        view("accounts", $data);
    }
    public function filterAccount($param){

        if(!isset($param["id"])){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }

        $svGame = $this -> serverGame -> getServerGameById($param["id"]);

        if(empty($svGame)){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }

      
        if(!isset($_POST["amount"]) && !isset($_POST["id_acc"])){
            $data = [
                "serverGame" =>  $svGame,
                "accountGame" => $this ->accountGame -> getAccountGameByGame( $svGame -> id_game, $param["id"])
            ];
            view("accounts", $data);
        }
        $amount = $_POST["amount"];
        $idAcc = $_POST["id_acc"];
        if(!empty($amount) && !empty($idAcc)){
            $data = [
                "serverGame" =>  $svGame,
                "accountGame" => $this ->accountGame -> getAccountGameByGame( $svGame -> id_game, $param["id"])
            ];
            view("accounts", $data);
        }

        if(empty($amount) && !empty($idAcc)){
            $data = [
                "serverGame" =>  $svGame,
                "accountGame" => $this ->accountGame -> searchAccountGame($idAcc)
            ];
            view("accounts", $data);
        }else{
            $parts = explode('-',  $amount);
            $number1 = (int)$parts[0];
            $number2 = (int)$parts[1];
            $data = [
                "serverGame" =>  $svGame,
                "accountGame" => $this ->accountGame -> filterGameByPrice($number1,$number2)
            ];
            view("accounts", $data);
        }


    }

    public function detailAccount($param){
        $game = $this ->accountGame -> getDetailsAccount($param["id"]);
        if(empty($game)){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        $data = [
            "game" =>  $game,
            "image" => $this -> accountGame -> getImageById($game -> id),
        ];

        view("detailsAccount", $data);
    }
      
}