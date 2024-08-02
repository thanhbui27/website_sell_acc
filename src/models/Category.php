<?php
namespace Models;

use \Models\Database;

class Category
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  
  public function getAllCategory() : array{
    $this->db->query("SELECT * FROM category_game");
    return $this->db->resultSet();
  }
  
}