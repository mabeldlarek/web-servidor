<section class="vh-70 gradient-custom">
<?php
    if(isset($_SESSION['message'])):?>
        <div class="alert alert-danger">
            <p class="text-center h4"><?=$_SESSION['message']?></p>
        </div>
    <?php endif;
    unset($_SESSION['message']);
    ?> 
  <div class="container py-3 h-70">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10 col-md-4 col-lg-4 col-xl-4">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

          <form action="/app/controllers/saveLogin.php"  method="POST">
            <div class="mb-md-3 mt-md-3 pb-4">

              <h2 class="fw-bold mb-2 text-uppercase">Entre</h2>
              <p class="text-white-50 mb-5">Por favor insira seu email e senha!</p>

              <div class="form-outline form-white mb-3">
                <input type="email" id="email" class="form-control form-control-lg" name="email" />
                <label class="form-label" for="email">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="senha" class="form-control form-control-lg" name="senha" />
                <label class="form-label" for="senha">Senha</label>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit" >Login</button>

            </div>
            </form>
            <div>
              <p class="mb-0">Ainda não é cadastrado? <a href="/app/controllers/saveRegister.php" class="text-white-50 fw-bold">Cadastre-se</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>