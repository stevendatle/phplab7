<?php

namespace phplab7\Model;

class database
{
    private static $user = "root";
    private static $pass = "root";
    private static $dsn = "mysql:host=localhost;dbname=phpdb";
    private static $dbcon;

    private function __construct(){

    }
    public static function getDb()
    {
        if(!isset(self::$dbcon)){
            try {
                self::$dbcon = new \PDO(self::$dsn, self::$user, self::$pass);
                self::$dbcon->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$dbcon->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            } catch (\PDOException $e){
                $msg = $e->getMessage();
                include '../error.php';
                exit();
            }

        }
        return self::$dbcon;
    }
}
?>