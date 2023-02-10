<?php
include_once('layout/header.php');
$response = json_decode(file_get_contents('http://camerascomputex.ddns.net:8080/escola/ws_controller.php?action=getTurmas&ano=20211'));
?>
<h2 class="m-3 text-center">Turmas</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <td style="font-size: 20px;" class="text-center">Turma</td>
            <td style="font-size: 20px;" class="text-center">Grau</td>
            <td style="font-size: 20px;" class="text-center">Serie</td>
            <td style="font-size: 20px;" class="text-center">Turno</td>
            <td style="font-size: 20px;" class="text-center">Ano</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($response as $key => $value) : ?>
            <tr>
                <td class="text-center">
                    <p><?= $key + 1; ?></p>
                </td>
                <td class="text-center">
                    <p><?= $value->grau_longo; ?></p>
                </td>
                <td class="text-center">
                    <p><?= $value->serie_longa; ?></p>
                </td>
                <td class="text-center">
                    <p><?= $value->turno; ?></p>
                </td>
                <td class="text-center">
                    <p><?= substr_replace($value->ano, '.', 4, 0) ?></p>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php include_once('layout/footer.php'); ?>