<section class="container border">

    <h1 class="text-center py-4">Editando Veículo #<?=$veiculo['id_veiculo']?>:</h1>

    <form class="text-center p-4" action="/app/controllers/saveEdit.php" method="POST">
        <div class="row py-4">
            <div class="col">
                <label for="id_veiculo">ID</label>
                <input type="text" class="form-control" id="id_veiculo" name="id_veiculo" value="<?= $veiculo['id_veiculo']?>" readonly>
            </div>
            <div class="col">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" value="<?= $veiculo['placa']?>">
            </div>
            <div class="col">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $veiculo['modelo']?>">
            </div>
            <div class="col">
                <label for="ano">Ano</label>
                <input type="number" class="form-control" id="ano" name="ano" value="<?= $veiculo['ano']?>">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="<?= $veiculo['marca']?>">
            </div>
            <div class="col">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor" value="<?= $veiculo['cor']?>">
            </div>
            <div class="col">
                <label for="quilometragem">Quilometragem</label>
                <input type="number" class="form-control" id="quilometragem" name="quilometragem" value="<?= $veiculo['quilometragem']?>">
            </div>
            <div class="col">
                <label for="custo_dia">Custo por Dia</label>
                <input type="number" class="form-control" id="custo_dia" name="custo_dia" value="<?= $veiculo['custo_dia']?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-secondary" href="/index.php/?page=adm_veiculos&action=list">Cancelar</a>
    </form>
</section>
