<?php
  require_once 'utilities/db.php';
  require_once 'utilities/tools.php';

  $connectionMysql = new Connection();
  $connection = $connectionMysql->getConnection();
  $mysqlQuery = new MySqlQuery($connection);
  
  if(isset($_POST['btnIniciarSesion'])){
    limpiar_entradas();
    $txtUsuario = md5($_POST['txtUsuario']);
    $txtClave = md5($_POST['txtPassword']);
    $query = "select * from usuarios where usuario = :usuario and clave = :clave";
    $usuario = $mysqlQuery->get($query, array(':usuario' => $txtUsuario, 'clave' => $txtClave));
    if(!empty($usuario)){
      regenerar_cookie();
      $_SESSION['idUsuario'] = $usuario[0]['id'];
      $_SESSION['idPersona'] = $usuario[0]['id_persona'];
      if($usuario[0]['id_tipo_usuario'] == '1'){
        header('location: admin.php');  
      }else{
        header('location: usuario.php');
      }
    } 
    else{
      echo('<script>
        alert("Inicio de sesion incorrecto");
        window.location.href = "index.php";
      </script>');
    }
  }
  $connectionMysql->closeConnection();
?>

<?php include 'head.php' ?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
      <div class="card border-0 shadow-lg">
        <div class="card-body p-5">
          <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Iniciar Sesión</h2>
            <p class="text-muted">Ingrese sus credenciales para acceder al sistema</p>
          </div>
          
          <form action="#" method="POST">
            <div class="mb-4">
              <label for="txtUsuario" class="form-label fw-semibold">Usuario</label>
              <input type="text" 
                     class="form-control form-control-lg py-2" 
                     id="txtUsuario" 
                     name="txtUsuario" 
                     required
                     placeholder="Ingrese su nombre de usuario">
            </div>
            
            <div class="mb-4">
              <label for="txtPassword" class="form-label fw-semibold">Contraseña</label>
              <input type="password" 
                     class="form-control form-control-lg py-2" 
                     id="txtPassword" 
                     name="txtPassword" 
                     required
                     placeholder="Ingrese su contraseña">
            </div>
            
            <div class="d-grid mb-3">
              <button type="submit" 
                      id="btnIniciarSesion" 
                      class="btn btn-primary btn-lg py-2 fw-semibold" 
                      name="btnIniciarSesion">
                <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar sesión
              </button>
            </div>
            
            <div class="d-grid mb-3">
              <a href="registro.php" class="btn btn-outline-secondary btn-lg py-2">
                <i class="bi bi-person-plus me-2"></i>Registro
              </a>
            </div>
            
            <div class="d-grid">
              <a href="restablecer.php" class="btn btn-outline-secondary btn-lg py-2">
                <i class="bi bi-key me-2"></i>Restablecer contraseña
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function btnRegLogin(){
    var btn = document.getElementById('btnRegistro');
    if (divRegistro.style.display === "none") {
      divRegistro.style.display = "block";
      divIniciarSesion.style.display = "none"
      btn.value = "Iniciar Sesion";
    } else {
      divRegistro.style.display = "none";
      divIniciarSesion.style.display = "block";
      btn.value = "Registrarme";
    }
  }
</script>

<?php include 'footer.php' ?>