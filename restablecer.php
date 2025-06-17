<?php
  require_once 'utilities/db.php';
  require_once 'utilities/tools.php';

  $connectionMysql = new Connection();
  $connection = $connectionMysql->getConnection();
  $mysqlQuery = new MySqlQuery($connection);
  
  if(isset($_POST['btnRestablecer'])){
    limpiar_entradas();
    $numIdentificacion = $_POST['numIdentificacion'];
    $txtEmail = $_POST['txtEmail'];

    $query = "select * from personas where numero_identificacion = :numero_identificacion and email = :email;";
    $persona = $mysqlQuery->get($query, array(':numero_identificacion'=>$numIdentificacion, ':email'=>$txtEmail));

    if(!empty($persona)){
      $query = 'select id from usuarios where id_persona = :id_persona';
      $usuario = $mysqlQuery->get($query, array(':id_persona'=>$persona[0]['id']));
      $codigo = generarCodigo();
      $idUsuario = $usuario[0]['id'];
      $query = 'update usuarios set token = ? where id = ?';
      $mysqlQuery->excecuteQuery($query, array($codigo, $idUsuario));
      $correo = $trayectorias[0]['email'];
          $subject = 'Restablecer contraseña Sicut';
          $body = 'El código para restablecer contraseña es: '.$codigo;
          sendMail($txtEmail, $subject, $body);
      echo('<script>
        alert("Se ha enviado un codigo de verificación a su correo electrónico");
        window.location.href = "clave.php";
      </script>');
    }else{
      echo('<script>
        alert("No se encuentra usuario en la base de datos");
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
          <label for="" class="from-label">Email</label>
          <input type="text" class="form-control" id="txtEmail" name="txtEmail" required>
        </div>
        <div class="mb-3">
          <input type="submit" id="btnRestablecer" class="btn btn-secondary" name="btnRestablecer" value="Restablecer Contraseña">
        </div>
      </form>
    </div>
  </div>
</div>
