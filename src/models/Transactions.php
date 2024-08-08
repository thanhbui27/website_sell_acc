<?php

namespace Models;

use \Models\Database;

class Transactions
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function selectTransactionIDTransaction($transactionID)
  {
    $this->db->query("SELECT * FROM transactions_banking WHERE transactionID =:transactionID");
    $this->db->bind(":transactionID", $transactionID);
    return $this->db->single();
  }
  public function insertTransaction($transactionID, $amount, $description, $username)
  {
    $this->db->query("INSERT INTO transactions_banking (transactionID, amount, description, transactionDate,username,approved) VALUES (:transactionID,:amount,:description,NOW(),:username,1)");
    $this->db->bind(":transactionID", $transactionID);
    $this->db->bind(":amount", $amount);
    $this->db->bind(":description", $description);
    $this->db->bind(":username", $username);
    if ($this->db->execute())
      return true;
    return false;
  }
}
