<?php 

/**
 * Home controller
 */
namespace App\Controllers;

class Home extends \Core\Controller
{
    
    /**
     * Show index
     * 
     * @return void
     */
    public function indexAction(){
        echo "<br>Hello from the index action in the Home controller!<br>";
    }

    /**
     * Echo before
     * 
     * @return void
     */
    protected function before(){
        echo "<br>Before<br>";
    }

     /**
     * Echo after
     * 
     * @return void
     */
    protected function after(){
        echo "<br>After<br>";
    }
}

?>