<?php
require_once ('utilities/db.php');
require_once ('utilities/tools.php');

regenerar_cookie();
if(isset($_SESSION['idUsuario']) and isset($_SESSION['idPersona'])){
  $idUsuario = $_SESSION['idUsuario'];
  $idPersona = $_SESSION['idPersona'];

  $connectionMysql = new Connection();
  $connection = $connectionMysql->getConnection();
  $mysqlQuery = new MySqlQuery($connection);

  $query = "
  select 
    p.nombres as nombres, 
    p.apellidos as apellidos,
    p.numero_identificacion as identificacion,
    u.fecha_creacion as fecha_creacion,
    ti.nombre as tipo_identificacion
  from usuarios u 
    inner join personas p on u.id_persona = p.id
    inner join tipo_identificacion ti on p.id_tipo_identificacion = ti.id 
  where u.id = :id;
  ";
  $usuario = $mysqlQuery->get($query, array(':id'=>$idUsuario));
  $fechaCreacion = substr($usuario[0]['fecha_creacion'], 0,10);

  $query = "
  select 
    t.anios_experiencia,
    ssc.nombre 
  from trayectoria t 
    inner join sub_sector_cultural ssc on t.id_sub_sector_cultural = ssc.id 
  where t.id_usuario = :id and trayectoria_aprobada = 1;
  ";
  $trayectoria = $mysqlQuery->get($query, array(':id'=>$idUsuario));
  if(empty($trayectoria)){
    echo('<script>
      alert("No cuentra con trayectorias registradas y aprobadas por el momento");
      window.location.href = "usuario.php";
    </script>');
  }
  $trayectorias = '';
  // foreach($trayectoria as $trayectoria){
  //   $trayectorias .= $trayectoria['nombre']. ', con '. $trayectoria['anios_experiencia']. ' años de experiencia </br>';
  // }



} else {
  echo('<script>
    alert("Es necesario iniciar sesion");
    window.location.href = "index.php";
  </script>');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="certificado-style.css">
  <title>SICUT</title>
</head>
<body>
  <p>Para exportar presione CTRL + P y guarde en pdf</p>
  <div id="contenido">
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <img src="img/lgimctmedgrey.png" width="200" alt="">
        </div>
      </div>
    </div>
    </br>
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <h3>Instituto Municipal de Cultura y Turismo de Tenjo</h3>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <div class="row">
        <div class="col"><h4>Certificado de registro SICUT</h4></div>
      </div>
    </div>
    <div class="container text-center">
      <div class="row">
        <p>
          El Instituto Municipal de Cultura y Turismo de Tenjo - IMCTT </br> certifica que el artista <?php echo($usuario[0]['nombres'].' '. $usuario[0]['apellidos']) ?>
          identificado con <?php echo($usuario[0]['tipo_identificacion']) ?> Numero: <?php echo($usuario[0]['identificacion']) ?>. </br> Se encuentra inscrito en el Sitema Integrado Cultural de Tenjo - SICUT. 
          desde el dia <?php echo($fechaCreacion) ?> con la siguiente trayectoria:
        </p>
        <center>
          <table>
            <?php
              foreach($trayectoria as $item){
                ?>
                  <tr>
                    <td><center><?php echo($item['nombre'])?></center></td>
                  </tr>
                <?php
              }
            ?>
          </table>
        </center>
      </div>
    </div>
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <img src="img/FirmaDiana.png" height="100" alt="">
          <p>Diana Carolina Rojas Gutiérrez</br>Directora Instituto Municipal de Cultura y Turismo de Tenjo</p>
          <p></p>
        </div>
        <!-- <div class="col">
          <img src="img/FirmaChristian.png" height="100" alt="">
          <p>Gyan Christian Camilo Borbon Vanegas</br>Subdirector de Cultura Instituto Municipal de Cultura y Turismo de Tenjo</p>
        </div>
      </div> -->
    </div>
    <div class="container text-center">
      <div class="row">
        <div class="col"><img src="img/LOGO TENJO MINI.png" width="150" alt=""></div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
  function imprimirPDF() {
      // Obtener el contenido que deseas imprimir
      var contenido = document.getElementById('contenido').innerHTML;

      // Abrir una nueva ventana
      var ventana = window.open('', '', 'height=500,width=800');

      // Escribir el contenido HTML en la nueva ventana
      ventana.document.write('<html><head><title>PDF</title></head><body>');
      ventana.document.write(contenido);
      ventana.document.write('</body></html>');

      // Imprimir el documento
      ventana.print();

      // Cerrar la ventana después de imprimir
      // ventana.close();
  }
</script>

