<?php require APP_ROOT . '/resources/helpers/auth/authProfile.php'?>

<section class="container">

    <h1 class="text-center my-4">Página Pessoal de <?= $_SESSION['nome'] ?></h1>

    <form class="text-center p-4" action="/app/controllers/saveEdit.php" method="POST">
        <input type="hidden" id="pessoal" name="pessoal" value="true">
        <input type="hidden" id="id_usuario" name="id_usuario" value="<?= $_SESSION['id_usuario']?>">
        <div class="row py-4">
            <div class="col">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $_SESSION['nome']?>">
            </div>
            <div class="col">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $_SESSION['data_nascimento']?>">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="e_mail" name="e_mail" value="<?= $_SESSION['e_mail']?>">
            </div>
            <div class="col">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone"  pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" value="<?= $_SESSION['telefone']?>">
            </div>
            <div class="col">
                <label for="email">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $_SESSION['cpf']?>">
            </div>
            <div class="col">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" value="<?= $_SESSION['senha']?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Edições</button>
    </form>

    <?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-success">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>

    <h2 class="text-center my-4" >Meus Empréstimos</h2>
    <table class="table table-bordered table-hover table-dark text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Empréstimo</th>
                <th scope="col">Entrega</th>
                <th scope="col">Veículo</th>
                <th scope="col">Local de Empréstimo</th>
                <th scope="col">Local de Retirada</th>
                <th scope="col">Cancelar</i></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tuples as $tuple):?>
            <tr>
                <th scope="row"><?php echo $tuple['id_emprestimo']; ?></th>
                <td><?= $tuple['data_emprestimo']; ?></td>
                <td><?= $tuple['data_entrega']; ?></td>
                <td><?= $tuple['placa'] . ' - ' . $tuple['ano'] . ' - ' . $tuple['marca']; ?></td>
                <td><?= $tuple['empresa_emprestimo'] . ' | Endereço: ' . $tuple['endereco_emprestimo']; ?></td>
                <td><?= $tuple['empresa_entrega'] . ' | Endereço: ' . $tuple['endereco_entrega']; ?></td>
                <td><a class="btn btn-outline-light" href="/?page=adm_emprestimo&action=delete&id=<?=$tuple['id_emprestimo']?>"><i class="bi bi-trash"></i></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

</section>
