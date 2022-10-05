<section class="ftco-section">
    <?php
    if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-danger">
            <p class="text-center h4"><?= $_SESSION['message'] ?></p>
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
                <?php
                if (isset($_SESSION['message'])) : ?>
                    <h3><?= $_SESSION['message'] ?></h3>
                <?php endif;
                unset($_SESSION['message']);
                ?>
                <div class="w-70 p-3 table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th>&nbsp;</th>
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
                                        <?php if (isset($images[$tuple['id_veiculo']])) : ?>
                                            <td><img class="img-fluid" style="max-height: 5rem" src="data:image/jpg;base64,<?php echo base64_encode($images[$tuple['id_veiculo']][0]); ?>" alt="<?= $images[$tuple['id_veiculo']][1] ?>"></td>
                                        <?php else : ?>
                                            <td><img class="img-fluid" style="max-height: 5rem" src="resources/img/placeholder.jpg" alt="Veículo sem imagem"></td>
                                        <?php endif; ?>
                                </div>
                                </td>
                                <td>
                                    <div>
                                        <p>Marca: <?= $tuple['marca']; ?></p>
                                        <p>Modelo: <?= $tuple['modelo']; ?></p>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <p>Ano: <?= $tuple['ano']; ?></p>
                                        <p>Cor: <?= $tuple['cor']; ?></p>
                                        <p>Local: <?= $info['local']; ?></p>
                                    </div>
                                </td>
                                <td>R$<?= $tuple['custo_dia']; ?></td>
                                <td>
                                <td>
                                    <form action="/app/controllers/saveReserva.php" method="POST">
                                        <input type="hidden" id="IdCarroReserva" name="IdCarroReserva" value=<?= $tuple['id_veiculo']; ?>>
                                        <input type="hidden" id="data_emprestimo" name="data_emprestimo" value=<?= $info['dataEmprestimo']; ?>>
                                        <input type="hidden" id="data_entrega" name="data_entrega" value=<?= $info['dataEntrega']; ?>>
                                        <input type="hidden" id="local" name="local" value=<?= $info['local']; ?>>
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