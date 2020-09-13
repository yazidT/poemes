<?php

require "header.php";
require_once "../controller/fonctions.php";

$stmt = $pdo->prepare("SELECT * FROM postes WHERE cat_id = ?");
$stmt->execute(array(2));
$proverbe = $stmt->fetch();


?>




<div class="container">
<div class="row">
<div class="jumbotron col-md-8">
    <h3 > Citation du jour : </h3>

    <h4 class="display-5"> " <?= $proverbe['contenu'] ?> "</h4>
    <p class="lead"><?= $proverbe['auteur'] ?></p>
    <hr class="my-4">
    <p>Publié par <?= trouver_user($proverbe['uti_id'], $pdo) ?> le :<?= $proverbe['date'] ?></p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
</div>
</div>
</div>




<?php

require "footer.php";

?>
