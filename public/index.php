<?php 

   // require('../App/Controllers/Posts.php'); 
   // require('../App/Controllers/Home.php'); 
   // require('../Core/Router.php');

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
   $routes->add("post", ["controller"=>'post', "action"=>'show']);
   $routes->add("{controller}/{action}");
   $routes->add("{controller}/{id:\d+}/{action}");
   $routes->add("{controller}/{action}/{test}", ['tests' => 23]);
   $routes->add('admin/{action}/{controller}');

   $routes->dispatch($url);
  
?>