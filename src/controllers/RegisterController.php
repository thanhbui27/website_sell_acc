<?php

namespace Controllers;

use Models\Users;

class RegisterController 
{
    private $userModel; 
    public function __construct()
    {
      $this->userModel = new Users;
    }
    public function registerPage(){
        if(isset($_SESSION['user'])){
            header('location: ' . URLROOT . '/', true,302);
        }else{
            $data = ['message' => ''];
            view("Auth/register", $data);
        }
    }
    public function registerUser(){
     
        if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['username'], $_POST['password'], $_POST['repassword'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $rePassword = $_POST['repassword'];
            
            if(empty($username) || empty($password) || empty($rePassword)){
                $data = ['message' => 'Không được để trống các input'];
                view("Auth/register", $data);
                return;
            }
            if(strlen($username) < 6 || strlen($password) < 6 || strlen($rePassword)<6){
                $data = ['message' => 'Vui lòng nhập đủ trên 6 ký tự cho input'];         
                view("Auth/register", $data);
                return;           
            }
            if($password != $rePassword){
                $data = ['message' => 'Mật khẩu không khớp nhau'];         
                view("Auth/register", $data);
                return;   
            } 
            if (preg_match('/^[a-zA-Z0-9]+$/', $username) == 0 || preg_match('/^[a-zA-Z0-9]+$/', $password) == 0  || preg_match('/^[a-zA-Z0-9]+$/', $rePassword) == 0) {
                $data = ['message' => 'Nội dung chưa ký tự không hợp lệ'];         
                view("Auth/register", $data);
                return; 
            }
            
            if($this -> userModel -> getUserByUsername($username) ){
                $data = ['message' => 'Tải khoản này đã được đăng ký'];  
                view("Auth/register", $data);
                return; 
            }
            if($this -> userModel -> createUsers($username,$password)){
                $gu = $this -> userModel ->  getUserByUsername($username) ;           
                $_SESSION['user'] = [
                    'username' => $username,
                    'is_login' => true,
                    'money' => $gu -> money,
                    "isAdmin" => $gu -> admin,
                    'login_time' => time()
                ];
                header('location: ' . URLROOT . '/', true,302);
            }else{
                $data = ['message' => 'Có lỗi xảy ra vui lòng thử lại'];         
                view("Auth/register", $data);
                return; 
            }             
        }else{
            header('location: ' . URLROOT . '/auth/registerPage', true,302);
        }
    }

}