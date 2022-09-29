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
    <a class="btn btn-primary m-4" href="/?page=adm_veiculos&action=create">Inserir Novo</a>
    <table class="table table-bordered table-hover table-dark text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Thumbnail</th>
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
        <?php foreach ($tuples as $tuple):?>
            <tr>
                <th scope="row"><?php echo $tuple['id_veiculo']; ?></th>
                <?php if(isset($images[$tuple['id_veiculo']])):?>
                    <td><img class="img-fluid" style="max-height: 5rem" src="data:image/jpg;base64,<?php echo base64_encode($images[$tuple['id_veiculo']][0]); ?>" alt="<?= $images[$tuple['id_veiculo']][1] ?>"></td>
                <?php else:?>
                    <td><img class="img-fluid" style="max-height: 5rem" src="resources/images/placeholder.jpg" alt="Veículo sem imagem"></td>
                <?php endif;?>
                <td><?= $tuple['placa']; ?></td>
                <td><?= $tuple['modelo']; ?></td>
                <td><?= $tuple['marca']; ?></td>
                <td><?= $tuple['ano']; ?></td>
                <td><?= $tuple['cor']; ?></td>
                <td><?= $tuple['quilometragem']; ?>km</td>
                <td>R$<?= $tuple['custo_dia']; ?></td>
                <td><a class="btn btn-outline-light" href="/?page=adm_veiculos&action=update&id=<?=$tuple['id_veiculo']?>"><i class="bi bi-tools"></i></a></td>
                <td><a class="btn btn-outline-light" href="/?page=adm_veiculos&action=delete&id=<?=$tuple['id_veiculo']?>"><i class="bi bi-trash"></i></i></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>
