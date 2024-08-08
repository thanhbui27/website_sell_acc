<?php
namespace Models;

use \Models\Database;

class CategoryGame
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public  function addCategoryGame($title){
    $this -> db -> query("INSERT INTO category_game (title) VALUE (:title)");
    $this -> db -> bind(':title', $title);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public  function editCategoryGame($id,$title){
    $this -> db -> query("UPDATE category_game SET title = :title WHERE id = :id");
    $this -> db -> bind(':id', $id);
    $this -> db -> bind(':title', $title);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function removeCateGameById($id){
    $this -> db -> query("DELETE FROM category_game where id = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function getCategoryById($id){
    $this -> db -> query("SELECT  * FROM category_game where id = :id");
    $this -> db -> bind(':id', $id);
    return $this -> db->single();
  }

  public function getAllCateGame(){
    $this -> db -> query("SELECT * FROM category_game");
    return $this -> db -> resultSet();
  }
}