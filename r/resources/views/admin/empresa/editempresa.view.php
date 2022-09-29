<section class="container border">

    <h1 class="text-center py-4">Editando Empresa <?=$tuple['razao_social']?>:</h1>

    <?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-danger">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>
    <form class="text-center p-4" action="/app/controllers/saveEdit.php" method="POST">
        <div class="row py-4">
            <div class="col">
                <label for="id_empresa">ID</label>
                <input type="text" class="form-control disabled" id="id_empresa" name="id_empresa" value="<?= $tuple['id_empresa']?>" readonly>
            </div>
            <div class="col">
                <label for="cnpj">CNPJ</label>
                <input type="number" class="form-control" id="cnpj" name="cnpj" value="<?= $tuple['cnpj']?>">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="razao_social">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social" value="<?= $tuple['razao_social']?>">
            </div>
            <div class="col">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $tuple['endereco']?>">
            </div>
            <div class="col">
                <label for="uf">UF</label>
                <input type="text" class="form-control" id="uf" name="uf" value="<?= $tuple['uf']?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-secondary" href="/?page=adm_empresas&action=read">Cancelar</a>
    </form>
</section>
