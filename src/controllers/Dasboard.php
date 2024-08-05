<?php
namespace Controllers;

use Models\AccountGame;
use Models\Order;
use Models\Users;

class Dashboard
{
    private $user;
    private $order;
    private $acc_game;
    public function __construct()
    {
        $this ->user = new Users;
        $this ->order = new Order;
        $this ->acc_game = new AccountGame;
    }
    public function home(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            header('location: ' . URLROOT . '/', true,302);
            exit();
        }
        $getOrders = $this -> order -> getAllDetailOrderInDay();
        $totalMoney = 0;
        foreach($getOrders as $order){
            $totalMoney += $order -> amount;
        }
        $data = [
            "totalMoney" => $totalMoney,
            "user" => $this -> user -> getAllUSer(),
            "account_game" => $this -> acc_game -> getAllAccount(),
            "account_sell" => $this -> acc_game -> getAllAccountBuy(),
            "arrayDataChart" => json_encode($this -> handleDataInMonth())
        ];
        view("admin/dashboard",$data);
    }
    public function getArrayValue() {
        $year = date('Y');
        $month = date('m');
        $num_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        return  array_fill(0, $num_of_days, 0);
    }

    public function handleDataInMonth(){
        $year = date('Y');
        $month = date('m');

        $start_of_month = date('Y-m-01');
        $end_of_month = date('Y-m-t');

        $num_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $dataOfMonth = $this -> order -> getDataInMonth( $start_of_month,$end_of_month);
        $arrayMainData = $this -> getArrayValue();

        for($i = 0; $i < count($dataOfMonth) ; $i++){
            for($j = 0 ; $j < $num_of_days ; $j++){
                $dateTime = $this -> convertDate($dataOfMonth[$i] -> date);
                if($dateTime["day"] == $j && $month == $dateTime["month"] && $year == $dateTime["year"]){
                    $arrayMainData[$j - 1] = $dataOfMonth[$i] -> total_amount;
                }
            }
        } 
        return $arrayMainData;
    }

    public function convertDate($dateTimeString) {
        $timestamp = strtotime($dateTimeString);
        $day = date('d', $timestamp);
        $month = date('m', $timestamp);
        $year = date('Y', $timestamp);

        return [
            'day' => $day,
            'month' => $month,
            'year' => $year
        ];
    }
}