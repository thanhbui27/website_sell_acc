<?php
namespace Controllers;

use Models\Users;

class UserController
{
    private $user;
    public function __construct()
    {
        $this->user = new Users();
    }
    public function index(){
        if(!isset($_SESSION["user"])){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        $data = [
            "user" => $this->user->getUserByUsername($_SESSION["user"]["username"])
        ];
        view("profile/infoAccount",$data);
    }
    public function balanceFluctuations(){
        if(!isset($_SESSION["user"])){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        $u =  $this->user->getUserByUsername($_SESSION["user"]["username"]);
        if($u){
            $balanceflu = $this -> user  -> getBalanceFFluctuations($u -> id);
            $data = [
                "balanceflu" => $balanceflu
            ];
            view("profile/balanceFluctuations",$data);
        }
    }
    public function changePassword(){
        if(!isset($_SESSION["user"])){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        if(isset($_POST["password"]) && isset($_POST["repassword"])){
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];

            if(empty($password) || empty($repassword) ){
                $data = ['message' => 'Không được để trống các input'];
                view("profile/changePass", $data);
                return;
            }
            if(strlen($password) < 6 || strlen($password) < 6){
                $data = ['message' => 'Vui lòng nhập đủ trên 6 ký tự cho input'];         
                view("profile/changePass", $data);               
                return;           
            }

            if($password != $repassword){
                $data = ['message' => 'Mật khẩu không khớp nhau'];         
                view("profile/changePass", $data);  
                return;   
            } 
            if($this -> user -> changePassword($repassword, $_SESSION["user"]["username"])){
                $data = ['message' => 'Đổi mật khẩu thành công'];         
                view("profile/changePass", $data);  
                return;   
            }else{
                $data = ['message' => 'Có lỗi xảy ra vui lòng thử lại'];         
                view("profile/changePass", $data);  
                return;  
            }
        }else{
            view("profile/changePass");
        }
    }

    public function managerUser() {
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            header('location: ' . URLROOT . '/', true,302);
            exit();
        }
        $user = $this -> user -> getAllUSer();
        $data = ['users' => $user];
        view("admin/managerAccount",$data);
    }

    public function unLock(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "session not exists"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        if(!isset($_POST["id"])){
            $data = [
                "status" => "error",
                "message" => "id khong ton tai"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $id = $_POST["id"];
        $uu = $this -> user -> getUserById($id);
        if(!$uu){
            $data = [
                "status" => "error",
                "message" => "Không tồn tại user"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $us = $this -> user->updateBanUser(0,$id);
        if($us){
            $data = [
                "status" => "success",
                "message" => "Mở khoá thành công"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }else{
            $data = [
                "status" => "error",
                "message" => "Mở Khoá user thất bại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
      
    }

    public function lockUser(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "session not exists"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        if(!isset($_POST["id"])){
            $data = [
                "status" => "error",
                "message" => "id khong ton tai"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $id = $_POST["id"];
        $uu = $this -> user -> getUserById($id);
        if(!$uu){
            $data = [
                "status" => "error",
                "message" => "Không tồn tại user"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $us = $this -> user->updateBanUser(1,$id);
        if($us){
            $data = [
                "status" => "success",
                "message" => "Khoá user thành công"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }else{
            $data = [
                "status" => "error",
                "message" => "Khoá user thất bại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
      
    }
    
}