<?php
namespace Models;

use \Models\Database;

class AccountGame
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  
  public function getAccountByServer($idGame,$idServer):array{
    $this->db->query("SELECT * FROM account_game WHERE id_server = :id_server AND game_id = :id_game");
    $this->db->bind(':id_server', $idServer);
    $this->db->bind(':id_game', $idGame);
    return $this->db->resultSet();
  }
  
}