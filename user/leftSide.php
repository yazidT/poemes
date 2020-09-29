<div style="min-height: 800px;" class="col-md-3 jumbotron mb-0" >


    <ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center <?= $page === 'index.php' ? 'active text-light' : '' ?>">
       <a href="index.php"> Mes publications </a>
        <span class="badge badge-success badge-pill"><?= count($posts) ?></span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center <?= $page === 'info.php' ? 'active text-light' : '' ?>">
    <a href="info.php"> Mes informations </a>

    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center <?= $page === 'message.php' ? 'active text-light' : '' ?>">
    <a href="message.php"> Mes messages</a>

        <span class="badge badge-danger badge-pill">1</span>
    </li>
    </ul>



</div>