<?php 

namespace Core;

abstract class Controller{

    protected $param_routes = [];

    public function __construct($param_routes)
    {
        $this->param_routes = $param_routes;
    }

}

?>