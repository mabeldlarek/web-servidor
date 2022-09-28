<section class="container border">

    <h1 class="text-center py-4">Inserindo Nova Empresa</h1>

    <?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-danger">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>
    <form class="text-center p-4" action="/app/controllers/saveCreate.php" method="POST">
        <div class="row py-4">
            <div class="col">
                <label for="cnpj">CNPJ</label>
                <input type="number" class="form-control" id="cnpj" name="cnpj"">
            </div>
            <div class="col">
                <label for="razao_social">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
            <div class="col">
                <label for="uf">UF</label>
                <input type="text" class="form-control" id="uf" name="uf">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
        <a class="btn btn-secondary" href="/?page=adm_empresas&action=read">Cancelar</a>
    </form>
</section>
