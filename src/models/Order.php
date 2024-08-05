<?php
namespace Models;

use \Models\Database;

class Order
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getDataInMonth($start,$end){
    $this -> db -> query("SELECT DATE(order_date) AS date, SUM(amount) AS total_amount
      FROM order_detail
      WHERE order_date BETWEEN :start AND :end
      GROUP BY DATE(order_date);");
       $this->db->bind(':start', $start);
       $this->db->bind(":end",$end);
    return $this -> db -> resultSet();
  }

  public function getAllDetailOrderInDay(){
    $this -> db -> query("SELECT * FROM order_detail WHERE DATE(order_date) = CURDATE()");
    return $this -> db -> resultSet();
  }

  public function addOrder($idGame,$idUser){
    $this ->db -> query("INSERT INTO orders (`account_id`, `account_game_id`) VALUE (:account_id,:account_game_id)");
    $this->db->bind(':account_id', $idUser);
    $this->db->bind(":account_game_id",$idGame);
    if ($this->db->execute())
        return true;
      return false;
  }

  public function getOrderByIdGame($idGame, $isUser){
    $this->db->query("SELECT * FROM orders WHERE account_game_id = :account_game AND account_id = :account_user");
    $this->db->bind(':account_game', $idGame);
    $this->db->bind(":account_user",$isUser);
    return $this->db->single(); 
  }
  
  public function addOrderDetails($idOrder,$amount){
    $this ->db -> query("INSERT INTO order_detail (`order_id`, `amount`,`order_date`) VALUE (:order_id,:amount,NOW())");
    $this->db->bind(':order_id', $idOrder);
    $this->db->bind(":amount",$amount);
    if ($this->db->execute())
        return true;
      return false;
  }

  public function addHistoryTransactions($preAmount,$changeAmount,$currentAmount,$description,$idUser){
    $this ->db -> query("INSERT INTO balancefluctuations (`previousAmount`, `changeAmount`,`currentAmount`,`transactionDate`,`description`,`id_user`) VALUE (:preAmount,:changeAmount,:currentAmount,NOW(),:description,:idUser)");
    $this->db->bind(':preAmount', $preAmount);
    $this->db->bind(":changeAmount",$changeAmount);
    $this->db->bind(":currentAmount",$currentAmount);
    $this->db->bind(":description",$description);
    $this->db->bind(":idUser",$idUser);
    if ($this->db->execute())
        return true;
      return false;
  }
}