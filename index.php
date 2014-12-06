

<!-- Fixed navbar -->

        <?php
            require ('template/menu.php');
            require ('template/header.php');
            require ('clases/usuario.php');
            require ('bd/bd.php');


            require 'helpers.php';
            if(empty($_GET['url']))
                $_GET['url']='home';
            controller($_GET['url']);
            require ('template/footer.php');
        ?>








