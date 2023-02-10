<?php
include_once('layout/header.php');
$response = json_decode(file_get_contents('http://camerascomputex.ddns.net:8080/escola/mobile_login.php?matricula=2011004&senha=99999999&token=X&so=ios'));
$response = $response->menu;
?>
<div class="row">
    <?php foreach ($response as $key => $value) : ?>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <a href="<?= $value->link ?>">
                <figure class="m-2">
                    <img src="<?= "images/" . $value->icone ?>" alt="<?= $value->titulo ?>" width="100" height="100">
                </figure>
            </a>
            <p class="text-center"><?= $value->titulo ?></p>
        </div>
    <?php endforeach ?>
    <div class="col-md-3 d-flex flex-column align-items-center">
        <a href="alunos.php">
            <figure class="m-2">
                <img src="images/icons8-estudando-o-grupo-on-line-100.png" alt="Alunos" width="100" height="100">
            </figure>
        </a>
        <p class="text-center">Alunos</p>
    </div>
</div>
<?php include_once('layout/footer.php'); ?>