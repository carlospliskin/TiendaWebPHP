<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Macar Store</title>

    <!-- Latest compiled and minified CSS -->
    
    <link rel="stylesheet" href="assets/css/estilos.css"> 
    <link rel="shortcut icon" href="upload/LogoPaginaWeb.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=5215563490703&text=Hola!%20requiero%20informes%20de" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>
    
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="index.php">Macar Store</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="carrito.php" class="btn">CARRITO <span class="badge"><?php  print cantidadProductos(); ?></span></a>
            </li> 
            <li>
            <a href="panel/index.php" class="btn"> Administrador </a>
            </li>
            <li>
              <a href="registrar.php"> Sign Up </a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">

      <div class="row">
        <?php
          require 'vendor/autoload.php';
          $producto = new Macar\Ropa;
          $info_productos = $producto->mostrar();
          $cantidad = count($info_productos);
          if($cantidad > 0){
            for($x =0; $x < $cantidad; $x++){
              $item = $info_productos[$x];
            
        ?>
          <div class="col-md-4">
            <div class="panel panel-defaul">
                <div class="panel-heading">
                  <h5 class="text-center titulo-producto"> <?php print $item['nombre'] ?> </h5>
                </div>
              <div class="panel-body">
                            <?php
                            $foto = 'upload/'.$item['foto'];
                              if(file_exists($foto)){

                           ?>
                            <img src="<?php print $foto; ?>" class="img-responsive">
                            <?php }else{?>
                              <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                            <?php }?>
              </div>
                  <div class="panel-footer">
                      <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                      
                        <span class="glyphicon glyphicon-shopping-cart">  </span> Comprar
                      </a>
                      <form action="" class="formulario">
                        <select name="" class="formulario_campo" id="">
                          <option value="">Chica</option>
                          <option value="">Mediana</option>
                          <option value="">Grande</option>
                          <option value="">Extra Grande</option>
                        </select>
                      </form>
                  </div>
            </div>
          </div>
        
        <!--LISTADO DE PRODUCTOS-->
        <?php 
        }
      }else{ ?>
            <h4>NO HAY REGISTROS</h4>
        <?php }?>
      </div> 
      <section class="productos-aram">
                    <div class="contenedor-aram">
                        <h2 class="titulo-arama">Nuestras Ofertas</h2>
                        <div class="galeria-produ">
                            <div class="imagen-produ">
                                <img src="upload/1.1.jpg" alt="">
                                <div class="hover-galeria">
                                    <img src="upload/icono2.gif" alt="">
                                    <p>Playeras</p>
                                </div>
                            </div>
                            <div class="imagen-produ">
                                <img src="upload/1.png" alt="">
                                <div class="hover-galeria">
                                    <img src="upload/icono2.gif" alt="">
                                    <p>Sudaderas</p>
                                </div>
                            </div>
                            <div class="imagen-produ">
                                <img src="upload/10.png" alt="">
                                <div class="hover-galeria">
                                    <img src="upload/icono2.gif" alt="">
                                    <p>Nuestro trabajo</p>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
       </section>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  
  <footer class="footer">
    <div class="contenedor">
        <div class="barra">
          <a class="logo " href="index.php">Macar Store</a>
          <nav class="navegacion">
            <a href="" class="navegacion_enlace logo"> Administrador </a>
            <a href="" class="navegacion_enlace logo"> Registrar </a>
            <a href="" class="navegacion_enlace logo"> Contacto </a>

          </nav>

        </div>
        <p> Macar - Todos los derechos Reservados 2021</p>
    </div>
  </footer>
  
  </body>
</html>
