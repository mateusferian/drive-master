<?php

    class Connection
    {
        public static $instance;

        public static function getConnection()
        {

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "bd_lider";

            if(!isset(self::$instance)){
                self::$instance = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            }

            return self::$instance;
        }
    }

?>