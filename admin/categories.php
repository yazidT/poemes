<?php
require_once 'header.php';
$title='Catégories';

$categories = $categorie->getAll($pdo);
?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
                                            <li class="breadcrumb-item active"><?= $title ?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 




                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Posts en attente de validation</h4>
                                    <p class="sub-header">
                                        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                    </p>
        
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Categorie</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        <?php foreach ($categories as $categorie ):?>    
                                        <tr>
                                            <td><?= $categorie['id'] ?></td>
                                            <td><?= $categorie['nom'] ?></td>
                                            <td><a title="Supprimer" href="?dcat=<?= $categorie['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="mdi mdi-trash-can-outline "></i></a></td>
                                        </tr>
                                        <?php endforeach ?>    


                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="header-title">Ajout d'une nouvelle catégorie</h4>
                                    <form  class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="simpleinput">Ajout d'une nouvelle catégorie</label>
                                            <div class="col-sm-10">
                                                <input name="addcat" type="text" class="form-control" id="simpleinput" placeholder="entrer le nom de la catégorie">
                                            </div>
                                        </div>
                                        
                                        <button  type="submit" class="btn btn-primary">Ajouter </button>

                                    </form>                
                               </div> <!-- container -->

                            </div> <!-- content -->                    
                        </div> <!-- container -->

                    </div> <!-- container -->

                </div> <!-- content -->
<?php

require_once 'footer.php';

?>