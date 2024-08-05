<?php
namespace Models;

use \Models\Database;

class Users
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  
  public function getAllUSer() {
    $this -> db -> query("SELECT * FROM account");
    return $this->db->resultSet();
  }

  public function createUsers($username, $password) : bool
  {
    $this->db->query("INSERT INTO account (`username`,`password`) VALUES (:username, :password)");
    $this->db->bind(':username', $username);
    $this->db->bind(':password', $password);
    if ($this->db->execute())
      return true;
    return false;
  }

  public function login($username,$password){
    $this->db->query("SELECT * FROM account WHERE username = :username AND password = :password");
    $this->db->bind(':username', $username);
    $this->db->bind(':password', $password);
    return $this->db->single(); 
  }

  public function getUserByUsername($username) 
  {
    $this->db->query("SELECT * FROM account WHERE username = :username");
    $this->db->bind(':username', $username);
    return $this->db->single(); 
  }
  public function changePassword($password,$username) : bool
  {
    $this->db->query("UPDATE account SET password = :pass WHERE username = :username");
    $this->db->bind(':pass', $password);
    $this->db->bind(':username', $username);
    if ($this->db->execute())
      return true;
    return false;
  }

  public function subMoney($amount,$username) {
    $this->db->query("UPDATE account SET money = money - :amount WHERE username = :username");
    $this->db->bind(':amount', $amount);
    $this->db->bind(':username', $username);
    if ($this->db->execute())
      return true;
    return false;
  }

  public function getBalanceFFluctuations($idUser){
    $this -> db -> query("SELECT * FROM balancefluctuations WHERE id_user = :idUser");
    $this -> db -> bind(":idUser",$idUser);
    return $this -> db -> resultSet();
  }


  public function updateBanUser($isBan,$id) : bool
  {
    $this->db->query("UPDATE account SET isBan = :isBan WHERE id = :id");
    $this->db->bind(':isBan', $isBan);
    $this->db->bind(':id', $id);
    if ($this->db->execute())
      return true;
    return false;
  }

  public function getUserById($id) 
  {
    $this->db->query("SELECT * FROM account WHERE id = :id");
    $this->db->bind(':id', $id);
    return $this->db->single(); 
  }
}