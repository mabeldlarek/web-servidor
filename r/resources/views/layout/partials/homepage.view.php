<section>
    <div class="container my-6">
        <div class="bg-dark text-white d-flex flex-row col p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center border shadow-lg">
            <div class="w-45 p-2 col-lg-7 p-3 p-lg-4 pt-lg-1">
            <?php
                if (isset($_SESSION['message'])) : ?>
                    <div class="alert alert-danger">
                        <p class="text-center h4"><?= $_SESSION['message'] ?></p>
                    </div>
                <?php endif;
                unset($_SESSION['message']);
                ?>
                <h1 class="fw-bold">Alugue agora!</h1>
                <div>
                    <form action="/app/controllers/saveSearch.php" method="POST">
                        <div class="mt-2 col-md-8">
                            <label for="local" class="form-label">Local de Retirada:</label>
                            <input type="text" class="form-control" id="local" name="local">
                        </div>
                        <div class="mt-3 col-md-3">
                            <label for="data_emprestimo" class="form-label">Data Retirada:</label>
                            <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo">
                        </div>
                        <div class="mt-3 col-md-3">
                            <label for="data_entrega" class="form-label">Data Entrega:</label>
                            <input type="date" class="form-control" id="data_entrega" name="data_entrega">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mt-3 px-4 me-md-3 fw-bold">Buscar</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden">
                <img class="rounded-lg-3" src="../resources/img/carro.png" alt="" width="620">
            </div>
        </div>
</section>