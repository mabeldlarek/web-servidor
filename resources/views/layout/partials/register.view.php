<section class="container border">

    <h1 class="text-center py-4">Cadastre-se</h1>

    <?php
    if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-danger">
            <p class="text-center h4"><?= $_SESSION['message'] ?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>
    <form class="text-center p-4" action="/cadastro/registrar" method="POST">
        <div class="row py-4">
            <div class="col">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="col">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
            </div>
            <div class="col">
                <label for="e_mail">E-mail</label>
                <input type="e_mail" class="form-control" id="e_mail" name="e_mail">
            </div>
            <div class="col">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" id="telefone" name="telefone">
            </div>
            <div class="col">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf">
            </div>
        </div>
        <input type="hidden" class="form-control" value="cadastro" name="cadastro">
        <button type="submit" class="btn btn-primary">Registrar</button>

        <a class="btn btn-secondary" href="/">Cancelar</a>
    </form>
</section>>