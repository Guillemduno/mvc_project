<?php 

    require('../Core/Router.php'); 

    echo "Request URL: ".$_SERVER['REQUEST_URI']."<br>";
    echo "Request URL: \"".$_SERVER['QUERY_STRING']."\"<br>";

    $url = $_SERVER['QUERY_STRING'];
    $routes = new Router;

    $routes->add("''", ["controller"=>'home', "action"=>'index']);
    $routes->add("post", ["controller"=>'post', "action"=>'show']);
    //$routes->add("post/18", ["controller"=>'post', "action"=>'show']);
    $routes->add("{controller}/{action}");
    $routes->add("{controller}/{id:\d+}/{action}");
    $routes->add("{controller}/{action}/{test}", ['tests' => 23]);
    $routes->add('admin/{action}/{controller}');

    // Show Routes
    echo "Show routes<pre>";
    echo htmlspecialchars(print_r($routes->getRoutes()));
    echo "</pre>";

    $routes->match($url);

     // Show Params
     if ($routes->getParams()) {
        echo "Show params<pre>";
        print_r($routes->getParams());
        echo "</pre>";
     }else{
        echo "The url doesn't match with the routes.";
     }
  

    
?>