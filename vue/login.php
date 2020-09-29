<?php


require "header.php";
session_start();


if(isset($_SESSION['user_email'])) header('location: ../user/index.php');

$connexionFailed = false;
$formFailed = false;
$hidden = '1';

$pdo = Connection::getPDO();
$user = new User();



// connexion to an existant account
if(isset($_POST['email']) )
{
    $email = $_POST['email'];
    $cUser = $user->getUser($pdo, $email);
    if($cUser){
        if( $cUser['email'] == $_POST['email'] && $cUser['email'] == $_POST['email']  )
        {
            session_start();
            $_SESSION['user_email']= $cUser['email'];
            header('location: ../user/index.php');
        }
    }else 
    $connexionFailed = true;
 
}

// Creating a new account
if(isset($_POST['email_new']) )
{
    $hidden = '0';

    
    $message = '';
    if($_POST['passe_new'] !== $_POST['passe_confirm']){
        $message .= '<p>Les mots de passe que vous avez saisis ne sont pas identiques</p>';
        $formFailed = true;
    }
    if(!isset($_POST['cgu']) ){
        $message .= "<p>veuillez accepter les condition générales d'utilisation</p>";
        $formFailed = true;
    }


    if(isset($_POST['nom_new']) && isset($_POST['prenom_new']) && isset($_POST['email_new']) && isset($_POST['passe_new']))
    {
        $nomNew = $_POST['nom_new'];
        $prenomNew = $_POST['prenom_new'];
        if(isset($_POST['pseudo_new'] ))$pseudoNew = $_POST['pseudo_new']; 
        $emailNew = $_POST['email_new'];
        $passeNew = $_POST['passe_new'];
        $passeConfirm = $_POST['passe_confirm'];

        $user->setNom($nomNew);    
        $user->setPrenom($prenomNew);    
        if($pseudoNew) $user->setPseudo($pseudoNew); 
        else $user->setPseudo($prenomNew);
        $user->setEmail($emailNew);    
        $user->setPasse($passeNew);

        $exist = $user->checkEmail($pdo, $emailNew);

        var_dump($exist);
        if($exist['email'])  
        {   
            if($exist['email'] === $_POST['email_new'])  
            {
                $message .= "<p>L'email que vous avez saisie existe déjà </p>";
                $formFailed = true;
            }

        }
        else
        {
            $user->createUser($pdo);
            session_start();
            $_SESSION['user_email']= $emailNew;
            header('location: ../user/index.php'); 
        }

    }


}
 


?>




<div class="container">
<div class="row">
<div class="jumbotron col-md-6">
    <h3 > Se connecter: </h3>
    <form action="" method="post">
        <fieldset>
            <legend>Connecxion a votre compte</legend>

            <div class="form-group">
                <label for="email">Email </label>
                <input name="email" type="email" class="form-control" id="email" required placeholder="votre email">
            </div>
            <div class="form-group">
                <label for="password">mot de passe</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="votre mot de passe">
            </div>
            <?php if($connexionFailed ): ?>
            <div class="alert alert-danger">
                votre email ou votre mot de passe est incorrecte
            </div>
            <?php endif ?>
            <div class="form-group">
                <a href=""> j'ai oublié mon mot de passe</a>
            </div>

    
            <button type="submit" class="btn btn-primary">valider</button>
        </fieldset>
    </form>
</div>
<div class="jumbotron col-md-6" >
    <h3 > Vous etes un vouvel utilisateur  : </h3>
    <h5 id="h5">pour créer un compte : <a href="#" id="user_form"> cliquuez ici </a></h5>
    <form action="" method="post">

      <fieldset id="user_new">
            <legend>Veillez entrer vos coordonnées </legend>


            <div class="form-group">
            <label for="nom_new">Votre nom</label>
                <input name="nom_new" required type="text" class="form-control" id="nom_new"  placeholder="Entrez votre nom" value="<?php if(isset($nomNew)) echo $nomNew; else  echo ''; ?>">
            </div>

            <div class="form-group">
            <label for="prenom_new">Votre prénom</label>
                <input name="prenom_new" required type="text" class="form-control" id="prenom_new" placeholder="Entrez votre prénom" value="<?php if(isset($prenomNew)) echo $prenomNew; else  echo ''; ?>">
            </div>
 
            <div class="form-group">
            <label for="pseudo_new">Un pseudonyme</label>
                <input name="pseudo_new" type="text" class="form-control" id="pseudo_new"  placeholder="facultatif" value="<?php if(isset($pseudoNew)) echo $pseudoNew; else  echo ''; ?>">
            </div>

            <div class="form-group">
            <label for="email_new">Votre addresse email</label>
                <input name="email_new" required type="text" class="form-control" id="email_new" placeholder="example@email.fr" value="<?php if(isset($emailNew)) echo $emailNew; else  echo ''; ?>">
            </div>

            <div class="form-group">
            <label for="passe_new">Veillez saisir un mot de passe</label>
                <input name="passe_new" required type="password" class="form-control" id="passe_new" placeholder="Entrez un  mot de passe" value="<?php if(isset($passeNew)) echo $passeNew; else  echo ''; ?>">
                <small id="emailHelp" class="form-text text-muted">le mot de passe doit contenir aumoins 8 caractères.</small>
            </div>
            <div class="form-group">
                <label for="passe_confirm">Confirmez votre mot de passe</label>
                <input name="passe_confirm" required type="password" class="form-control" id="passe_confirm" placeholder="Confirmez votre mot de passe" value="<?php if(isset($passeConfirm)) echo $passeConfirm; else  echo ''; ?>">
            </div>


            
            <div class="form-check disabled">
                <label class="form-check-label">
                    <input name="cgu" class="form-check-input" type="checkbox" >
                    Accepter les condition générales d'utilisation 
                </label>
            </div>

            <input name="hidden" type="hidden" value="<?= $hidden ?>" id="hidden">
            
            <?php if($formFailed ): ?>
            <div class="alert alert-danger">
                <?= $message ?>
            </div>
            <?php endif ?>
    
            <button type="submit" class="btn btn-primary mt-3">valider</button>
        </fieldset>
    </form>

</div>
</div>
</div>



<script>
    var fieldset = document.querySelector('#user_new');
    fieldset.style.display = 'none';
    var userForm = document.querySelector('#user_form');
    var h5 = document.querySelector('#h5');
    userForm.addEventListener('click', myFunction);
    var hidden = document.querySelector('#hidden');
    
    if(hidden.value == 0){

        fieldset.style.display = 'block';
        h5.style.display = 'none';

    }     

    function myFunction() {
        if(hidden.value == 1){

            fieldset.style.display = 'block';
            h5.style.display = 'none';
            hidden.value = 0;

        }       
    } 

    console.log(hidden.value);

</script>    
<?php

require "footer.php";

?>
