<?php
namespace Models;

use \Models\Database;

class Game
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function addNewGame($name,$image,$id_cate){
    $this -> db -> query("INSERT INTO game (name,image,id_category) VALUE (:name,:image,:id_cate)");
    $this -> db -> bind(':name', $name);
    $this -> db -> bind(':image', $image);
    $this -> db -> bind(':id_cate', $id_cate);
    if($this -> db -> execute())
        return true;
    return false;
  }


  public function UpdateGame($id,$name,$image,$id_cate){
    $this -> db -> query("UPDATE game SET name =:name,image =:image,id_category=:id_cate WHERE id = :id");
    $this -> db -> bind(':name', $name);
    $this -> db -> bind(':image', $image);
    $this -> db -> bind(':id_cate', $id_cate);
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function getAllGames(){
    $this->db->query("SELECT * FROM game");
    return $this->db->resultSet();
  }

  public function getAllGame(){
    $this->db->query("SELECT g.*,cg.title FROM game AS g INNER JOIN category_game AS cg WHERE g.id_category = cg.id");
    return $this->db->resultSet();
  }

  public function getGameByCate($id_cate) : array{
    $this->db->query("SELECT * FROM game WHERE id_category = :id_cate");
    $this->db->bind(':id_cate', $id_cate);
    return $this->db->resultSet();
  }

  public function getGameById($id) {
    $this->db->query("SELECT * FROM game WHERE id = :id");
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function getServerGameById($id) {
    $this->db->query("SELECT * FROM server_game WHERE id = :id_game");
    $this->db->bind(':id_game', $id);
    return $this->db->single();
  }

  public function removeGameByidCate($id){
    $this -> db -> query("DELETE FROM game where id_category = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function removeGameByid($id){
    $this -> db -> query("DELETE FROM game where id = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

}