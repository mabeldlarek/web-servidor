<section class="ftco-section">
<?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-danger">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-4">
                <h2 class="heading-section"></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="h5 mb-4 text-center">Mensagem de produtos encontrados ou não</h3>
                <div class="w-70 p-3 table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th>&nbsp;</th>
                                <th>Carro</th>
                                <th>Caracaterísticas</th>
                                <th>Custo diário</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tuples as $tuple) : ?>
                                <div>
                                    <tr>
                                        <td>
                                            <div>
                                                <img src="product-3.png" alt="" class="card-img rounded-0 img-fluid">
                                                <p>IMAGEM</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <p>Ano: <?= $tuple['ano']; ?></p>
                                                <p>Cor: <?= $tuple['cor']; ?></p>
                                                <p>Local:  <?= $info['dataEmprestimo']; ?></p>
                                            </div>
                                        </td>
                                        <td><?= $tuple['custo_dia']; ?></td>
                                        <td>
                                        <td>
                                            <form action="/app/controllers/saveReserva.php" method="POST">
                                                <input type="hidden" id="IdCarroReserva" name="IdCarroReserva" value=<?= $tuple['id_veiculo']; ?>>
                                                <input type="hidden" id="data_emprestimo" name="data_emprestimo" value=<?= $info['dataEmprestimo']; ?>>
                                                <input type="hidden" id="data_entrega" name="data_entrega" value=<?= $info['dataEntrega']; ?>>
                                                <input type="hidden" id="local" name="local" value=<?= $info['local']; ?>>
                                                <input type="hidden" id="id_empresa_emprestimo" name="id_empresa_emprestimo" value= 1>
                                                <input type="hidden" id="id_empresa_entrega" name="id_empresa_entrega" value= 2>
                                                <button type="submit" class="btn btn-secondary">Reservar</button>
                                            </form>
                                        </td>
                                    </tr>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>