<?php
  require_once 'utilities/db.php';
  require_once 'utilities/tools.php';

  $connectionMysql = new Connection();
  $connection = $connectionMysql->getConnection();
  $mysqlQuery = new MySqlQuery($connection);
  
  if(isset($_POST['btnRestablecer'])){
    limpiar_entradas();
    $numIdentificacion = $_POST['numIdentificacion'];
    $txtUsuario = md5($_POST['txtUsuario']);
    $txtClave = md5($_POST['txtClave']);
    $txtClaveConfirm = md5($_POST['txtClaveConfirm']);
    $txtCodigo = $_POST['txtCodigo'];

    if($txtClave == $txtClaveConfirm){
      $query = "select * from personas where numero_identificacion = :numero_identificacion";
      $persona = $mysqlQuery->get($query, array(':numero_identificacion'=>$numIdentificacion));
      // var_dump($persona);
      if(!empty($persona)){
        $query = 'select id from usuarios where id_persona = :id_persona and usuario = :usuario and token = :token';
        $usuario = $mysqlQuery->get($query, array(':id_persona'=>$persona[0]['id'], 'usuario'=>$txtUsuario, ':token' =>$txtCodigo));
        if(!empty($usuario)){
          $idUsuario = $usuario[0]['id'];
          $query = 'update usuarios set clave = ? where id = ?';
          $mysqlQuery->excecuteQuery($query, array($txtClave, $idUsuario));
          echo('<script>
            alert("Se ha cambiado la contraseña satisfactoriamente");
            window.location.href = "index.php";
          </script>');
        }
        else{
          echo('<script>
            alert("El nombre de usuario no coincide con el número de identificación o el codigo de verificación");
            window.location.href = "clave.php";
          </script>');
        }
      }else{
        echo('<script>
          alert("No se encuentra usuario en la base de datos");
        </script>');
      }
    }else{
      echo('<script>
        alert("Las contraseñas no coinciden");
      </script>');
    }

  }
  $connectionMysql->closeConnection();

?>

<?php include 'head.php' ?>

<div class="container text-center" id="formIniciarSesion" >
  <div class="row align-items-start"> 
    <div class="col">
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="" class="from-label">Numero de identificacion</label>
          <input type="number" class="form-control" id="numIdentificacion" name="numIdentificacion" required>
        </div>
        <div class="mb-3">
          <label for="" class="from-label">Usuario</label>
          <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required>
        </div>
        <div class="mb-3">
          <label for="" class="from-label">Codigo de verificación</label>
          <input type="text" class="form-control" id="txtCodigo" name="txtCodigo" required>
        </div>
        <div class="mb-3">
          <label for="" class="from-label">Contraseña</label>
          <input type="password" class="form-control" id="txtClave" name="txtClave" required>
        </div>
        <div class="mb-3">
          <label for="" class="from-label">Confirmar Contraseña</label>
          <input type="password" class="form-control" id="txtClaveConfirm" name="txtClaveConfirm" required>
        </div>
        <div class="mb-3">
          <input type="submit" id="btnRestablecer" class="btn btn-secondary" name="btnRestablecer" value="Restablecer Contraseña">
        </div>
      </form>
    </div>
  </div>
</div>
