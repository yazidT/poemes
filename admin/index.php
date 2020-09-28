<?php
require_once "../controller/fonctions.php";


if(isset($_POST['user']))
{
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE user = ?");
    $stmt->execute(array($_POST['user']));
    $user = $stmt->fetch();
    var_dump($user);

    if($user['deleted'] === '0' && $user['user'] === $_POST['user'] && $user['password'] === $_POST['passe'] )
    {
        session_start();

        $_SESSION['admin_id'] = $user['id']; 
        $_SESSION['admin_name'] = $user['user']; 

        header('location: dashboard.php');
        
        exit;
    }


}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="../img/logo.png">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">


</head>


<body class="text-center">
    <div class="container mt-5">
        <form method="POST" class="form-signin">
            <img class="mb-4" src="../img/logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
            <label for="inputEmail" class="sr-only"> Votre adresse email </label>
            <input name="user" type="text" id="inputEmail" class="form-control mb-5" placeholder="Email ou username" required autofocus>
            <label for="inputPassword" class="sr-only">Votre mot de passe</label>
            <input name="passe" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2016</p>
        </form>

    </div>
    
</body>
</html>