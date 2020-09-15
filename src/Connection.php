<?php 


class Connection
{
    public static function getPDO():\PDO
    {
        return new \PDO('mysql:host=localhost;dbname=proverbes', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
    }

}

