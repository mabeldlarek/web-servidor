<section class="container">

    <h1 class="text-center">Empresas:</h1>
    <?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-success">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?>
    <a class="btn btn-primary m-4" href="/?page=adm_empresas&action=create">Inserir Nova</a>
    <table class="table table-bordered table-hover table-dark text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Razão Social</th>
                <th scope="col">Endereço</th>
                <th scope="col">UF</th>
                <th scope="col">Editar</i></th>
                <th scope="col">Remover</i></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tuples as $tuple):?>
            <tr>
                <th scope="row"><?php echo $tuple['id_empresa']; ?></th>
                <td><?= $tuple['cnpj']; ?></td>
                <td><?= $tuple['razao_social']; ?></td>
                <td><?= $tuple['endereco']; ?></td>
                <td><?= $tuple['uf']; ?></td>
                <td><a class="btn btn-outline-light" href="/?page=adm_empresas&action=update&id=<?=$tuple['id_empresa']?>"><i class="bi bi-tools"></i></a></td>
                <td><a class="btn btn-outline-light" href="/?page=adm_empresas&action=delete&id=<?=$tuple['id_empresa']?>"><i class="bi bi-trash"></i></i></a></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</section>
