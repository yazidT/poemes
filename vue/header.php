<?php
require_once "../src/Connexion.php";
require_once "../src/User.php";


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proverbes et citations</title>
 
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    	<!--  Fonts  --> 
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php"> <img src="../img/logo.png" alt="Logo du site" id="logo"> Poèmes et citations</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> se connecter </span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Page d'acceuil </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="poemes.php">Poèmes</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="proverbes.php">Proverbes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="citations.php">Citations</a>
      </li>

    </ul>
    <a href="login.php" class="btn btn-outline-success">Connrexion / créer un compte</a>


  </div>
</nav>
    </header>