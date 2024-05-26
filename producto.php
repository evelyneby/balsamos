
<?php

    $servername = "localhost"; // Nombre del servidor
    $username = "root"; // Nombre de usuario de la base de datos
    $password = "root1234"; // Contraseña de la base de datos
    $database = "balsamos"; // Nombre de la base de datos

    $id = $_GET['id']; // Obtener el ID del producto de la URL

    // Crear conexión
    $conexion = mysqli_connect($servername, $username, $password, $database);
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
        <link rel="icon" type="image/x-icon" href="img/logo.jpeg"/>
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
                        <li class="nav-item"><a class="nav-link text-dark" aria-current="page" href="index.php">PRINCIPAL</a></li>
                        <li class="nav-item"><a class="nav-link text-dark" href="nosotros.html">SOBRE NOSOTROS</a></li>
                        <li class="nav-item">
                            <a class="nav-link active text-dark"  href="index.php" role="button">PRODUCTOS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-warning py-1">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-dark">
                    <h1 class="display-8 fw-bolder">COMPRA CON IPIC</h1>
                </div>
            </div>
        </header>

            <?php

                // Consulta para obtener los productos de la base de datos
                $sql = "SELECT * FROM productos WHERE id_producto = ".$id;

                $resultado = mysqli_query($conexion, $sql);


                if (!$resultado) {
                    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
                }


                // Verificar si hay resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Mostrar cada producto
                    while($row = mysqli_fetch_assoc($resultado)) {
                        $categoria="SELECT * FROM CATEGORIA WHERE id_categoria =".$row['id_categoria'];
                        $rescategoria = mysqli_query($conexion, $categoria);
                        $categoriaRes = mysqli_fetch_assoc($rescategoria);
            ?>

        <!-- Section-->
        <section class="py-5">

        <div class="container">

            <div class="row">
                <div class="col-lg-6 mb-4">
                
                    <div class="">
                        <div class="main-product-image space">
                            <div id="product-carousel" class="carousel slide">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                    <img id="first-image" src="<?php echo $row['Imagen']; ?>"  width="400" height="400">
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>

                
                </div>

                <div class="col-lg-6">
                    <form class="form-horizontal" action="####" method="post" enctype="multipart/form-data" name="buy">
                        <h1> <?php echo $row['Nombre']; ?></h1>
                    
                        <br>
                        <!-- Product Price -->
                        <div class="form-group">
                            <h4 class="col-sm-3 col-md-3" style="font-weight: bold;">Precio:</h4>
                            <div class="col-sm-8 col-md-9">
                                <span class="product-form-price"> $ <?php echo $row['Precio']; ?></span>  
                            </div>
                        </div>


                        <div class="form-group variants row">
                            <h4 class="col-sm-3" style="font-weight: bold;">Aroma</h4>
                            <div class="col-sm-8 col-md-9">
                                <fieldset class="field-group select-options prod-options">
                                    <div class="select-option">
                                    <input type="radio" name="206919" value="687718" id="select_687718">
                                    <label for="select_687718" class="button button--bordered button--tiny button--radius"><?php echo $row['aroma']; ?></label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="form-group row">
                        <h4 class="col-sm-4 col-md-4" style="font-weight: bold;">Descripción:</h4>
                            <div class="col-sm-9 col-md-10 description">
                                <p><?php echo $row['Descripcion']; ?> </p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <h4 class="col-sm-4 col-md-4" style="font-weight: bold;">Presentación:</h4>
                            <div class="col-sm-10 col-md-10">
                            <p><?php echo $row['Presentacion']; ?> </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <h4 class="col-sm-3 col-md-3" style="font-weight: bold;">Categoria:</h4>
                            <p><?php echo $categoriaRes['categoria_nombre']; ?> </p>
                        </div>
                        

                    <input type="hidden">
                    </form>
                </div>
            </div>

        </div>

        </section>

        <?php

            }
            } else {
                echo "INFORMACIÓN NO DISPONIBLE.";
            }
        ?>

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
