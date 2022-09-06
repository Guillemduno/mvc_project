<?php 
/**
 * Post Model
 */
namespace App\Models;

use PDO;
use PDOException;

 class Post{
    /**
     * Get all the post as an associative array
     * 
     * @return array
     */

     public static function getAll(){

        $host = "localhost";
        $dbname = "mvc";
        $user = "root";
        $password = "";


        try {
            $db = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $user, $password);

            $stmt = $db->query('SELECT id, title, content from posts
                                order by created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
     }

 }

?>