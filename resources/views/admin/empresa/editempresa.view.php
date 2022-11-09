<section class="container border">

    <h1 class="text-center py-4">Editando Empresa <?=$tuple['razao_social']?>:</h1>

    <?php include APP_ROOT . '/resources/views/layout/partials/alertwarning.view.php'?>

    <form class="text-center p-4" action="/admin/empresas/update/save/<?= $tuple['id_empresa']?>" method="POST">
        <div class="row py-4">
            <input type="hidden" id="id_empresa" name="id_empresa" value="<?= $tuple['id_empresa']?>">
            <div class="col">
                <label for="cnpj">CNPJ</label>
                <input type="number" class="form-control" id="cnpj" name="cnpj" value="<?= $tuple['cnpj']?>">
            </div>
            <div class="col">
                <label for="razao_social">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social" value="<?= $tuple['razao_social']?>">
            </div>
        </div>
        <div class="row py-4">
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
        <a class="btn btn-secondary" href="/admin/empresas/read">Cancelar</a>
    </form>
</section>
