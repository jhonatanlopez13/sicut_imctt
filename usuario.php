<?php
  require_once 'utilities/db.php';
  require_once 'utilities/tools.php';
  regenerar_cookie();
  if(isset($_SESSION['idUsuario']) and isset($_SESSION['idPersona'])){
    $idUsuario = $_SESSION['idUsuario'];
    $idPersona = $_SESSION['idPersona'];

    $connectionMysql = new Connection();
    $connection = $connectionMysql->getConnection();
    $mysqlQuery = new MySqlQuery($connection);

    // consulta de usuario
    $query = "
      select ti.nombre as tipo_identificacion
        , p.numero_identificacion 
        , p.nombres
        , p.apellidos 
        , p.telefono 
        , p.email 
        , p.fecha_nac
        , p.pais_nac
        , p.id_departamento_nac 
        , p.id_municipio_nac 
        , dnac.nombre as departamento_nacimiento
        , mnac.nombre as municipio_nacimiento
        , p.genero
        , p.grupo_etnico
        , p.victima_conflicto
        , p.persona_discapacidad
        , p.migrante
        , p.comunidad_lgbti
        , p.direccion_residencia
        , p.id_departamento_residencia 
        , p.id_municipio_residencia 
        , mres.nombre as municipio_residencia
        , dres.nombre as departamento_residencia
        , p.categoria_sisben
        , p.regimen_seguridad_social
        , p.regimen_pension
        , p.cuenta_con_rut
        , p.numero_rut
        , p.nivel_educativo
        , p.titulo_educativo
      from personas p 
        left join tipo_identificacion ti on p.id_tipo_identificacion = ti.id 
        left join departamentos dnac on p.id_departamento_nac = dnac.id
        left join municipios mnac on p.id_municipio_nac = mnac.id
        left join departamentos dres on p.id_departamento_residencia = dres.id 
        left join municipios mres on p.id_municipio_residencia = mres.id 
      where p.id = :id";
    $resPersona = $mysqlQuery->get($query, array(':id' => $idPersona));
    $persona = $resPersona[0];
    // consulta de departamentos
    $query = "select * from departamentos";
    $departamentos = $mysqlQuery->get($query);
    
    // consulta de municipios
    $query = "select * from municipios";
    $municipios = $mysqlQuery->get($query);

    // consulta de sectores
    $query = "select * from sector_cultural";
    $sectoresCultural = $mysqlQuery->get($query);

    //consulta de sub sector
    $query = "select * from sub_sector_cultural";
    $subSectores = $mysqlQuery->get($query);

    if(isset($_POST['btnActualizar'])){
      limpiar_entradas();
      $numTelefono = $_POST['numTelefono'];
      $txtEmail = $_POST['txtEmail'];
      $txtNivelEducativo = $_POST['txtNivelEducativo'];
      $txtTitulo = $_POST['txtTitulo'];
      $txtDireccionRes = $_POST['txtDireccionRes'];
      $numDepartamentoRes = $_POST['numDepartamentoRes'];
      $numMunicipioRes = $_POST['numMunicipioRes'];
      $txtSisben = $_POST['txtSisben'];
      $txtSeguridadSocial = $_POST['txtSeguridadSocial'];
      $txtPension = $_POST['txtPension'];
      $txtCuentaRut = $_POST['txtCuentaRut'];
      $numRut = $_POST['numRut'];

      $query = "
        update personas p set
          p.telefono = ?,
          p.email = ?,
          p.nivel_educativo = ?,
          p.titulo_educativo = ?,
          p.direccion_residencia = ?,
          p.id_departamento_residencia = ?,
          p.id_municipio_residencia = ?,
          p.categoria_sisben = ?,
          p.regimen_seguridad_social = ?,
          p.regimen_pension = ?,
          p.cuenta_con_rut = ?,
          p.numero_rut = ?
        where p.id = ?
      ";
      $mysqlQuery->excecuteQuery($query, array(
        $numTelefono, $txtEmail, $txtNivelEducativo, $txtTitulo, $txtDireccionRes, $numDepartamentoRes, 
        $numMunicipioRes, $txtSisben, $txtSeguridadSocial, $txtPension, $txtCuentaRut, $numRut, $idPersona));
      echo('<script>
        alert("datos de usuario actualizado");
        window.location.href = "usuario.php";
      </script>');
    }

    if(isset($_POST['btnCrearExperiencia'])){
      limpiar_entradas();
      $numSectorCultural = $_POST['numSectorCultural'];
      $numSubSectorCultural = $_POST['numSubSectorCultural'];
      $txtFrecuencuenciaFormacion = $_POST['txtFrecuencuenciaFormacion'];
      $txtFrecuencuenciaProduccion = $_POST['txtFrecuencuenciaProduccion'];
      $txtFrecuencuenciaInvestigacion = $_POST['txtFrecuencuenciaInvestigacion'];
      $txtFrecuencuenciaPromosion = $_POST['txtFrecuencuenciaPromosion'];
      $txtFrecuencuenciaEmprendimiento = $_POST['txtFrecuencuenciaEmprendimiento'];
      $numAniosExperiencia = $_POST['numAniosExperiencia'];
      if (!empty($_FILES['filDocumentoAdjunto']['name'])) {
        // Extraer detalles del archivo
        $nombreArchivo = $_FILES['filDocumentoAdjunto']['name'];
        $tipoArchivo = $_FILES['filDocumentoAdjunto']['type'];
        $archivoTmpNombre = $_FILES['filDocumentoAdjunto']['tmp_name'];
    
        // Directorio donde se subirá el archivo
        $directorioSubida = 'uploaded_files/';
        $directorioUsuario = $directorioSubida . $idUsuario . '/';
        mkdir($directorioUsuario, 0777, true);
        $directorioSubida = 'uploaded_files/'.$idUsuario.'/';
        
        // Validar la extensión
        $extensionArchivo = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $extensionesPermitidas = array('pdf', 'PDF');
        if (in_array($extensionArchivo, $extensionesPermitidas)) {
          $rutaArchivoSubido = $directorioSubida . $nombreArchivo;
          if (move_uploaded_file($archivoTmpNombre, $rutaArchivoSubido)) {
            $filDocumentoAdjunto = $rutaArchivoSubido;
          } else {
            // Error al subir el archivo
            echo('<script>
              alert("Error al cargar el archivo");
              window.location.href = "usuario.php";
            </script>');
          }
        } else {
          // Extensión no permitida
          echo('<script>
            alert("La extensión del archivo no está permitida");
            window.location.href = "usuario.php";
          </script>');
        }
      } else {
          // No se ha subido ningún archivo
          $filDocumentoAdjunto = 'no hay archivo adjunto';
      }

      // creacion de experiencia
      $query = "INSERT INTO trayectoria
      (id, id_usuario, id_sub_sector_cultural, actividades_formacion, actividades_creacion_produccion, actividades_investigacion, actividades_promosion, actividades_emprendiimiento, anios_experiencia, archivo)
      VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
      $mysqlQuery->excecuteQuery($query, array($idUsuario, $numSubSectorCultural, $txtFrecuencuenciaFormacion, $txtFrecuencuenciaProduccion, $txtFrecuencuenciaInvestigacion, 
        $txtFrecuencuenciaPromosion, $txtFrecuencuenciaEmprendimiento, $numAniosExperiencia, $filDocumentoAdjunto));
        $correo = $persona['email'];
        $subject = 'Registro de trayectoria SICUT';
        $body = 'Se ha registado una nueva trayecrotia con su suario, sera informado cuando esta haya sido aprobada por el equipo del Instituto de Cuntura y Turismo de Tenjo';
        sendMail($correo, $subject, $body);
        echo('<script>
          alert("Se ha creado la trayectoria, pronto recibira un correo electrónico informando el estado de aprobacion de la tyrayectoria cultural que acaba de documentar");
          window.location.href = "usuario.php";
        </script>');
    }

    $connectionMysql->closeConnection();
  }else{
    echo('<script>
      alert("Es necesario iniciar sesion");
      window.location.href = "index.php";
    </script>');
  }
?>
<?php include('head.php') ?>

<div class="container-fluid p-4">
  <!-- Sección de Datos del Usuario -->
  <div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Datos del Usuario</h4>
    </div>
    <div class="card-body">
      <form action="#" method="POST">
        <!-- Primera fila de datos -->
        <div class="row mb-3">
          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Tipo de Identificación</label>
            <p class="form-control-static"><?php echo($persona['tipo_identificacion']); ?></p>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Número de identificación</label>
            <p class="form-control-static"><?php echo($persona['numero_identificacion']); ?></p>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Nombres</label>
            <p class="form-control-static"><?php echo($persona['nombres']); ?></p>
          </div>
        </div>

        <!-- Segunda fila de datos -->
        <div class="row mb-3">
          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Apellidos</label>
            <p class="form-control-static"><?php echo($persona['apellidos']); ?></p>
          </div>
          <div class="col-md-4 mb-3">
            <label for="numTelefono" class="form-label fw-bold">Teléfono</label>
            <input class="form-control" type="number" name="numTelefono" id="numTelefono" required value="<?php echo($persona['telefono']); ?>">
          </div>
          <div class="col-md-4 mb-3">
            <label for="txtEmail" class="form-label fw-bold">Email</label>
            <input type="email" class="form-control" name="txtEmail" id="txtEmail" required value="<?php echo($persona['email']); ?>">
          </div>
        </div>

        <!-- Tercera fila de datos -->
        <div class="row mb-3">
          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Fecha Nacimiento</label>
            <p class="form-control-static"><?php echo($persona['fecha_nac']); ?></p>
          </div>
          <div class="col-md-4 mb-3">
            <label for="txtNivelEducativo" class="form-label fw-bold">Nivel Educativo</label>
            <select class="form-select" name="txtNivelEducativo" id="txtNivelEducativo">
              <option value="<?php echo($persona['nivel_educativo']); ?>" selected><?php echo($persona['nivel_educativo']); ?></option>
              <option value="Ninguno">Ninguno</option>
              <option value="Primaria">Primaria</option>
              <option value="Secundaria">Secundaria</option>
              <option value="Técnico">Técnico</option>
              <option value="Tecnólogo">Tecnólogo</option>
              <option value="Prof Universidad">Profesional (Universitario)</option>
              <option value="Prof Postgrado">Postgrado (Especializacion, Maestria, Doctorado, Etc.)</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="txtTitulo" class="form-label fw-bold">Título Obtenido</label>
            <input type="text" class="form-control" name="txtTitulo" id="txtTitulo" value="<?php echo($persona['titulo_educativo']); ?>">
          </div>
        </div>

        <!-- Cuarta fila de datos -->
        <div class="row mb-3">
          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Pais de Nacimiento</label>
            <p class="form-control-static"><?php echo($persona['pais_nac']); ?></p>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Dep de Nacimiento</label>
            <p class="form-control-static"><?php echo($persona['departamento_nacimiento']); ?></p>
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label fw-bold">Municipio de Nacimiento</label>
            <p class="form-control-static"><?php echo($persona['municipio_nacimiento']); ?></p>
          </div>
        </div>

        <!-- Quinta fila de datos (información demográfica) -->
        <div class="row mb-3">
          <div class="col-md-2 mb-3">
            <label class="form-label fw-bold">Género</label>
            <p class="form-control-static"><?php echo($persona['genero']); ?></p>
          </div>
          <div class="col-md-2 mb-3">
            <label class="form-label fw-bold">Grupo Étnico</label>
            <p class="form-control-static"><?php echo($persona['grupo_etnico']); ?></p>
          </div>
          <div class="col-md-2 mb-3">
            <label class="form-label fw-bold">Victima de Conflicto</label>
            <p class="form-control-static"><?php echo($persona['victima_conflicto']); ?></p>
          </div>
          <div class="col-md-2 mb-3">
            <label class="form-label fw-bold">Persona con Discapacidad</label>
            <p class="form-control-static"><?php echo($persona['persona_discapacidad']); ?></p>
          </div>
          <div class="col-md-2 mb-3">
            <label class="form-label fw-bold">Migrante</label>
            <p class="form-control-static"><?php echo($persona['migrante']); ?></p>
          </div>
          <div class="col-md-2 mb-3">
            <label class="form-label fw-bold">Comunidad LGBTIQ+</label>
            <p class="form-control-static"><?php echo($persona['comunidad_lgbti']); ?></p>
          </div>
        </div>

        <!-- Sexta fila de datos (dirección) -->
        <div class="row mb-3">
          <div class="col-md-4 mb-3">
            <label for="txtDireccionRes" class="form-label fw-bold">Dirección de Residencia</label>
            <input class="form-control" type="text" name="txtDireccionRes" id="txtDireccionRes" required value="<?php echo($persona['direccion_residencia']); ?>">
          </div>
          <div class="col-md-4 mb-3">
            <label for="numDepartamentoRes" class="form-label fw-bold">Dep de Residencia</label>
            <select class="form-select" name="numDepartamentoRes" id="numDepartamentoRes" required>
              <option value="<?php echo($persona['id_departamento_residencia']); ?>" selected><?php echo($persona['departamento_residencia']); ?></option>
              <?php foreach($departamentos as $departamento): ?>
                <option value="<?php echo($departamento['id']) ?>"><?php echo($departamento['nombre']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="numMunicipioRes" class="form-label fw-bold">Municipio de Residencia</label>
            <select class="form-select" name="numMunicipioRes" id="numMunicipioRes" required>
              <option value="<?php echo($persona['id_municipio_residencia']);?>"><?php echo($persona['municipio_residencia']);?></option>
            </select>
          </div>
        </div>

        <!-- Séptima fila de datos (seguridad social) -->
        <div class="row mb-3">
          <div class="col-md-3 mb-3">
            <label for="txtSisben" class="form-label fw-bold">Categoria de SISBEN</label>
            <select class="form-select" name="txtSisben" id="txtSisben">
              <option value="<?php echo($persona['categoria_sisben']);?>"selected><?php echo($persona['categoria_sisben']);?></option>
              <option value="Categoria A">Categoria A</option>
              <option value="Categoria B">Categoria B</option>
              <option value="Categoria C">Categoria C</option>
              <option value="Categoria D">Categoria D</option>
              <option value="No Sabe / No Responde">No Sabe / No Responde</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="txtSeguridadSocial" class="form-label fw-bold">Regimen Seguridad Social</label>
            <select class="form-select" name="txtSeguridadSocial" id="txtSeguridadSocial">
              <option value="<?php echo($persona['regimen_seguridad_social']);?>" selected><?php echo($persona['regimen_seguridad_social']);?></option>
              <option value="Afiliado Contributivo">Afiliado Contributivo (Aportante)</option>
              <option value="Afiliado Subsidiado">Afiliado Subsidiado (SISBEN)</option>
              <option value="Beneficiario">Beneficiario Contributivo</option>
              <option value="Especial">Especial</option>
              <option value="Ninguno">Ninguno</option>
              <option value="na">No sabe / No Responde</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="txtPension" class="form-label fw-bold">Regimen Pensíon</label>
            <select class="form-select" name="txtPension" id="txtPension">
              <option value="<?php echo($persona['regimen_pension']);?>" selected><?php echo($persona['regimen_pension']);?></option>
              <option value="BEPS">Beneficion Economicos Periodicos</option>
              <option value="Fondo Público">Fondo Público</option>
              <option value="Fondo Privado">Fondo Privado</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="txtCuentaRut" class="form-label fw-bold">Cuenta con RUT</label>
            <select class="form-select" name="txtCuentaRut" id="txtCuentaRut">
              <option value="<?php echo($persona['cuenta_con_rut']);?>"><?php echo($persona['cuenta_con_rut']);?></option>
              <option value="No">No</option>
              <option value="Si">Si</option>
            </select>
          </div>
        </div>
        <!-- Octava fila (RUT) -->
        <div class="row mb-3">
          <div class="col-md-6 mb-3">
            <label for="numRut" class="form-label fw-bold">Número RUT</label>
            <input class="form-control" type="number" name="numRut" id="numRut" value="<?php echo($persona['numero_rut']);?>">
          </div>
          <div class="col-md-6 mb-3 d-flex align-items-end justify-content-end">
            <input class="btn btn-primary px-4" type="submit" value="Actualizar Datos" name="btnActualizar">
          </div>
        </div>

        
      </form>
    </div>
  </div>

  <!-- Sección de Información Artística -->
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Información Artística</h4>
    </div>
    <div class="card-body">
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="numSectorCultural" class="form-label fw-bold">Sector Cultural</label>
            <select class="form-select" name="numSectorCultural" id="numSectorCultural" required>
              <option value="">Seleccione un sector</option>
              <?php foreach($sectoresCultural as $sectorCultural): ?>
                <option value="<?php echo($sectorCultural['id']); ?>"><?php echo($sectorCultural['nombre']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="numSubSectorCultural" class="form-label fw-bold">Sub Sector Cultural</label>
            <select class="form-select" name="numSubSectorCultural" id="numSubSectorCultural" required>
              <option value="">Primero seleccione un sector</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="txtFrecuencuenciaFormacion" class="form-label">Frecuencia de actividades de enseñanza y formación</label>
            <select class="form-select" name="txtFrecuencuenciaFormacion" id="txtFrecuencuenciaFormacion">
              <option value="">Seleccione</option>
              <option value="Nunca">Nunca</option>
              <option value="Rara vez">Rara vez</option>
              <option value="Ocasionalmente">Ocasionalmente</option>
              <option value="Frecuentemente">Frecuentemente</option>
              <option value="Siempre">Siempre</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="txtFrecuencuenciaProduccion" class="form-label">Frecuencia de creación y producción artística</label>
            <select class="form-select" name="txtFrecuencuenciaProduccion" id="txtFrecuencuenciaProduccion">
              <option value="">Seleccione</option>
              <option value="Nunca">Nunca</option>
              <option value="Rara vez">Rara vez</option>
              <option value="Ocasionalmente">Ocasionalmente</option>
              <option value="Frecuentemente">Frecuentemente</option>
              <option value="Siempre">Siempre</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="txtFrecuencuenciaPromosion" class="form-label">Frecuencia de presentaciones/exposiciones</label>
            <select class="form-select" name="txtFrecuencuenciaPromosion" id="txtFrecuencuenciaPromosion">
              <option value="">Seleccione</option>
              <option value="Nunca">Nunca</option>
              <option value="Rara vez">Rara vez</option>
              <option value="Ocasionalmente">Ocasionalmente</option>
              <option value="Frecuentemente">Frecuentemente</option>
              <option value="Siempre">Siempre</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="txtFrecuencuenciaInvestigacion" class="form-label">Frecuencia de actividades de investigación</label>
            <select class="form-select" name="txtFrecuencuenciaInvestigacion" id="txtFrecuencuenciaInvestigacion">
              <option value="">Seleccione</option>
              <option value="Nunca">Nunca</option>
              <option value="Rara vez">Rara vez</option>
              <option value="Ocasionalmente">Ocasionalmente</option>
              <option value="Frecuentemente">Frecuentemente</option>
              <option value="Siempre">Siempre</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="txtFrecuencuenciaEmprendimiento" class="form-label">Frecuencia de actividades de emprendimiento</label>
            <select class="form-select" name="txtFrecuencuenciaEmprendimiento" id="txtFrecuencuenciaEmprendimiento">
              <option value="">Seleccione</option>
              <option value="Nunca">Nunca</option>
              <option value="Rara vez">Rara vez</option>
              <option value="Ocasionalmente">Ocasionalmente</option>
              <option value="Frecuentemente">Frecuentemente</option>
              <option value="Siempre">Siempre</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="numAniosExperiencia" class="form-label fw-bold">Años de experiencia</label>
            <input type="number" class="form-control" name="numAniosExperiencia" id="numAniosExperiencia" min="0" max="100">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="filDocumentoAdjunto" class="form-label fw-bold">describa brevemente su procesos artisitico</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="procesoartistico" id='procesoartistico'></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="filDocumentoAdjunto" class="form-label fw-bold">Certificados de experiencia (PDF, máximo 5MB)</label>
            <input type="file" class="form-control" name="filDocumentoAdjunto" id="filDocumentoAdjunto" accept=".pdf">
            <div class="form-text">Adjunte un solo archivo PDF con toda la documentación relevante.</div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 d-flex justify-content-end">
            <input type="submit" class="btn btn-primary px-4" name="btnCrearExperiencia" value="Registrar Trayectoria">
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Sección de Guía Telefónica -->
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">¿Quieres ser parte de nuestra guía telefónica?</h4>
    </div>
    <div class="card-body">
      <form action="#" method="POST">
        <div class="row mb-3">
          <div class="col-md-12 mb-3">
            <label class="form-label fw-bold">¿Cuentas con un lugar para hacer presentaciones?</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="lugarPresentaciones" id="siPresentaciones" value="Si">
              <label class="form-check-label" for="siPresentaciones">Sí</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="lugarPresentaciones" id="noPresentaciones" value="No">
              <label class="form-check-label" for="noPresentaciones">No</label>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6 mb-3">
            <label for="ubicacionLugar" class="form-label fw-bold">Ubicación del lugar (si aplica)</label>
            <input type="text" class="form-control" name="ubicacionLugar" id="ubicacionLugar">
          </div>
          <div class="col-md-6 mb-3">
            <label for="presentaciones" class="form-label fw-bold">Descripción de presentaciones</label>
            <input type="text" class="form-control" name="presentaciones" id="presentaciones">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6 mb-3">
            <label for="contactoGuia" class="form-label fw-bold">Número de id</label>
            <input type="text" class="form-control" name="contactoGuia" id="contactoGuia"  value="<?php echo $_SESSION['idPersona'] ?>">
          </div>
          <div class="col-md-6 mb-3">
            <label for="contactoGuia" class="form-label fw-bold">Número de contacto para la guía</label>
            <input type="text" class="form-control" name="contactoGuia" id="contactoGuia" required>
          </div>
          <div class="col-md-6 mb-3 d-flex align-items-end justify-content-end">
            <input type="submit" class="btn btn-primary px-4" name="btnGuiaTelefonica" value="Registrar en Guía">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // script de municipio de residencia
  document.getElementById('numDepartamentoRes').addEventListener('change', function() {
    var departamentoId = this.value;
    var municipioSelect = document.getElementById('numMunicipioRes');
    
    // Limpiar el select de municipios
    municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';
    
    // Obtener los municipios correspondientes al departamento seleccionado
    var municipiosDepartamento = <?php echo json_encode($municipios); ?>;
    for (var i = 0; i < municipiosDepartamento.length; i++) {
        if (municipiosDepartamento[i].id_departamento == departamentoId) {
            municipioSelect.innerHTML += '<option value="' + municipiosDepartamento[i].id + '">' + municipiosDepartamento[i].nombre + '</option>';
        }
    }
  });

  // script de subsector
  document.getElementById('numSectorCultural').addEventListener('change', function() {
    var sectorId = this.value;
    var subSectorSelect = document.getElementById('numSubSectorCultural');

    subSectorSelect.innerHTML = '<option value="">Seleccione un subsector</option>';
    var subSectorSector = <?php echo json_encode($subSectores); ?>;
    for (var i = 0; i < subSectorSector.length; i++) {
      if (subSectorSector[i].id_sector_cultural == sectorId) {
        subSectorSelect.innerHTML += '<option value="' + subSectorSector[i].id + '">' + subSectorSector[i].nombre + '</option>';
      }
    }
  });
</script>