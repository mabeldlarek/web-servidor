<section class="container border">

    <h1 class="text-center py-4">Editando Usuario <?=$tuple['nome']?>:</h1>

    <form class="text-center p-4" action="/app/controllers/saveEdit.php" method="POST">
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
                <label for="dtNascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="dtNascimento" name="dtNascimento" value="<?= $tuple['data_nascimento']?>">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $tuple['e_mail']?>">
            </div>
            <div class="col">
            <label for="telefone">Telefone</label>
                <input type="number" class="form-control" id="telefone" name="telefone"  pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" value="<?= $tuple['telefone']?>">
            </div>
            <div class="col">
                <label for="senha">Senha</label>
                <input type="text" class="form-control" id="senha" name="senha"  pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?= $tuple['senha']?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-secondary" href="/?page=adm_usuarios&action=read">Cancelar</a>
    </form>
</section>