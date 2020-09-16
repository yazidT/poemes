<?php
require_once 'header.php';
$title='Utilisateurs';


$users = $user->getAll($pdo);

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
                                    <h4 class="header-title">Listes des utilisateurs</h4>
                                    <p class="sub-header">
                                        The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                                    </p>
        
                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Pseudo</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        <?php foreach ($users as $user ):?>    
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['nom'] ?></td>
                                            <td><?= $user['prenom'] ?></td>
                                            <td><?= $user['pseudo'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><a title="Supprimer" href="?dpost=<?= $user['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="mdi mdi-trash-can-outline "></i></a></td>
                                        </tr>
                                        <?php endforeach ?>    


                                        </tbody>
                                    </table>
                                </div>
                        
                    </div> <!-- container -->

                </div> <!-- content -->
<?php

require_once 'footer.php';

?>