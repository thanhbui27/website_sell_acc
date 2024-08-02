<?php

namespace Controllers;

use Models\Users;

class LoginController 
{
    private $userModel; 
    public function __construct()
    {
      $this->userModel = new Users;
    }
    public function loginPage(){
        if(isset($_SESSION['user'])){
            header('location: ' . URLROOT . '/', true,302);
        }else{
            $data = ['message' => ''];
            view("Auth/login", $data);
        }
    }

    public function loginUser(){
     
        if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['username'], $_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if(empty($username) || empty($password) ){
                $data = ['message' => 'Không được để trống các input'];
                view("Auth/login", $data);
                return;
            }
            if(strlen($username) < 6 || strlen($password) < 6){
                $data = ['message' => 'Vui lòng nhập đủ trên 6 ký tự cho input'];         
                view("Auth/login", $data);               
                return;           
            }

            if (preg_match('/^[a-zA-Z0-9]+$/', $username) == 0 || preg_match('/^[a-zA-Z0-9]+$/', $password) == 0) {
                $data = ['message' => 'Nội dung chưa ký tự không hợp lệ'];         
                view("Auth/login", $data);        
                return; 
            }

            if($this -> userModel -> login($username,$password)){            
                $_SESSION['user'] = [
                    'username' => $username,
                    'is_login' => true,
                    'login_time' => time()
                ];
                header('location: ' . URLROOT . '/', true, 302);
            }else{
                $data = ['message' => 'Tài khoản hoặc mật khẩu sai'];  
                view("Auth/login", $data);  
                return; 
            }
            
        }else{
            header('location: ' . URLROOT . '/auth/loginPage', true,302);
        }
    }

    public function logOut(){
        if(isset($_SESSION['user'])){
            session_destroy();
            session_unset();
            header('location: ' . URLROOT . '/', true,302);
        }else{
            header('location: ' . URLROOT . '/', true,302);
        }
    }

}