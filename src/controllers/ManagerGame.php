<?php
namespace Controllers;

use Models\AccountGame;
use Models\CategoryGame;
use Models\Game;
use Models\ServerGame;

class ManagerGame
{
    private $category;
    private $game;
    private $serverGame;
    private $accountGame;
    public function __construct() {
        $this ->category = new CategoryGame;
        $this -> game = new Game;
        $this ->serverGame = new ServerGame;
        $this  -> accountGame = new AccountGame;
    }
    public function index(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            header('location: ' . URLROOT . '/', true,302);
            exit();
        }
        $data = [
            "category" => $this -> category -> getAllCateGame(),
            "game" => $this -> game -> getAllGames()
        ];
        view("admin/managerGame", $data );
    }

    public function addCategoryGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }   
        if(!isset($_POST["title"])){
            $data = [
                "status" => "error",
                "message" => "title cate không tồn tại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $title = $_POST["title"];
        if(strlen($title) < 6 ){
            $data = [
                "status" => "error",
                "message" => "title cate phải lớn hơn 6 ký tự"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $cate = $this -> category -> addCategoryGame($title);
        if($cate){
            $data = [
                "status" => "success",
                "message" => "Thêm thành công"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }else{
            $data = [
                "status" => "error",
                "message" => "Có lỗi xảy ra vui lòng thử lại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
    }

    public function cateGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            header('location: ' . URLROOT . '/', true,302);
            exit();
        }    
        $data = [
            'cateGame' => $this -> category -> getAllCateGame()
        ];
        view("admin/cateGame", $data);
    }

    public function ActionHandleCategoryGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }   

        if(!isset($_POST["action"]) && !isset($_POST["idRemove"]) || !isset($_POST["action"]) && !isset($_POST["idEdit"]) &&!isset($_POST["content"])  ){
            $data = [
                "status" => "error",
                "message" => "Dữ liệu cate không tồn tại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $action = $_POST["action"];
        switch($action) {
            case 'remove':
                $this -> removeCateGame($_POST["id"]);
                break;
            case 'edit':
                $this -> editNameCate($_POST["id"],$_POST["content"]);
                break;
            default : 
                $data = [
                    "status" => "error",
                    "message" => "Action khong hơp lệ"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            break;
        }
       
    }

    public function removeCateGame($id){
        $getCate = $this -> category -> getCategoryById($id);
        if($getCate){
            $getGame = $this -> game -> getGameByCate($id);
            if(count($getGame) > 0){
                $getAccount = $this -> accountGame -> getAccountGameByIdGame($getGame[0] -> id);
                if(count($getAccount) > 0){
                    foreach($getAccount as $ac){
                        $this -> accountGame -> removeImageAccountGame($ac -> id);
                    }   
                }
                $removeServer = $this -> serverGame -> deleteServerByIdGame($getGame[0] -> id);
                $removeAccountnGame = $this -> accountGame -> removeAccountGameByIdGame($getGame[0] -> id);
                if($removeAccountnGame && $removeServer){
                    $removeGame = $this -> game -> removeGameByidCate($id);
                    $removeCate = $this -> category -> removeCateGameById($id);
                    if($removeCate && $removeGame){
                        $data = [
                            "status" => "success",
                            "message" => "Xoá thành công"
                        ];
                        header('Content-Type: application/json');
                        echo json_encode($data);
                        exit();
                    }
                }
            }else {
                $removeGame = $this -> game -> removeGameByidCate($id);
                $removeCate = $this -> category -> removeCateGameById($id);
                if($removeCate && $removeGame){
                    $data = [
                        "status" => "success",
                        "message" => "Xoá thành công"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
                }
            }
        }

        $data = [
            "status" => "error",
            "message" => "Xoá thất bại"
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
        
    }

    public function editNameCate($id,$content){
        if(strlen($content) < 6 ){
            $data = [
                "status" => "error",
                "message" => "title cate phải lớn hơn 6 ký tự"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $cate = $this -> category -> editCategoryGame($id,$content);
        if($cate){
            $data = [
                "status" => "success",
                "message" => "Update Thành công"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }else{
            $data = [
                "status" => "error",
                "message" => "Update Thất bại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
    }

    public function addNewGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        } 
        if (isset($_POST['title']) && isset($_POST['id_cate']) && isset($_FILES['image'])) {
            $title = $_POST['title'];
            $id_cate = $_POST['id_cate'];
            if(empty($title) || empty($id_cate) || empty($_FILES['image'])){
                $data = [
                    "status" => "error",
                    "message" => "Dữ liệu không được để trống"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();   
            }
            if($id_cate == 0){
                $data = [
                    "status" => "error",
                    "message" => "Category name không hợp lệ"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();     
            }
            $target_dir = "template/theme/assets/image/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {            
                $data = [
                    "status" => "error",
                    "message" => "File sai định dạng"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();            
            }
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $addGame = $this -> game -> addNewGame($title,"template/theme/assets/image/".$_FILES["image"]["name"], $id_cate);
                if($addGame){
                    $data = [
                        "status" => "success",
                        "message" => "Thêm thành công"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();  
                }else{
                    $data = [
                        "status" => "error",
                        "message" => "Thêm thất bại"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();   
                }
            } else {
                $data = [
                    "status" => "error",
                    "message" => "thêm file thất bại"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();   
            }
        }else{
            $data = [
                "status" => "error",
                "message" => "Dữ liệu không tồn tại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();  
        }
    }
    

    public function game(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            header('location: ' . URLROOT . '/', true,302);
            exit();
        }    
        $data = [
            'game' => $this -> game -> getAllGame(),
            "category" => $this -> category -> getAllCateGame()
        ];
        view("admin/listGame", $data);
    }

    public function ActionHandleGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }   
 
        if(!isset($_POST["action"]) && !isset($_POST["id"]) || !isset($_POST["action"]) && !isset($_POST["title"]) &&!isset($_FILES['image']) && !isset($_POST["id"])  ){
            $data = [
                "status" => "error",
                "message" => "Dữ liệu cate không tồn tại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
       
        $action = $_POST["action"];
        switch($action) {
            case 'remove':
                $this -> removeGame($_POST["id"]);
                break;
            case 'edit':
                $this -> editGame($_POST["id"],$_POST["title"],$_FILES["image"],$_POST["id_cate"]);
                break;
            default : 
                $data = [
                    "status" => "error",
                    "message" => "Action khong hơp lệ"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            break;
        }
       
    }

    public function removeGame($id){
        $getGame = $this -> game -> getGameById($id);
        if($getGame){
                $getAccount = $this -> accountGame -> getAccountGameByIdGame($getGame -> id);
                if(count($getAccount) > 0){
                    foreach($getAccount as $ac){
                        $this -> accountGame -> removeImageAccountGame($ac -> id);
                    }       
                }
                $removeServer = $this -> serverGame -> deleteServerByIdGame($getGame -> id);
                $removeAccountnGame = $this -> accountGame -> removeAccountGameByIdGame($getGame -> id);
                if($removeAccountnGame && $removeServer){
                    $removeGame = $this -> game -> removeGameByid($id);
                    if($removeGame){
                        $data = [
                            "status" => "success",
                            "message" => "Xoá thành công"
                        ];
                        header('Content-Type: application/json');
                        echo json_encode($data);
                        exit();
                    }
            }
        }
        $data = [
            "status" => "error",
            "message" => "Xoá thất bại"
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
        
    }

    public function editGame($id,$name,$image,$id_cate){
        if(isset($id_cate) && $id_cate == 0){
            $data = [
                "status" => "error",
                "message" => "Category name không hợp lệ"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();     
        }
        if(empty($name) || empty($id_cate) || empty($image) || empty($id)){
            $data = [
                "status" => "error",
                "message" => "Dữ liệu không được để trống"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();   
        }
        if(strlen($name) < 6 ){
            $data = [
                "status" => "error",
                "message" => "title cate phải lớn hơn 6 ký tự"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        
        $target_dir = "template/theme/assets/image/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {            
            $data = [
                "status" => "error",
                "message" => "File sai định dạng"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();            
        }
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                $cate = $this -> game -> UpdateGame($id,$name,"template/theme/assets/image/".$image["name"],$id_cate);
                if($cate){
                    $data = [
                        "status" => "success",
                        "message" => "Update Thành công"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
            }
           
        }else{
            $data = [
                "status" => "error",
                "message" => "Update Thất bại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
    }

    //server game
    public function getServerGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        } 
        if(isset($_POST["id"]) && !empty($_POST["id"])){
            $id = $_POST["id"];
            $server = $this -> serverGame -> getServerGameByGame($id);
            $data = [
                "status" => "success",
                "message" => "Lấy dữ liệu thành công",
                "data" => $server
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }

        $data = [
            "status" => "error",
            "message" => "Lấy dữ liệu server thất bại, vui lòng thử lại"
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
    public function addNewServerGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        } 
        if (isset($_POST['title']) && isset($_POST['id_game']) && isset($_FILES['image'])) {
            $title = $_POST['title'];
            $id_cate = $_POST['id_game'];
            if(empty($title) || empty($id_cate) || empty($_FILES['image'])){
                $data = [
                    "status" => "error",
                    "message" => "Dữ liệu không được để trống"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();   
            }
            if($id_cate == 0){
                $data = [
                    "status" => "error",
                    "message" => "Category name không hợp lệ"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();     
            }
            $target_dir = "template/theme/assets/image/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {            
                $data = [
                    "status" => "error",
                    "message" => "File sai định dạng"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();            
            }
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $addGame = $this -> serverGame -> addNewServerGame($title,"template/theme/assets/image/".$_FILES["image"]["name"], $id_cate);
                if($addGame){
                    $data = [
                        "status" => "success",
                        "message" => "Thêm thành công"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();  
                }else{
                    $data = [
                        "status" => "error",
                        "message" => "Thêm thất bại"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();   
                }
            } else {
                $data = [
                    "status" => "error",
                    "message" => "thêm file thất bại"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();   
            }
        }else{
            $data = [
                "status" => "error",
                "message" => "Dữ liệu không tồn tại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();  
        }
    }

    public function serverGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            header('location: ' . URLROOT . '/', true,302);
            exit();
        }    
        $data = [
            'server' => $this -> serverGame -> getAllServerGameJoinGame(),
            "game" => $this -> game -> getAllGames()
        ];
        view("admin/listServerGame", $data);
    }

    public function ActionHandlServereGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }   
 
        if(!isset($_POST["action"]) && !isset($_POST["id"]) || !isset($_POST["action"]) && !isset($_POST["title"]) &&!isset($_FILES['image']) && !isset($_POST["id"])  ){
            $data = [
                "status" => "error",
                "message" => "Dữ liệu cate không tồn tại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
       
        $action = $_POST["action"];
        switch($action) {
            case 'remove':
                $this -> removeServerGame($_POST["id"]);
                break;
            case 'edit':
                $this -> editServerGame($_POST["id"],$_POST["title"],$_FILES["image"],$_POST["id_cate"]);
                break;
            default : 
                $data = [
                    "status" => "error",
                    "message" => "Action khong hơp lệ"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            break;
        }
       
    }

    public function removeServerGame($id){        
        $getAccount = $this -> accountGame -> getAccountGameByIdServerGame($id);
        if(count($getAccount) > 0){
            foreach($getAccount as $ac){
                $this -> accountGame -> removeImageAccountGame($ac -> id);
            }       
        }
        $removeServer = $this -> serverGame -> deleteServerByIde($id);
        $removeAccountnGame = $this -> accountGame -> removeAccountByServerId($id);
            if($removeAccountnGame && $removeServer){
                $data = [
                    "status" => "success",
                    "message" => "Xoá thành công"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }
        $data = [
            "status" => "error",
            "message" => "Xoá thất bại"
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
        
    }

    public function editServerGame($id,$name,$image,$id_cate){
        if(isset($id_cate) && $id_cate == 0){
            $data = [
                "status" => "error",
                "message" => "Category name không hợp lệ"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();     
        }
        if(empty($name) || empty($id_cate) || empty($image) || empty($id)){
            $data = [
                "status" => "error",
                "message" => "Dữ liệu không được để trống"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();   
        }
        if(strlen($name) < 6 ){
            $data = [
                "status" => "error",
                "message" => "title cate phải lớn hơn 6 ký tự"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        
        $target_dir = "template/theme/assets/image/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {            
            $data = [
                "status" => "error",
                "message" => "File sai định dạng"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();            
        }
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                $cate = $this -> serverGame -> UpdateServerGame($id,$name,"template/theme/assets/image/".$image["name"],$id_cate);
                if($cate){
                    $data = [
                        "status" => "success",
                        "message" => "Update Thành công"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();
            }
           
        }else{
            $data = [
                "status" => "error",
                "message" => "Update Thất bại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
    }

    // account game

    public function addNewAccountGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        } 
        if (isset($_POST['name']) && isset($_POST['id_game'])&& isset($_POST['id_server']) && isset($_POST['price']) && isset($_POST['tk']) && isset($_POST['mk']) && isset($_POST['description']) && isset($_FILES['image'])) {
            $title = $_POST['name'];
            $id_game = $_POST['id_game'];
            $id_server = $_POST['id_server'];
            $price = $_POST['price'];
            $tk = $_POST['tk'];
            $mk = $_POST['mk'];
            $rank= $_POST['rank'];
            $description = $_POST['description'];
            $image = $_FILES['image'];
            if(empty($title) || empty($id_game) || empty($id_server) || empty($price) || empty($tk)|| empty($mk)|| empty($description)|| empty($image)){
                $data = [
                    "status" => "error",
                    "message" => "Dữ liệu không được để trống"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();   
            }
            if($id_server == 0 ||  $id_game == 0){
                $data = [
                    "status" => "error",
                    "message" => "server hoặc game name không hợp lệ"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();     
            }
            $target_dir = "template/theme/assets/image/";
            $target_file = $target_dir . basename($image["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {            
                $data = [
                    "status" => "error",
                    "message" => "File sai định dạng"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();            
            }
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $addGame = $this -> accountGame -> addNewAccountGame($title,$description,$id_game,$price,"template/theme/assets/image/".$image["name"],$rank,$tk,$mk,$id_server);
                if($addGame){
                    $data = [
                        "status" => "success",
                        "message" => "Thêm thành công"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();  
                }else{
                    $data = [
                        "status" => "error",
                        "message" => "Thêm thất bại"
                    ];
                    header('Content-Type: application/json');
                    echo json_encode($data);
                    exit();   
                }
            } else {
                $data = [
                    "status" => "error",
                    "message" => "thêm file thất bại"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();   
            }
        }else{
            $data = [
                "status" => "error",
                "message" => "Dữ liệu không tồn tại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();  
        }
    }

    public function accountGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            header('location: ' . URLROOT . '/', true,302);
            exit();
        }

        $data = [
            "account" => $this->accountGame -> getAllAccountDetails(),
            "game" => $this -> game -> getAllGames()

        ];
        view("admin/listAccountGame",$data);
    }

    public function ActionHandleAccountGame(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }   
 
        if(!isset($_POST["action"]) && !isset($_POST["id"]) || !isset($_POST["action"]) && !isset($_POST['id'])  &&!isset($_POST['name']) && !isset($_POST['id_game'])&& !isset($_POST['id_server']) && !isset($_POST['price']) && !isset($_POST['tk']) && !isset($_POST['mk']) && !isset($_POST['description']) && !isset($_FILES['image'])){
            $data = [
                "status" => "error",
                "message" => "Dữ liệu cate không tồn tại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $action = $_POST["action"];
        switch($action) {
            case 'remove':
                $this -> removeAccountGame($_POST["id"]);
                break;
            case 'edit':
                $this -> updateAccountGame($_POST['id'],$_POST['name'],$_POST['price'],$_POST['tk'],$_POST['mk'],$_POST['id_game'],$_POST['id_server'],$_POST['description'],$_FILES['image'],$_POST['rank']);
                break;
            default : 
                $data = [
                    "status" => "error",
                    "message" => "Action khong hơp lệ"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            break;
        }
    }

    public function addImages(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadDir = "template/theme/assets/image/";
            foreach ($_FILES['files']['name'] as $key => $name) {
                $targetFile = $uploadDir . basename($name);
                if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFile)) {
                    $this -> accountGame -> addImageById($_POST["id"],$targetFile);
                    $data = [
                        "status" => "success",
                        "message" => "Upload thanh coong"
                    ];
                } else {
                    $data = [
                        "status" => "error",
                        "message" => "Upload thất bại"
                    ];
                }
            }
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();    
        }
    }
    public function removeImage(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }  
        if(!isset($_POST["id"])){
            $data = [
                "status" => "error",
                "message" => "ID khoong ton tai"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
        $removeImage = $this -> accountGame -> removeImageAccountGameById($_POST["id"]);
        if($removeImage){
            $data = [
                "status" => "success",
                "message" => "Xoá thành công"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }else{
            $data = [
                "status" => "error",
                "message" => "Xoá thất bại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
    }
    public function getImage(){
        if(!isset($_SESSION["user"]) || !$_SESSION["user"]["isAdmin"]){
            $data = [
                "status" => "error",
                "message" => "Bạn không thể truy cập"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }  
        if(isset($_POST["id"]) && !empty($_POST["id"])){
            $data = [
                "status" => "success",
                "message" => "Lấy dữ liệu thành công",
                "data" => $this -> accountGame -> getImageById($_POST["id"])
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();        
        }

        $data = [
            "status" => "error",
            "message" => "Có looix xảy ra vui lòng thử lại"
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();        
        
    }

    public function updateAccountGame($id,$title,$price,$tk,$mk,$id_game,$id_server,$description,$image,$rank){
        if(empty($id) || empty($title) || empty($id_game) || empty($id_server) || empty($price) || empty($tk)|| empty($mk)|| empty($description)|| empty($image)){
            $data = [
                "status" => "error",
                "message" => "Dữ liệu không được để trống"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();   
        }
        if($id_server == 0 ||  $id_game == 0){
            $data = [
                "status" => "error",
                "message" => "server hoặc game name không hợp lệ"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();     
        }
        $target_dir = "template/theme/assets/image/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {            
            $data = [
                "status" => "error",
                "message" => "File sai định dạng"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();            
        }
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $addGame = $this -> accountGame -> UpdateAccountGame($title,$description,$id_game,$price,"template/theme/assets/image/".$image["name"],$rank,$tk,$mk,$id_server,$id);
            if($addGame){
                $data = [
                    "status" => "success",
                    "message" => "Edit thành công"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();  
            }else{
                $data = [
                    "status" => "error",
                    "message" => "Edit thất bại"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();   
            }
        } else {
            $data = [
                "status" => "error",
                "message" => "thêm file thất bại"
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
            exit();   
        }
    }

    public function removeAccountGame($id){
        $getAccount = $this -> accountGame -> getAccountGame($id);
        if($getAccount){           
            $removeImageAccountnGame= $this -> accountGame -> removeImageAccountGame($getAccount -> id);    
            $removeAccountnGame = $this -> accountGame -> removeAccountGameById($id);
            if($removeImageAccountnGame && $removeAccountnGame){
                $data = [
                    "status" => "success",
                    "message" => "Xoá thành công"
                ];
                header('Content-Type: application/json');
                echo json_encode($data);
                exit();
            }
        }
        $data = [
            "status" => "error",
            "message" => "Xoá thất bại"
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();      
        
    }
}