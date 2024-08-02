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
  public function getServerGameByGame($id){
    $this -> db -> query("SELECT * FROM server_game WHERE id_game = :id");
    $this -> db -> bind(':id', $id);
    return $this -> db -> resultSet();
  }
}