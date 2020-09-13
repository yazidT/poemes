<?php

require 'db.php';

function trouver_user($numero, $pdo){

  
    
    $stmt = $pdo->prepare("SELECT pseudo FROM utilisateurs WHERE id = ?");
    $stmt->execute(array($numero));
    $pseudo = $stmt->fetch();

    return $pseudo["pseudo"];
}
