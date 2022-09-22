<section class="container">

    <h1 class="text-center">Veículos:</h1>
    <?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-success">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>
    <a class="btn btn-outline-dark" href="/index.php/?page=adm_veiculos&action=insert?>">Inserir Novo</a>
    <table class="table table-bordered table-hover table-dark text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Placa</th>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">Ano de Fabricação</th>
                <th scope="col">Cor</th>
                <th scope="col">Quilometragem</th>
                <th scope="col">Custo por dia</th>
                <th scope="col">Editar</i></th>
                <th scope="col">Remover</i></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($veiculos as $veiculo):?>
            <tr>
                <th scope="row"><?php echo $veiculo['id_veiculo']; ?></th>
                <td><?= $veiculo['placa']; ?></td>
                <td><?= $veiculo['modelo']; ?></td>
                <td><?= $veiculo['marca']; ?></td>
                <td><?= $veiculo['ano']; ?></td>
                <td><?= $veiculo['cor']; ?></td>
                <td><?= $veiculo['quilometragem']; ?>km</td>
                <td>R$<?= $veiculo['custo_dia']; ?></td>
                <td><a class="btn btn-outline-light" href="/index.php/?page=adm_veiculos&action=edit&id=<?=$veiculo['id_veiculo']?>"><i class="bi bi-tools"></i></a></td>
                <td><a class="btn btn-outline-light" href="/index.php/?page=adm_veiculos&action=remove&id=<?=$veiculo['id_veiculo']?>"><i class="bi bi-trash"></i></i></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>
