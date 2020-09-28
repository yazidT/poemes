<?php
require_once 'header.php';


$title='Posts';
  

$postsEnAttente = $post->getAllNew($pdo);
$postsValides = $post->getAllValidated($pdo);



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
                                                <th>User</th>
                                                <th>Categorie</th>
                                                <th>Texte</th>
                                                <th>Date</th>
                                                <th>Pays</th>
                                                <th>Note</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        <?php foreach ($postsEnAttente as $post ):?>    
                                        <tr>
                                            <td><?= $post['id'] ?></td>
                                            <td><?= $user->findUserName($pdo,$post['uti_id']) ?></td>
                                            <td><?= $categorie->findCategoryName($pdo,$post['cat_id']) ?></td>
                                            <td><?= $post['contenu'] ?></td>
                                            <td><?= $post['date'] ?></td>
                                            <td><?= $post['pays'] ?></td>
                                            <td><?= $post['note'] ?></td>
                                            <td><a title="Valider" href="?vpost=<?= $post['id'] ?>" class="btn btn-success"><i class="icon-check "></i></a><a title="Supprimer" href="?dpost=<?= $post['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="mdi mdi-trash-can-outline "></i></a></td>
                                        </tr>
                                        <?php endforeach ?>    


                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-box">
                                    <h4 class="header-title">Posts validés </h4>
                                    <p class="sub-header">
                                        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                    </p>
        
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Categorie</th>
                                                <th>Texte</th>
                                                <th>Date</th>
                                                <th>Pays</th>
                                                <th>Note</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        <?php foreach ($postsValides as $post ):?>    
                                        <tr>
                                            <td><?= $post['id'] ?></td>
                                            <td><?= $user->findUserName($pdo,$post['uti_id'])?></td>
                                            <td><?= $categorie->findCategoryName($pdo,$post['cat_id'])  ?></td>
                                            <td><?= $post['contenu'] ?></td>
                                            <td><?= $post['date'] ?></td>
                                            <td><?= $post['pays'] ?></td>
                                            <td><?= $post['note'] ?></td>
                                            <td><a title="Supprimer" href="?dpost=<?= $post['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="mdi mdi-trash-can-outline "></i></a></td>
                                        </tr>
                                        <?php endforeach ?>    


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        
                    </div> <!-- container -->

                </div> <!-- content -->
<?php

require_once 'footer.php';

?>