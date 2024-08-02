<?php
namespace Controllers;

use Models\AccountGame;
use Models\Game;
use Models\ServerGame;

class ServerGameController
{
    private $serverGame;
    private $game;
    private $accountGame;
    public function __construct() {
       $this-> serverGame = new ServerGame;
       $this -> game = new Game;
       $this -> accountGame = new AccountGame;
    }
    public function index($param)
    {
        echo $param["id"];
        if (preg_match('/^[a-zA-Z0-9]+$/', $param["id"]) == 0) {
            header('location: ' . URLROOT . '/', true,302);
        }
        if(!isset($param)){
            header('location: ' . URLROOT . '/', true,302);
        }
        if(empty($param["id"])){
            header('location: ' . URLROOT . '/', true,302);
        }
        $game = $this -> game -> getGameById($param["id"]);
        $data = [
            "game" => $game,
            "server_games" => [],
        ];

        $server_games = $this -> serverGame -> getServerGameByGame($param["id"]);
        
        foreach($server_games as $server_game){
            $numAccountGame = count($this -> accountGame ->  getAccountByServer($server_game -> id_game,$server_game -> id));
            $data["server_games"][] = [
                "id" => $server_game -> id,
                "name" => $server_game -> name,
                "image" => $server_game -> image,
                "id_game" => $server_game -> id_game,
                "num_account" => $numAccountGame,
                ];
        }
       view("serverGame", $data);
    }
}