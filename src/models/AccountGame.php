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
  
  public function getAllAccountBuy(){
    $this -> db -> query("SELECT * FROM account_game WHERE status = 1");
    return $this -> db -> resultSet();
  }

  public function getAllAccount(){
    $this -> db -> query("SELECT * FROM account_game");
    return $this -> db -> resultSet();
  }

  public function getAccountByServer($idGame,$idServer):array{
    $this->db->query("SELECT * FROM account_game WHERE id_server = :id_server AND game_id = :id_game AND status = 0");
    $this->db->bind(':id_server', $idServer);
    $this->db->bind(':id_game', $idGame);
    return $this->db->resultSet();
  }
  
  public function getDetailsAccount($id) {
    $this->db->query("SELECT ac.*,sg.name AS sever_name,sg.image AS server_image ,g.name AS game_name ,g.description AS game_description,g.image AS game_image FROM account_game AS ac INNER JOIN server_game AS sg ON ac.id_server = sg.id INNER JOIN game AS g ON g.id = ac.game_id WHERE ac.id = :id AND status = 0;");
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  public function getAccountGameByGame($idGame, $idServer)  {
    $this->db->query("SELECT * FROM account_game WHERE game_id = :idGame AND id_server = :idServer AND status = 0");
    $this->db->bind(':idGame', $idGame);
    $this->db->bind(':idServer', $idServer);
    return $this->db->resultSet();
  }
  
  public function searchAccountGame($id) {
    $this->db->query("SELECT * FROM account_game WHERE id = :idGame and status = 0");
    $this->db->bind(':idGame', $id);
    return $this->db->resultSet();
  }
  public function filterGameByPrice($min,$max){
    $this->db->query("SELECT * FROM account_game WHERE price >= :min AND price <= :max AND status = 0");
    $this->db->bind(':min', $min);
    $this->db->bind(':max', $max);
    return $this->db->resultSet();
  }

  public function getImageById($id){
    $this->db->query("SELECT * FROM game_account_image WHERE account_game_id =:id");
    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }

  public function updateStatusGame($id){
    $this->db->query("UPDATE account_game SET status = 1 WHERE id = :id");
    $this->db->bind(':id', $id);
    if ($this->db->execute())
      return true;
    return false;
  }
  public function getHistoryBuy($id) {
    $this -> db -> query("SELECT ac.*,o.id AS id_order, od.order_date,g.name AS game_name ,g.description AS game_description,g.image AS game_image FROM account_game AS ac INNER JOIN game AS g ON g.id = ac.game_id INNER JOIN orders AS o INNER JOIN order_detail AS od WHERE o.account_game_id = ac.id AND o.id = od.order_id AND o.account_id = :id");
    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }
}