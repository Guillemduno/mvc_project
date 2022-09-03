<?php

/**
 * View
 * 
 * 
 */

namespace Core;

class View{

    /**
     * Render a view
     * 
     * @params 
     *      string $view The view file
     *      array $arg Variables passed
     * 
     * 
     * @return void
     */
    public static function render($view, $arg =[]){

        extract($arg, EXTR_SKIP);

        $file = "../App/Views/$view"; // Relative to Core directory

        if (is_readable($file)) {
            require $file;
        }else{
            echo "The file $file is not found...";
        }
    }

    /**
     * Render a view with Twig
     * 
     * @params
     *      string $view The view file
     *      array $arg Variables passed
     */
    public static function renderTemplate($template, $args = []){
        
        static $twig = null;

        if ($twig === null) {

            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/App/Views');
            $twig = new \Twig\Environment($loader,  ['debug' => true]);

            echo $twig->render($template, $args);
        }


    }
}


?>