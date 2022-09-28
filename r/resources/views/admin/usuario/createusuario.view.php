<section class="container border">

    <h1 class="text-center py-4">Inserindo Novo Usuario</h1>

    <form class="text-center p-4" action="/app/controllers/saveCreate.php" method="POST">
        <div class="row py-4">
            <div class="col">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="col">
                <label for="dtNascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="dtNascimento" name="dtNascimento">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone">
            </div>
            <div class="col">
                <label for="senha">Senha</label>
                <input type="text" class="form-control" id="senha" name="senha">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
        <a class="btn btn-secondary" href="/?page=adm_usuarios&action=read">Cancelar</a>
    </form>
</section>>