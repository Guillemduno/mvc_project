<?php 

class Router{
    protected $routes = [];
    protected $params = [];

    public function add($route, $params = []){

        // Convert the route to a regular expresion: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);
        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
        // Convert variables with custon regulars expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)', $route);
        // Add start and end delimeters and case insensitive flag.
        $route = "/^".$route."$/i";

        $this->routes[$route] = $params;
    } 

    public function getRoutes(){
        return $this->routes;
    }

    public function match($url){

        foreach ($this->routes as $route => $params) {
            if(preg_match($route, $url, $matches)){
                foreach ($matches as $key => $match) {
                    if(is_string($key)){
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;

        // $regular_expression = "/^(?P<controller>[a-z-]+)\/(?P<index>[a-z-]+)$/";

        // if (preg_match($regular_expression, $url, $matches)) {
        //     $params = [];

        //     foreach ($matches as $key => $match) {
        //         if(is_string($key)){
        //             $params[$key] = $match;
        //         }
        //     }
        //     $this->params = $params;
        //     return true;
        // }
    }

    public function getParams(){
        return $this->params;
    }
}


?>