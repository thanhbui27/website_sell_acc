<?php
namespace Controllers;

class RechargeController
{
    public function rechargeCard(){
        if(!isset($_SESSION["user"])){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        view("profile/rechargeCard");
    }
    public function rechargeBanking(){
        if(!isset($_SESSION["user"])){
            header('location: ' . URLROOT . '/', true,302);
            return;
        }
        view("profile/rechargeBanking");
    }
}