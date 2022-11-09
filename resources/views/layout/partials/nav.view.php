<div class="navbar navbar-inverse text-bg-dark">

    <div class="container d-flex justify-content-betIen">

        <a href="/" class="navbar-brand text-white"><i class="bi bi-speedometer"></i> <?=SITE_NAME?></a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

            <li><a href="#" class="nav-link px-4 text-white">Mapa</a></li>
            <li><a href="#" class="nav-link px-4 text-white">Carros</a></li>
            <li><a href="#" class="nav-link px-4 text-white">Sobre Nós</a></li>
            <li><a href="#" class="nav-link px-4 text-white">Contate-nos</a></li>

            <?php if (isset($_SESSION['id_usuario'])): ?>
                <li><a href="/perfil/editar/<?= $_SESSION['id_usuario']; ?>" class="nav-link px-4 text-white">Minha Conta</a></li>
                <li><a href="/login/sair" class="nav-link px-4 text-white">Sair</a></li>
            <?php else: ?>
                <li><a href="/login" class="nav-link px-4 text-white">Entrar/Registrar-se</a></li>
            <?php endif; ?>

        </ul>

    </div>

</div>
