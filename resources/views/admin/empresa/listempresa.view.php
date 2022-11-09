<section class="container">

    <h1 class="text-center">Empresas:</h1>

    <?php include APP_ROOT . '/resources/views/layout/partials/alertsuccess.view.php'?>

    <a class="btn btn-primary m-4" href="/admin/empresas/create">Inserir Nova</a>
    <table class="table table-bordered table-hover table-dark text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Razão Social</th>
                <th scope="col">Endereço</th>
                <th scope="col">UF</th>
                <th scope="col">Editar</i></th>
                <th scope="col">Remover</i></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tuples as $tuple):?>
            <tr>
                <th scope="row"><?php echo $tuple['id_empresa']; ?></th>
                <td><?= $tuple['cnpj']; ?></td>
                <td><?= $tuple['razao_social']; ?></td>
                <td><?= $tuple['endereco']; ?></td>
                <td><?= $tuple['uf']; ?></td>
                <td><a class="btn btn-outline-light" href="/admin/empresas/update/<?=$tuple['id_empresa']?>"><i class="bi bi-tools"></i></a></td>
                <td><a class="btn btn-outline-light" href="/admin/empresas/delete/<?=$tuple['id_empresa']?>"><i class="bi bi-trash"></i></i></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>
