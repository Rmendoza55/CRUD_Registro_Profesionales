<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Profesionales</title>

    <!--Enlaces-->

    <link rel="shortcut icon" href="vistas/assets/dist/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.css">
    <link rel="stylesheet" href="vistas/assets/dist/css/index.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="vistas/assets/dist/js/adminlte.js"></script>
        
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    
    <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
    <div>
        <?php
            include "modulos/layout/header_navbar.php";
            include "modulos/layout/sidebar_lateral.php";

            echo '<div class="content-wrapper">';
                include "modulos/pagina_en_blanco.php";
            echo '</div>';

            include "modulos/layout/footer.php";
        ?>
    </div>
    
    <script src="vistas/assets/dist/js/demo.js"></script>

    <script>
        function cargaContenido(contenedor, contenido){
            $("."+contenedor).load(contenido);
        }
    </script>
</body>
</html>