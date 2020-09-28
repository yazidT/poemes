<?php 


class Connection
{
    public static function getPDO():\PDO
    {
        return new \PDO('mysql:host=localhost;dbname=proverbes', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
    }



    public static function getSessionAdmin()
    {
        if(!isset($_SESSION['admin_name']))
        {
            header('location: index.php');
            exit;
        }
    }


    public static function getSessionUser()
    {
        if(!isset($_SESSION['user_id']))
        {
            header('location: ../vue/login.php');
            exit;
        }
    }


}

