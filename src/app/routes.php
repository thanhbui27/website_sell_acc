<?php 

// Static pages routes


$router->addRoute('admin/dashboard', ['controller' => 'Dashboard', 'action' => 'home']);
$router->addRoute('admin/dashboard/users', ['controller' => 'UserController', 'action' => 'managerUser']);
$router->addRoute('admin/dashboard/billing', ['controller' => 'HistoryBuyController', 'action' => 'managerBilling']);
$router->addRoute('admin/dashboard/games', ['controller' => 'ManagerGame', 'action' => 'index']);
$router->addRoute('admin/dashboard/games/cate-game', ['controller' => 'ManagerGame', 'action' => 'cateGame']);
$router->addRoute('admin/dashboard/games/cate-game/action', ['controller' => 'ManagerGame', 'action' => 'ActionHandleCategoryGame']);
$router->addRoute('admin/dashboard/games/addNewGame', ['controller' => 'ManagerGame', 'action' => 'addNewGame']);
$router->addRoute('admin/dashboard/games/game', ['controller' => 'ManagerGame', 'action' => 'game']);
$router->addRoute('admin/dashboard/games/game/action', ['controller' => 'ManagerGame', 'action' => 'ActionHandleGame']);
$router->addRoute('admin/dashboard/games/addNewServerGame', ['controller' => 'ManagerGame', 'action' => 'addNewServerGame']);
$router->addRoute('admin/dashboard/games/server-game', ['controller' => 'ManagerGame', 'action' => 'serverGame']);
$router->addRoute('admin/dashboard/games/getServerGame', ['controller' => 'ManagerGame', 'action' => 'getServerGame']);
$router->addRoute('admin/dashboard/games/server-game/action', ['controller' => 'ManagerGame', 'action' => 'ActionHandlServereGame']);
$router->addRoute('admin/dashboard/games/addNewAccountGame', ['controller' => 'ManagerGame', 'action' => 'addNewAccountGame']);
$router->addRoute('admin/dashboard/games/account-game', ['controller' => 'ManagerGame', 'action' => 'accountGame']);
$router->addRoute('admin/dashboard/games/account-game/getImage', ['controller' => 'ManagerGame', 'action' => 'getImage']);
$router->addRoute('admin/dashboard/games/account-game/addImages', ['controller' => 'ManagerGame', 'action' => 'addImages']);
$router->addRoute('admin/dashboard/games/account-game/removeImage', ['controller' => 'ManagerGame', 'action' => 'removeImage']);
$router->addRoute('admin/dashboard/games/account-game/action', ['controller' => 'ManagerGame', 'action' => 'ActionHandleAccountGame']);
$router->addRoute('admin/dashboard/addCategory', ['controller' => 'ManagerGame', 'action' => 'addCategoryGame']);



$router->addRoute('', ['controller' => 'Index', 'action' => 'home']);

$router->addRoute('auth/loginPage', ['controller' => 'LoginController', 'action' => 'loginPage']);
$router->addRoute('auth/registerPage', ['controller' => 'RegisterController', 'action' => 'registerPage']);
$router->addRoute('auth/logout', ['controller' => 'LoginController', 'action' => 'logOut']);

$router->addRoute('auth/login', ['controller' => 'LoginController', 'action' => 'loginUser']);
$router->addRoute('auth/register', ['controller' => 'RegisterController', 'action' => 'registerUser']);
$router->addRoute('auth/profile', ['controller' => 'UserController', 'action' => 'index']);
$router->addRoute('auth/lockUser', ['controller' => 'UserController', 'action' => 'lockUser']);
$router->addRoute('auth/unLock', ['controller' => 'UserController', 'action' => 'unLock']);
$router->addRoute('auth/balanceFluctuations', ['controller' => 'UserController', 'action' => 'balanceFluctuations']);
$router->addRoute('auth/changePassword', ['controller' => 'UserController', 'action' => 'changePassword']);
$router->addRoute('auth/rechargeCard', ['controller' => 'RechargeController', 'action' => 'rechargeCard']);
$router->addRoute('auth/rechargeBanking', ['controller' => 'RechargeController', 'action' => 'rechargeBanking']);
$router->addRoute('auth/historyBuy', ['controller' => 'HistoryBuyController', 'action' => 'index']);



$router -> addRoute("server-game/{id:\d+}",['controller' => 'ServerGameController' , 'action' => 'index']);
$router -> addRoute("server-game/acc/{id:\d+}",['controller' => 'AccountController' , 'action' => 'index']);
$router -> addRoute("server-game/acc/{id:\d+}/filter",['controller' => 'AccountController' , 'action' => 'filterAccount']);
$router -> addRoute("server-game/acc/{id:\d+}/detail",['controller' => 'AccountController' , 'action' => 'detailAccount']);

$router -> addRoute("server-game/acc/order", ['controller' => 'HistoryBuyController' , 'action' => 'orderAccount']);


$router->setParams(getUri());