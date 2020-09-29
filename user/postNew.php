<?php
require_once "../controller/fonctions.php";
require_once "header.php";

if(empty($_GET) || isset($_GET['tous'])) $posts = $post->findPostsById($pdo, $cUser['id']);
if(isset($_GET['proverbes'])) $posts = $post->findPostsByTypeID($pdo, $cUser['id'], 1);
if(isset($_GET['citations'])) $posts = $post->findPostsByTypeID($pdo, $cUser['id'], 2);

$categories = $categorie->getAll($pdo);
var_dump($categories);


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
       
            <h3>Nouvelle édition </h3>

            <form>
                <fieldset>
                    <legend>Legend</legend>
                    <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com">
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                    <label for="typeSelect1">Sélectionnez un type:</label>
                    <select class="form-control" id="typeSelect" name="typeSelect">
                        <option>Proverbes</option>
                        <option>Citations</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="categorySelect1">Sélectionnez une catégorie:</label>
                    <select class="form-control" id="categorySelect" name="categorySelect">
                        <?php foreach($categories as $categorie):?>
                            <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
                        <?php endforeach ?>    
                    </select>
                    </div>

                
                    <div class="form-group">
                    <label for="textarea">Example textarea</label>
                    <textarea class="form-control" id="textarea" name="textarea" rows="3"></textarea>
                    </div>



                    <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                    </div>
                    <fieldset class="form-group">
                    <legend>Radio buttons</legend>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                        Option one is this and that—be sure to include why it's great
                        </label>
                    </div>
                    <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                        Option two can be something else and selecting it will deselect option one
                        </label>
                    </div>
                    <div class="form-check disabled">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
                        Option three is disabled
                        </label>
                    </div>
                    </fieldset>
                    <fieldset class="form-group">
                    <legend>Checkboxes</legend>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" checked="">
                        Option one is this and that—be sure to include why it's great
                        </label>
                    </div>
                    <div class="form-check disabled">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" disabled="">
                        Option two is disabled
                        </label>
                    </div>
                    </fieldset>
                    <fieldset class="form-group">
                    <legend>Sliders</legend>
                    <label for="customRange1">Example range</label>
                    <input type="range" class="custom-range" id="customRange1">
                    </fieldset>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
       
        </div> 

    </div>
</div>


<?php
require_once "footer.php";

?>