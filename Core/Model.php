<?php

namespace Core;

use PDO;
use App\Config;

/**
* base model class
*/
abstract class Model
{
  /**
  
    TODO:
    - comment all functions
    - comment header of base model class
    - clean up - add feature - basically do everything
    - i feel like exceptions arent working - build and fix
  
   */
  
    protected static function getDB() {
      static $db = null;

      if ($db === null) {

        try {
          $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';

          $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessages();
        }
      }
      return $db;
    }

}