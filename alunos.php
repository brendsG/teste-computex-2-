<?php
include_once('layout/header.php');
$response = json_decode(file_get_contents('http://camerascomputex.ddns.net:8080/escola/ws_controller.php?action=getAlunosTurma&ano=20211&escola=1&grau_serie=15&turno=M&turma=1&status=C'));
?>
<div class="row m-2">
    <div class="col-md-1">
        <h2>Alunos</h2>
    </div>
    <div class="col-md-1 ms-auto">
        <a target="_blank" href="alunos_pdf.php" class="btn btn-info text-white btn-block">PDF</a>
    </div>
</div>
<div class="row">

    <table class="table table-striped">
        <thead>
            <tr>
                <td style="font-size: 20px;" class="text-center">Nº</td>
                <td style="font-size: 20px;" class="text-center">Nome</td>
                <td style="font-size: 20px;" class="text-center">Matricula</td>
                <td style="font-size: 20px;" class="text-center">Status</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($response as $key => $value) : ?>
                <tr>
                    <td class="text-center">
                        <p><?= $key + 1; ?></p>
                    </td>
                    <td class="text-center">
                        <p><?= $value->nome; ?></p>
                    </td>
                    <td class="text-center">
                        <p><?= $value->matricula; ?></p>
                    </td>
                    <td class="text-center">
                        <p><?= $value->status; ?></p>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include_once('layout/footer.php'); ?>