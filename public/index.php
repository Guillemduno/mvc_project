<?php 

   require('../App/Controllers/Posts.php'); 
   require('../Core/Router.php'); ;

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