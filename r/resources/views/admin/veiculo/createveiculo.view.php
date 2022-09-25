<section class="container border">

    <h1 class="text-center py-4">Inserindo Novo Veículo</h1>

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
                <label for="placa">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa"">
            </div>
            <div class="col">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo">
            </div>
            <div class="col">
                <label for="ano">Ano</label>
                <input type="number" step='1' class="form-control" id="ano" name="ano">
            </div>
        </div>
        <div class="row py-4">
            <div class="col">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca">
            </div>
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
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
        <a class="btn btn-secondary" href="/?page=adm_veiculos&action=read">Cancelar</a>
    </form>
</section>
