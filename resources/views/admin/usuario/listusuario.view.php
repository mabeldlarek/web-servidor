<section class="container">

    <h1 class="text-center">Usuarios:</h1>

    <?php include APP_ROOT . '/resources/views/layout/partials/alertsuccess.view.php'?>

    <a class="btn btn-primary m-4" href="/admin/usuarios/create">Inserir Novo</a>
    <table class="table table-bordered table-hover table-dark text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Senha</th>
                <th scope="col">CPF</th>
                <th scope="col">Editar</i></th>
                <th scope="col">Remover</i></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tuples as $tuple):?>
            <tr>
                <th scope="row"><?php echo $tuple['id_usuario']; ?></th>
                <td><?= $tuple['nome']; ?></td>
                <td><?= $tuple['data_nascimento']; ?></td>
                <td><?= $tuple['telefone']; ?></td>
                <td><?= $tuple['e_mail']; ?></td>
                <td><?= $tuple['senha']; ?></td>
                <td><?= $tuple['cpf']; ?></td>
                <td><a class="btn btn-outline-light" href="/admin/usuarios/update/<?=$tuple['id_usuario']?>"><i class="bi bi-tools"></i></a></td>
                <td><a class="btn btn-outline-light" href="/admin/usuarios/delete/<?=$tuple['id_usuario']?>"><i class="bi bi-trash"></i></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>