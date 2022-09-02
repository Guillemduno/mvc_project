<?php 

namespace Core;
/**
 * View
 */

 class View{

    /**
     * Render a view
     * 
     * @parameter string $view The view file
     * 
     * @return void
     */
    public static function render($view){
        $file = "../App/Views/$view"; // Relative to Core directory

        if (is_readable($file)) {
            require $file;
        }else{
            echo "The file $file is not found...";
        }
    }
 }


?>