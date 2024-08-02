<?php 

// Static pages routes
$router->addRoute('', ['controller' => 'Index', 'action' => 'home']);

$router->addRoute('auth/loginPage', ['controller' => 'LoginController', 'action' => 'loginPage']);
$router->addRoute('auth/registerPage', ['controller' => 'RegisterController', 'action' => 'registerPage']);
$router->addRoute('auth/logout', ['controller' => 'LoginController', 'action' => 'logOut']);

$router->addRoute('auth/login', ['controller' => 'LoginController', 'action' => 'loginUser']);
$router->addRoute('auth/register', ['controller' => 'RegisterController', 'action' => 'registerUser']);

$router -> addRoute("server-game/{id:\d+}",['controller' => 'ServerGameController' , 'action' => 'index']);


//This is template route

// $router->addRoute('about', ['controller' => 'Index', 'action' => 'about']);

$router->addRoute('test/taskss',['controller' => 'Test', 'action' => 'tasks']);
// $router->addRoute('test/add-task',['controller' => 'Test', 'action' => 'addTask']);
// Routes in main controllers/ folder (Namespace \Controllers)
// $router->addRoute('{controller}/{action}');
// $router->addRoute('{controller}/{action}/{id:\d+}');
// $router->addRoute('{controller}/{id:\d+}/{action}');

// // Routes in folder controllers/folder1/ (Namespace \Controllers\Folder1)
// $router->addRoute('folder1/{controller}/{action}', ['namespace' => 'Folder1']);
// $router->addRoute('folder1/{controller}/{id:\d+}/{action}', ['namespace' => 'Folder1']);

// // Routes in folder controllers/folder2/ (Namespace \Controllers\Folder2)
// $router->addRoute('folder2/{controller}/{action}', ['namespace' => 'Folder2']);
// $router->addRoute('folder2/{controller}/{id:\d+}/{action}', ['namespace' => 'Folder2']);

$router->setParams(getUri());