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

  public function getAllInfoOrder(){
    $this -> db -> query("SELECT * FROM orders AS o INNER JOIN account AS user ON o.account_id=user.id");
        return $this -> db -> resultSet();
  }

  public function getDataInMonth($start,$end){
    $this -> db -> query("SELECT DATE(order_date) AS date, SUM(amount) AS total_amount
      FROM orders
      WHERE order_date BETWEEN :start AND :end
      GROUP BY DATE(order_date);");
       $this->db->bind(':start', $start);
       $this->db->bind(":end",$end);
    return $this -> db -> resultSet();
  }
 
  public function getAllDetailOrderInDay(){
    $this -> db -> query("SELECT * FROM orders WHERE DATE(order_date) = CURDATE()");
    return $this -> db -> resultSet();
  }

  public function addOrder($idUser,$cateGame,$tkGame,$mkGame,$amount,$nameServer){
    $this ->db -> query("INSERT INTO orders (`account_id`, `cate_game`,`tk_game`,`mk_game`,`amount`,`order_date`,`name_server`) VALUE (:account_id,:cate_game,:tk_game,:mk_game,:amount,NOW(),:name_server)");
    $this->db->bind(':account_id', $idUser);
    $this->db->bind(":cate_game",$cateGame);
    $this->db->bind(":tk_game",$tkGame);
    $this->db->bind(":mk_game",$mkGame);
    $this->db->bind(":amount",$amount);
    $this->db->bind(":name_server",$nameServer);

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