<?php
require_once "../controller/fonctions.php";
require_once "header.php";

if(empty($_GET) || isset($_GET['tous'])) $posts = $post->findPostsById($pdo, $cUser['id']);
if(isset($_GET['proverbes'])) $posts = $post->findPostsByTypeID($pdo, $cUser['id'], 1);
if(isset($_GET['citations'])) $posts = $post->findPostsByTypeID($pdo, $cUser['id'], 2);

$pages = explode("/", $_SERVER['PHP_SELF']);

$page = end($pages);
var_dump($page);

?>

<div class="row">
    
<?php
require 'leftSide.php';
?>
<div class="col-md-9 pl-0">
    <div class="jumbotron p-2">
        <h2>Mon compte : <?= $cUser['pseudo']?></h2>
    
    </div>



       <div class="container">
                <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link <?= empty($_GET) ? 'active' : '' ?><?= isset($_GET['tous']) ? 'active' : '' ?>" data-toggle="tab" href="?tous=1">Toutes mes publications</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link <?= isset($_GET['citations']) ? 'active' : '' ?>" data-toggle="tab" href="?citations=1">Citations </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link <?= isset($_GET['proverbes']) ? 'active' : '' ?>" data-toggle="tab" href="?proverbes=1">Proverbes </a>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade <?= empty($_GET) ? 'show active' : ''  ?><?=  isset($_GET['tous']) ? 'show active' : '' ?>">
            
            <a href="postNew.php" class="btn btn-outline-primary mt-4">Ajouter une nouvelle publication </a>
            <table class="table table-hover mt-3">
              <thead>
                <tr class="table-primary">
                  <th scope="col">Type</th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">texte</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($posts as $post) :?>
                        
                <tr>
                  <th scope="row"><?= $type->findTypeName($pdo,$post['type']) ?></th>
                  <td><?= $categorie->findCategoryName($pdo,$post['cat_id']) ?></td>
                  <td><?= $post['contenu'] ?></td>
                  <td><?= $post['date']?></td>
                  <td><a class="btn btn-primary mr-2 text-light" title="modifier"><i class="fas fa-edit"></i></a><a class="btn btn-danger text-light" title="Supprimer" onclick="return confirm('Etes vous sure de vouvoir supprimer cette publication?');"><i class="fas fa-trash"></i></a></td>
                </tr>
  
              <?php endforeach?>  

            </tbody>
            </table> 
            </div>
            <div class="tab-pane fade <?=  isset($_GET['citations']) ? 'show active' : '' ?>">
            <a href="postNew.php" class="btn btn-outline-primary mt-4">Ajouter un nouveau proverbe </a>
            <table class="table table-hover mt-3">
              <thead>
                <tr class="table-primary">
                  <th scope="col">Type</th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">texte</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($posts as $post) :?>
                        
                <tr>
                  <th scope="row"><?= $type->findTypeName($pdo,$post['type']) ?></th>
                  <td><?= $categorie->findCategoryName($pdo,$post['cat_id']) ?></td>
                  <td><?= $post['contenu'] ?></td>
                  <td><?= $post['date']?></td>
                  <td><a class="btn btn-primary mr-2 text-light" title="modifier"><i class="fas fa-edit"></i></a><a class="btn btn-danger text-light" title="Supprimer" onclick="return confirm('Etes vous sure de vouvoir supprimer cette publication?');"><i class="fas fa-trash"></i></a></td>
                </tr>
  
              <?php endforeach?>  

            </tbody>
            </table> 
            </div>
            <div class="tab-pane fade <?=  isset($_GET['proverbes']) ? 'show active' : '' ?>">
            <a href="postNew.php" class="btn btn-outline-primary mt-4">Ajouter une nouvelle citation </a>
            <table class="table table-hover mt-3">
              <thead>
                <tr class="table-primary">
                  <th scope="col">Type</th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">texte</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($posts as $post) :?>
                        
                <tr>
                  <th scope="row"><?= $type->findTypeName($pdo,$post['type']) ?></th>
                  <td><?= $categorie->findCategoryName($pdo,$post['cat_id']) ?></td>
                  <td><?= $post['contenu'] ?></td>
                  <td><?= $post['date']?></td>
                  <td><a class="btn btn-primary mr-2 text-light" title="modifier"><i class="fas fa-edit"></i></a><a class="btn btn-danger text-light" title="Supprimer" onclick="return confirm('Etes vous sure de vouvoir supprimer cette publication?');"><i class="fas fa-trash"></i></a></td>
                </tr>
  
              <?php endforeach?>  

            </tbody>
            </table> 
            </div>       
          </div>
       </div> 










</div>
</div>


<?php
require_once "footer.php";

?>