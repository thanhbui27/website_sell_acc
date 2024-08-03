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


}