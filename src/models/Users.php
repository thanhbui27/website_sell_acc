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

  

}