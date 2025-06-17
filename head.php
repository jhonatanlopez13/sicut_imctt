<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SICUT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .navbar-brand img {
      max-height: 50px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="img/logo_principal.png" alt="Logo" class="d-inline-block align-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <?php
        if(!empty($_SESSION['idUsuario'])){
          ?>
            <div class="navbar-nav ms-auto">
              <?php
                if(isset($usuario) and $usuario[0]['id_tipo_usuario']){
                  ?>
                    <a class="nav-link px-3 fw-medium" href="admin.php">Ver Trayectorias</a>
                  <?php
                }else{
                  ?>
                    <a class="nav-link px-3 fw-medium" href="certificado.php" target="_blank">Certificado</a>
                  <?php
                }
              ?>
              <a class="nav-link px-3 fw-medium" href="salir.php">Salir</a>
            </div>
          <?php
        }else{
          ?>
            <div class="navbar-nav ms-auto">
              <a class="nav-link px-3 fw-medium" href="registro.php">Registro</a>
              <a class="nav-link px-3 fw-medium" href="index.php">Iniciar Sesión</a>
              <a class="nav-link px-3 fw-medium" href="https://tenjoculturayturismo.gov.co/">Regresar al instituto</a>
            </div>
          <?php
        }
      ?>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>