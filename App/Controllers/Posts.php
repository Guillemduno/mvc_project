<?php 
/**
 * Posts controller
 */
namespace App\Controllers;

use App\Models\Post;
use Core\View;

class Posts extends \Core\Controller
{

    /**
     * Show the index page
     * 
     * @return void
     */
    public function indexAction(){

        $posts = Post::getAll();
        
        View::renderTemplate("Posts/index.html",
           ['posts' => $posts]  
        );

    }

    /**
     * Show the add new page
     * 
     * @return void
     */
    public function addNewAction(){
        echo "Hello from the addNew action in the Posts controller!!!";
    }

    /**
     *  Show the edit page
     * 
     * @return void
     */
    public function editAction(){
        echo "<p>Hello from the edit action in the Posts controller</p>";
        // echo "<p>Route parameters: <pre>".htmlspecialchars(print_r($this->param_routes, true))."</pre></p>";
        echo "<p>Route parameters: <pre>".print_r($this->param_routes, true)."</pre></p>";
    }
}

?>