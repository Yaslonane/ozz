<?php

/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 14.04.16
 * Time: 18:33
 */
class Db{

    public static function getConnection(){

        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        
        try{
            $db = new PDO($dsn, $params['user'], $params['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec('SET NAMES utf8'); //задаём кодировку ввода/вывода БД

        return $db;

        } catch (PDOException $e){
            echo "Error connect DB:" . $e->getMessage();
        }
        
    }

}

?>
