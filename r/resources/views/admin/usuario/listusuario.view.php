<section class="container">

    <h1 class="text-center">Usuarios:</h1>
    <?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-success">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>
    <a class="btn btn-primary m-4" href="/?page=adm_usuarios&action=create">Inserir Novo</a>
    <table class="table table-bordered table-hover table-dark text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">Senha</th>
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
                <td><a class="btn btn-outline-light" href="/?page=adm_usuarios&action=update&id=<?=$tuple['id_usuario']?>"><i class="bi bi-tools"></i></a></td>
                <td><a class="btn btn-outline-light" href="/?page=adm_usuarios&action=delete&id=<?=$tuple['id_usuario']?>"><i class="bi bi-trash"></i></i></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>