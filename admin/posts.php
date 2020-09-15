<?php
require_once 'header.php';


$title='Posts';
  
$pdo = Connection::getPDO();

$post = new Post();
$posts = $post->getAll($pdo);

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
                                    <h4 class="header-title">Buttons example</h4>
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
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                        <?php foreach ($posts as $post ):?>    
                                        <tr>
                                            <td><?= $post['id'] ?></td>
                                            <td><?= $post['uti_id'] ?></td>
                                            <td><?= $post['cat_id'] ?></td>
                                            <td><?= $post['contenu'] ?></td>
                                            <td><?= $post['date'] ?></td>
                                            <td><?= $post['pays'] ?></td>
                                            <td><?= $post['note'] ?></td>
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