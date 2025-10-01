<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="../css/css_general.css">

    <title>JAH prueba</title>
  </head>
  <body>
    <!-- bloque nuevo -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="principal.php">
        <img src="../img/img_default.jpg" width="50">
      </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle oculto" href="#" id="administracion" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Administración
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item oculto" href="#" id="nav_clientes">Clientes</a>
              <a class="dropdown-item oculto" href="#" id="nav_productos">Produtos</a>
              <a class="dropdown-item oculto" href="#" id="nav_usuarios">Usuarios</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle oculto" href="#" id="operacion" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Operacion
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item oculto" href="#" id="nav_orden">Crear orden</a>
            </div>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-primary my-2 my-sm-0" id="cerrarSession">Cerrar session</button>
        </div>
      </div>
    </nav>
    <!-- fin bloque nuevo -->
    <input type="hidden" id="rolSession" value="<?php echo $_SESSION["role"]; ?>">
    <div class="" id="dashboard_form">
      <?php
        include('dashboard.php');
      ?>
    </div>
    <div class="oculto" id="usuarios_form">
      <?php
        include('usuarios.php');
      ?>
    </div>
    <div class="oculto" id="clientes_form">
      <?php
        include('clientes.php');
      ?>
    </div>
    <div class="oculto" id="produtos_form">
      <?php
        include('productos.php');
      ?>
    </div>
    <div class="oculto" id="orden_form">
      <?php
        include('orden.php');
      ?>
    </div>

    

    <div id="pieDePagina" class="pie-pagina" style="margin-top: 37%;">
      <div style="text-align: left;" class="container">
        <br><br>
        <i class="fa fa-facebook-square" aria-hidden="true" style="font-size: 50px;"></i>
        <i class="fa fa-twitter-square" aria-hidden="true" style="font-size: 50px;"></i>
        <i class="fa fa-instagram" aria-hidden="true" style="font-size: 50px;"></i>

        <span style="padding-left: 42%;">©JAH | Todos los derechos reservados</span>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../js/generales.js"></script>
    <script src="../js/usuarios.js"></script>
    <script src="../js/clientes.js"></script>
    <script src="../js/productos.js"></script>
    <script src="../js/dashboard.js"></script>
  </body>
</html>