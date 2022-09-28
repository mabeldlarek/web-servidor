<section class="container border">

    <h1 class="text-center py-4">Editando Veículo #<?=$tuple['id_veiculo']?>:</h1>

    <?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-danger">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>

    <form class="text-center p-4" action="/app/controllers/saveEdit.php" method="POST" enctype="multipart/form-data">
        <div class="row py-4">
            <div class="col">
                <label for="id_veiculo">ID</label>
                <input type="text" class="form-control" id="id_veiculo" name="id_veiculo" value="<?= $tuple['id_veiculo']?>" readonly>
            </div>
            <div class="col">
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" value="<?= $tuple['placa']?>">
            </div>
            <div class="col">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $tuple['modelo']?>">
            </div>
            <div class="col">
                <label for="ano">Ano</label>
                <input type="number" class="form-control" id="ano" name="ano" value="<?= $tuple['ano']?>">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="<?= $tuple['marca']?>">
            </div>
            <div class="col">
                <label for="cor">Cor</label>
                <input type="text" class="form-control" id="cor" name="cor" value="<?= $tuple['cor']?>">
            </div>
            <div class="col">
                <label for="quilometragem">Quilometragem</label>
                <input type="number" class="form-control" id="quilometragem" name="quilometragem" value="<?= $tuple['quilometragem']?>">
            </div>
            <div class="col">
                <label for="custo_dia">Custo por Dia</label>
                <input type="number" class="form-control" id="custo_dia" name="custo_dia" value="<?= $tuple['custo_dia']?>">
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
                <input type="text" class="form-control" id="desc" name="desc" <?php if(isset($images[$tuple['id_veiculo']])):?> value="<?= $images[$tuple['id_veiculo']][1]?>" <?php endif?>>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-secondary" href="/?page=adm_veiculos&action=read">Cancelar</a>
    </form>
</section>
