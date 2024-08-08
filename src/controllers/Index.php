<?php
namespace Controllers;

use Models\Category;
use Models\Game;

class Index
{
  private $category; 
  private $game;
  public function __construct()
  {
    $this->category = new Category;
    $this->game = new Game;
  }
  public function home()
  {
    $data = $this -> getGameInCategory();
    // echo print_r($data["category"]);
    view('home',$data );
  }


  public function getGameInCategory() {
    $data = [ 'category' => [],
    "message" => "",
    "status" => ""];
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
}