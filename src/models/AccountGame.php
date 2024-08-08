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
  
  public function addNewAccountGame($name,$description,$game_id,$price,$image,$rank,$account_username,$account_password,$id_server){
    $this->db->query("INSERT INTO account_game (name,description,game_id,price,image,rank,account_username,account_password,id_server) VALUE(:name,:description,:game_id,:price,:image,:rank,:account_username,:account_password,:id_server)");
    $this->db->bind(':name', $name);
    $this->db->bind(':description', $description);
    $this->db->bind(':game_id', $game_id);
    $this->db->bind(':price', $price);
    $this->db->bind(':image', $image);
    $this->db->bind(':rank', $rank);
    $this->db->bind(':account_username', $account_username);
    $this->db->bind(':account_password', $account_password);
    $this->db->bind(':id_server', $id_server);
    if ($this->db->execute())
      return true;
    return false;
  }

  public function UpdateAccountGame($name, $description, $game_id, $price, $image, $rank, $account_username, $account_password, $id_server, $id){
    $this->db->query("UPDATE account_game SET name = :name, description = :description, game_id = :game_id, price = :price, image = :image, rank = :rank, account_username = :account_username, account_password = :account_password, id_server = :id_server WHERE id = :id");
    $this->db->bind(':name', $name);
    $this->db->bind(':description', $description);
    $this->db->bind(':game_id', $game_id);
    $this->db->bind(':price', $price);
    $this->db->bind(':image', $image);
    $this->db->bind(':rank', $rank);
    $this->db->bind(':account_username', $account_username);
    $this->db->bind(':account_password', $account_password);
    $this->db->bind(':id_server', $id_server);
    $this->db->bind(':id', $id);
    if ($this->db->execute())
        return true;
    return false;
}
  

  public function getAllAccountBuy(){
    $this -> db -> query("SELECT * FROM account_game WHERE status = 1");
    return $this -> db -> resultSet();
  }

  public function getAllAccount(){
    $this -> db -> query("SELECT * FROM account_game");
    return $this -> db -> resultSet();
  }

  public function getAllAccountDetails(){
    $this -> db -> query("SELECT ac.*,g.name AS name_game,sg.name AS name_server FROM account_game AS ac INNER JOIN game AS g ON g.id = ac.game_id INNER JOIN server_game as sg ON sg.id = ac.id_server");
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

  public function getAccountGame($id) {
    $this->db->query("SELECT * FROM account_game WHERE id = :idGame");
    $this->db->bind(':idGame', $id);
    return $this->db->single();
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

  public function addImageById($id,$image){
    $this->db->query("INSERT INTO game_account_image (account_game_id,image) VALUE (:account_game_id,:image)");
    $this->db->bind(':account_game_id', $id);
    $this->db->bind(':image', $image);
    if ($this->db->execute())
      return true;
    return false;
  }

  public function updateStatusGame($id){
    $this->db->query("UPDATE account_game SET status = 1 WHERE id = :id");
    $this->db->bind(':id', $id);
    if ($this->db->execute())
      return true;
    return false;
  }
  public function getHistoryBuy($id) {
    $this -> db -> query("SELECT * FROM orders WHERE account_id = :id");
    $this->db->bind(':id', $id);
    return $this->db->resultSet();
  }


  public function removeAccountGameById($id){
    $this -> db -> query("DELETE FROM account_game where id = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function removeAccountGameByIdGame($id){
    $this -> db -> query("DELETE FROM account_game where game_id = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function removeAccountByServerId($id){
    $this -> db -> query("DELETE FROM account_game where id_server = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function removeImageAccountGame($id){
    $this -> db -> query("DELETE FROM game_account_image where account_game_id = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }

  public function removeImageAccountGameById($id){
    $this -> db -> query("DELETE FROM game_account_image where id = :id");
    $this -> db -> bind(':id', $id);
    if($this -> db -> execute())
        return true;
    return false;
  }


  public function getAccountGameByIdGame($idGame)  {
    $this->db->query("SELECT * FROM account_game WHERE game_id = :idGame ");
    $this->db->bind(':idGame', $idGame);
    return $this->db->resultSet();
  }
  public function getAccountGameByIdServerGame($idGame)  {
    $this->db->query("SELECT * FROM account_game WHERE id_server = :idGame ");
    $this->db->bind(':idGame', $idGame);
    return $this->db->resultSet();
  }
}