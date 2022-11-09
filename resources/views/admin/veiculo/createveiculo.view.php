<section class="container border">

    <h1 class="text-center py-4">Inserindo Novo Veículo</h1>

    <?php include APP_ROOT . '/resources/views/layout/partials/alertwarning.view.php'?>

    <form class="text-center p-4" action="/admin/carros/create/save" method="POST" enctype="multipart/form-data">
        <div class="row py-4">
            <div class="col">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" required>
            </div>
            <div class="col">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" required>
            </div>
            <div class="col">
                <label for="ano">Ano</label>
                <input type="number" step='1' class="form-control" id="ano" name="ano" required>
            </div>
            <div class="col">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor">
            </div>
            <div class="col">
                <label for="quilometragem">Quilometragem</label>
                <input type="number" step='0.01' class="form-control" id="quilometragem" name="quilometragem">
            </div>
            <div class="col">
                <label for="custo_dia">Custo por Dia</label>
                <input type="number" step='0.01' class="form-control" id="custo_dia" name="custo_dia">
            </div>
            <div class="col">
                <label>Empresa</label>
                <select class="form-select" id="id_empresa" name="id_empresa" required>
                    <?php foreach($empresas as $empresa) : ?>
                        <option value="<?= $empresa['id_empresa']?>"><?= $empresa['razao_social']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row py-4 border-top">
            <h4>Opcionais</h4>
            <div class="col">
                <label for="imagem">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
            </div>
            <div class="col">
                <label for="desc">Descrição da Imagem</label>
                <input type="text" class="form-control" id="desc" name="desc">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
        <a class="btn btn-secondary" href="/admin/carros/read">Cancelar</a>
    </form>
</section>
