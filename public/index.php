<?php

   require_once dirname(__DIR__) . '/vendor/autoload.php';

   // Autoload controllers.
   spl_autoload_register(function($class){
      $root = dirname(__DIR__);
      $file = $root.'/'.str_replace('\\', '/', $class).'.php';
      if (is_readable($file)) {
         require $file;
      }
   });

   use Core\Router;

   $url = $_SERVER['QUERY_STRING'];
   $routes = new Router;

   $routes->add("", ["controller"=>'home', "action"=>'index']);
   $routes->add("{controller}/{action}");
   $routes->add("{controller}/{id:\d+}/{action}");
   $routes->add("admin/{controller}/{action}", ["namespace" => "Admin"]);

   $routes->dispatch($url);
  
?>