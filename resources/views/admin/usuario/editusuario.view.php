<section class="container border">

    <h1 class="text-center py-4">Editando Usuario <?=$tuple['nome']?>:</h1>

    <?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-danger">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>
    
    <form class="text-center p-4" action="/admin/usuarios/update/save/<?= $tuple['id_usuario']?>" method="POST">
        <div class="row py-4">
            <div class="col">
                <label for="id_usuario">ID</label>
                <input type="text" class="form-control disabled" id="id_usuario" name="id_usuario" value="<?= $tuple['id_usuario']?>" readonly>
            </div>
            <div class="col">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $tuple['nome']?>">
            </div>
            <div class="col">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $tuple['data_nascimento']?>">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="e_mail">E-mail</label>
                <input type="e_mail" class="form-control" id="e_mail" name="e_mail" value="<?= $tuple['e_mail']?>">
            </div>
            <div class="col">
              <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone"  pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" value="<?= $tuple['telefone']?>">
            </div>
            <div class="col">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $tuple['cpf']?>" >
            </div>
            <div class="col">
                <label for="senha">Senha</label>
                <input type="text" class="form-control" id="senha" name="senha" value="<?= $tuple['senha']?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-secondary" href="/admin/usuarios/read">Cancelar</a>
    </form>
</section>