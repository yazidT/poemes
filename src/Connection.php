<?php 


class Connection
{
    public static function getPDO():\PDO
    {
        return new \PDO('mysql:host=localhost;dbname=proverbes', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
    }



    public static function getSession()
    {
        if(!isset($_SESSION['user_name']))
        {
            header('location: index.php');
            exit;
        }
    }

}

