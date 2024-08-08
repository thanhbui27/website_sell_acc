<?php
namespace Models;

use \Models\Database;

class ServerGame
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllServerGame(){
    $this -> db -> query("SELECT * FROM server_game");
    return $this -> db -> resultSet();
  }

  public function getAllServerGameJoinGame(){
    $this->db->query("SELECT sg.*,g.name AS name_game FROM server_game AS sg INNER JOIN game AS g WHERE sg.id_game = g.id");
    return $this->db->resultSet();
  }

  public function getServerGameById($id){
    $this -> db -> query("SELECT * FROM server_game WHERE id= :id");
    $this -> db -> bind(':id', $id);
    return $this -> db -> single();
  }
  
  public function getServerGameByGame($id){
    $this -> db -> query("SELECT * FROM server_game WHERE id_game = :id");
    $this -> db -> bind(':id', $id);
    return $this -> db -> resultSet();
  }

  public function deleteServerByIdGame($id){
    $this -> db -> query("DELETE FROM server_game where id_game = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function deleteServerByIde($id){
    $this -> db -> query("DELETE FROM server_game where id = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function addNewServerGame($name,$image,$id_game){
    $this -> db -> query("INSERT INTO server_game (name,image,id_game) VALUE (:name,:image,:id_game)");
    $this -> db -> bind(':name', $name);
    $this -> db -> bind(':image', $image);
    $this -> db -> bind(':id_game', $id_game);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function UpdateServerGame($id,$name,$image,$id_cate){
    $this -> db -> query("UPDATE server_game SET name =:name,image =:image,id_game=:id_cate WHERE id = :id");
    $this -> db -> bind(':name', $name);
    $this -> db -> bind(':image', $image);
    $this -> db -> bind(':id_cate', $id_cate);
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }
}