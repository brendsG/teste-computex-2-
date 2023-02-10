<?php
include_once('layout/header.php');
$response = json_decode(file_get_contents('http://camerascomputex.ddns.net:8080/escola/json_horario_aluno.php?matricula=2011004&senha=99999999&ano=20211'));
$response = $response->horario;
?>
<div class="d-flex flex-column align-items-center">
    <h2>Horários</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <?php foreach ($response as $key => $value) : ?>
                    <th class="text-center">
                        <p><?= $value->dia ?></p>
                    </th>
                <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < 4; $i++) : ?>
                <tr>
                    <?php foreach ($response as $key => $value) : ?>
                        <td class="text-center">
                            <p class="m-0"><?= $value->horarios[$i]->disciplina ?></p>
                            <p class="m-0">Prof(a): <?= $value->horarios[$i]->professor ?></p>
                            <p class="m-0">de <?= substr_replace($value->horarios[$i]->inicio, ':', 2, 0) ?> a <?= substr_replace($value->horarios[$i]->fim, ':', 2, 0) ?></p>
                        </td>
                    <?php endforeach ?>
                </tr>
            <?php endfor ?>
        </tbody>
    </table>
</div>
<?php include_once('layout/footer.php'); ?>