<section class="bg-light">
    <div class="container pb-5">
        <div class="ms-10 row pt-6">
            <table class="table">
                <thead class="thead-primary">
                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <div>
                        <tr>
                            <td>
                                <div class="col-lg-10 px-2 mt-5">
                                    <div class="card mb-3">
                                        <img class="card-img img-fluid" src="DOG.png" alt="Card image cap" id="product-detail">
                                    </div>
                                    <div class="row card">
                                        <div class="col-lg-8 align-self-center card-body">
                                            <h6>Descrição:</h6>
                                            <p>Cor: <?= $tuples['cor']; ?> </p>
                                            <p>Ano: <?= $tuples['ano']; ?> </p>
                                        </div>
                                    </div>
                                    <div class="row card mt-3">
                                        <div class="col-lg-8 align-self-center card-body">
                                            <h6>Retirada e devolução:</h6>
                                            <p>Empresa:</p>
                                            <p>Local: <?= $info['local']; ?> </p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="col mt-5">
                                    <div class="col-lg-8 mt-5">
                                        <div class="card mb-3">
                                            <h1>Detalhes da Reserva</h1>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col-lg-8 mt-7">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h1 class="h2"></h1>
                                                    <ul class="list-inline">
                                                        <div class="col-lg-12 md-7 text-center">
                                                            <div class="row mt-3 ">
                                                                <div class="col-md-12 text-center border-bottom mb-5">
                                                                    <h3 class="text-black h4 text-uppercase">Custo Total</h3>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <span class="text-black">Custo diário</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <strong class="text-black">$230.00</strong>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-5">
                                                                <div class="col-md-6">
                                                                    <span class="text-black">Total:</span>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <strong class="text-black">$230.00</strong>
                                                                </div>
                                                    </ul>
                                                    <div class="row pb-3">
                                                        <div class="col d-grid">
                                                            <form action="/app/controllers/saveCreate.php" method="POST">
                                                                <input type="hidden" id="data_emprestimo" name="data_emprestimo" value=<?= $info['dataEmprestimo']; ?>>
                                                                <input type="hidden" id="data_entrega" name="data_entrega" value=<?= $info['dataEntrega']; ?>>
                                                                <input type="hidden" id="id_veiculo" name="id_veiculo" value=<?= $tuples['id_veiculo']; ?>>
                                                                <input type="hidden" id="id_usuario" name="id_usuario" value=<?= $_SESSION['id_usuario']; ?>>
                                                                <input type="hidden" id="id_empresa_emprestimo" name="id_empresa_emprestimo" value='1'>
                                                                <input type="hidden" id="id_empresa_entrega" name="id_empresa_entrega" value='1'>
                                                                <button type="submit" class="btn btn-secondary">Confirmar reserva</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>