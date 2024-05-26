<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $servername = "localhost"; // Nombre del servidor
    $username = "root"; // Nombre de usuario de la base de datos
    $password = "root1234"; // Contraseña de la base de datos
    $database = "balsamos"; // Nombre de la base de datos


    // Crear conexión
    $conexion = mysqli_connect($servername, $username, $password, $database);

    // Verifica la conexión
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>VENTA DE BÁLSAMOS </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/logo.jpeg" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>


    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container px-4 px-lg-5">
            <img class="" src="img/logo.jpeg" width="50" height="50">
                <a class="navbar-brand text-dark" href="index.php" >LPMJ ORGANIC SHOP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-dark" aria-current="page" href="index.php">PRINCIPAL</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="nosotros.html">SOBRE NOSOTROS</a></li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"  href="index.php" role="button">PRODUCTOS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-warning py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-dark">
                    <h1 class="display-4 fw-bolder">LPMJ ORGANIC SHOP</h1>
                    <p class="lead fw-normal text-dark-50 mb-0">Conoce nuestros productos</p>
                </div>
            </div>
        </header>

        
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                
                    <?php
                        // Consulta para obtener los productos de la base de datos
                        $sql = "SELECT * FROM productos";
                        $resultado = mysqli_query($conexion, $sql);

                        if (!$resultado) {
                            die("Error al ejecutar la consulta: " . mysqli_error($conexion));
                        }

                        // Verificar si hay resultados
                        if (mysqli_num_rows($resultado) > 0) {
                            // Mostrar cada producto
                            while($row = mysqli_fetch_assoc($resultado)) {
                        
                            
                                echo '<div class="col mb-5">';
                                echo '<div class="card h-100">';
                                echo '<img class="card-img-top" src="' . $row["Imagen"] . '"  width="200" height="300" />';
                                echo '<div class="card-body p-4">';
                                echo '<div class="text-center">';
                                echo '<h5 class="fw-bolder">' . $row["Nombre"] . '</h5>';
                                echo '$' . $row["Precio"] . ' - $' . $row["Precio"];
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                                echo '<div class="text-center"><a class="btn btn-outline-dark mt-auto" href="producto.php?id=' . $row["id_producto"] . '">Ver información</a></div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "No hay productos disponibles.";
                        }

                    ?>   
                    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-warning">
           <div class="container"><p class="m-0 text-center text-dark">Copyright &copy; ALUMNOS IPIC 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
