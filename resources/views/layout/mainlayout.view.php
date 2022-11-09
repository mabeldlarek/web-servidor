

<!DOCTYPE html>

<html lang="en">

    <head>

        <?php include(APP_ROOT .'/resources/views/layout/partials/head.view.php'); ?>

    </head>

    <body>

        <?php

        require APP_ROOT .'/resources/views/layout/partials/nav.view.php';

        if (isset($_SESSION['id_usuario'])) {
            if (($_SESSION['nome']) == 'adm'){
                require APP_ROOT .'/resources/views/layout/partials/header.view.php';
            }
            else{
                require APP_ROOT .'/resources/views/layout/partials/header-user.view.php';
            }
        }
        else{
            require APP_ROOT .'/resources/views/layout/partials/header-user.view.php';
        }

        include ($page);

        require APP_ROOT .'/resources/views/layout/partials/footer.view.php';

        require APP_ROOT .'/resources/views/layout/partials/footer-scripts.view.php';
        ?>

    </body>

</html>
