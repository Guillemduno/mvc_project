<?php
   require_once dirname(__DIR__) . '/vendor/autoload.php';

   use Core\Router;

   $url = $_SERVER['QUERY_STRING'];
   $routes = new Router;

   $routes->add("", ["controller"=>'home', "action"=>'index']);
   $routes->add("{controller}/{action}");
   $routes->add("{controller}/{id:\d+}/{action}");
   $routes->add("admin/{controller}/{action}", ["namespace" => "Admin"]);

   $routes->dispatch($url);
  
?>