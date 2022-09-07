<?php 
/**
 * Post Model
 */
namespace App\Models;

use PDO;
use PDOException;

 class Post extends \Core\Model
 {
    /**
     * Get all the post as an associative array
     * 
     * @return array
     */

     public static function getAll(){

        try {
            $db = static::getDB();

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