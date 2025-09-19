<?php
require_once 'utilities/db.php';
require_once 'utilities/tools.php';

  $connectionMysql = new Connection();
  $connection = $connectionMysql->getConnection();
  $mysqlQuery = new MySqlQuery($connection);

  $query = "select * from tipo_identificacion";
  $tipos_identificacion = $mysqlQuery->get($query);

  // consulta de departamentos
  $query = "select * from departamentos";
  $departamentos = $mysqlQuery->get($query);

  // consulta de municipios
  $query = "select * from municipios";
  $municipios = $mysqlQuery->get($query);

  if(isset($_POST['btnRegistrar'])){
    limpiar_entradas();
    var_dump($_POST);
    $numTipoIdentificacion = $_POST['numTipoIdentificacion'];
    $numNumeroIdentificacion = $_POST['numNumeroIdentificacion'];
    $txtNombre = $_POST['txtNombre'];
    $txtApellido = $_POST['txtApellido'];
    $numTelefono = $_POST['numTelefono'];
    $txtEmail = $_POST['txtEmail'];
    $datFechaNac = $_POST['datFechaNac'];
    $txtNivelEducativo = $_POST['txtNivelEducativo'];
    $txtTitulo = $_POST['txtTitulo'];
    $txtPais = $_POST['txtPais'];
    $numDepartamentoNac = $_POST['numDepartamentoNac'];
    $numMunicipioNac = $_POST['numMunicipioNac'];
    $txtGenero = $_POST['txtGenero'];
    $txtGrupoEtnico = $_POST['txtGrupoEtnico'];
    $txtVictimaConflicto = $_POST['txtVictimaConflicto'];
    $txtPersonaDiscapacidad = $_POST['txtPersonaDiscapacidad'];
    $txtMigrante = $_POST['txtMigrante'];
    $txtComunidadLGBTI = $_POST['txtComunidadLGBTI'];
    $txtDireccionRes = $_POST['txtDireccionRes'];
    $numDepartamentoRes = $_POST['numDepartamentoRes'];
    $numMunicipioRes = $_POST['numMunicipioRes'];
    $txtSisben = $_POST['txtSisben'];
    $txtSeguridadSocial = $_POST['txtSeguridadSocial'];
    $txtPension = $_POST['txtPension'];
    $txtCuentaRut = $_POST['txtCuentaRut'];
    $numRut = $_POST['numRut'];
    $ingreso_mensual = $_POST['ingreso_mensual']; // Nuevo campo agregado
    $txtUsuario = md5($_POST['txtUsuario']);
    $txtClave = md5($_POST['txtClave']);
    $terminos=$_POST['terminos'];
   

    // consultar si el numero de identificacion existe en la base de datos
    $query = "select * from personas where numero_identificacion = :numero_identificacion";
    $persona = $mysqlQuery->get($query, array(':numero_identificacion' => $numNumeroIdentificacion));
    if(empty($persona)){
      $query = "
        INSERT INTO personas(
          id, id_tipo_identificacion, numero_identificacion, nombres, apellidos, telefono, email, fecha_nac, pais_nac, id_departamento_nac, 
          id_municipio_nac, genero, grupo_etnico, victima_conflicto, persona_discapacidad, migrante, comunidad_lgbti, direccion_residencia, 
          id_departamento_residencia, id_municipio_residencia, categoria_sisben, regimen_seguridad_social, regimen_pension, cuenta_con_rut, 
          numero_rut, nivel_educativo, titulo_educativo, ingreso_mensual,terminos )
        VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
      ";
      $mysqlQuery->excecuteQuery($query, array( 
        $numTipoIdentificacion,
        $numNumeroIdentificacion,
        $txtNombre,
        $txtApellido,
        $numTelefono,
        $txtEmail,
        $datFechaNac,
        $txtPais,
        $numDepartamentoNac,
        $numMunicipioNac,
        $txtGenero,
        $txtGrupoEtnico,
        $txtVictimaConflicto,
        $txtPersonaDiscapacidad,
        $txtMigrante,
        $txtComunidadLGBTI,
        $txtDireccionRes,
        $numDepartamentoRes,
        $numMunicipioRes,
        $txtSisben,
        $txtSeguridadSocial,
        $txtPension,
        $txtCuentaRut,
        $numRut,
        $txtNivelEducativo,
        $txtTitulo,
        $ingreso_mensual,
        $terminos
        ) // Nuevo campo agregado
      );
      $query = "select id from personas where numero_identificacion = :numero_identificacion";
      $persona = $mysqlQuery->get($query, array(':numero_identificacion' => $numNumeroIdentificacion));
      $idPersona = $persona[0]['id'];
      $query = "insert into usuarios (id, id_persona, fecha_creacion, clave, token, usuario) values(NULL, ?, NOW(), ?, NULL, ?)";
      $mysqlQuery->excecuteQuery($query, array($idPersona, $txtClave, $txtUsuario));
      echo('<script>
        alert("Se ha creado el usuario correctamente");
        window.location.href = "index.php";
      </script>');

    }else{
      echo('<script>
        alert("El Número de identificacion ya se encuentra registrado en la base de datos");
        window.location.href = "index.php";
      </script>');
    }

  }
?>

<?php include 'head.php' ?>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card shadow">
        <div class="card-header bg-primary text-white text-center">
          <h3 class="mb-0">Formulario de Registro</h3>
        </div>
        <div class="card-body p-4">
          <form action="#" method="POST">
            <div class="row">
              <!-- Información básica -->
              <div class="col-md-6">
                <h5 class="border-bottom pb-2 mb-3">Información Básica</h5>
                
                <div class="mb-3">
                  <label for="numTipoIdentificacion" class="form-label">Tipo de Identificación</label>
                  <select class="form-select" name="numTipoIdentificacion" id="numTipoIdentificacion" required>
                    <option value="">Seleccione</option>
                    <?php
                      foreach($tipos_identificacion as $tipo_identificacion){
                        ?>
                          <option value="<?php echo($tipo_identificacion['id']) ?>"><?php echo($tipo_identificacion['nombre']) ?></option>
                        <?php
                      }
                    ?>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="numNumeroIdentificacion">Número de identificación</label>
                  <input class="form-control" type="number" name="numNumeroIdentificacion" id="numNumeroIdentificacion" required>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtNombre">Nombres</label>
                  <input class="form-control" type="text" name="txtNombre" id="txtNombre" required>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtApellido">Apellidos</label>
                  <input class="form-control" type="text" name="txtApellido" id="txtApellido" required>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="numTelefono">Teléfono</label>
                  <input class="form-control" type="number" name="numTelefono" id="numTelefono" required>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtEmail">Email</label>
                  <input class="form-control" type="email" name="txtEmail" id="txtEmail" required>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="datFechaNac">Fecha Nacimiento</label>
                  <input class="form-control" type="date" name="datFechaNac" id="datFechaNac" required>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtGenero">Género</label>
                  <select class="form-select" name="txtGenero" id="txtGenero">
                    <option value="na">Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
              </div>
              
              <!-- Información educativa y de nacimiento -->
              <div class="col-md-6">
                <h5 class="border-bottom pb-2 mb-3">Información Académica y de Nacimiento</h5>
                
                <div class="mb-3">
                  <label class="form-label" for="txtNivelEducativo">Nivel Educativo</label>
                  <select class="form-select" name="txtNivelEducativo" id="txtNivelEducativo">
                    <option value="">Seleccione</option>
                    <option value="Ninguno">Ninguno</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Tecnólogo">Tecnólogo</option>
                    <option value="Prof Universidad">Profesional (Universitario)</option>
                    <option value="Prof Postgrado">Postgrado (Especializacion, Maestria, Doctorado, Etc.)</option>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtTitulo">Título Obtenido</label>
                  <input class="form-control" type="text" name="txtTitulo" id="txtTitulo">
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtPais">Pais de Nacimiento</label>
                  <input class="form-control" type="text" name="txtPais" id="txtPais" required>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="departamento1">Departamento de Nacimiento (Si es Extranjero Seleccione la Opción "Otro")</label>
                  <select class="form-select" name="numDepartamentoNac" id="departamento1" required>
                    <option value="0">Seleccione</option>
                    <?php
                      foreach($departamentos as $departamento){
                        ?>
                          <option value="<?php echo($departamento['id']) ?>"><?php echo($departamento['nombre']) ?></option>
                        <?php
                      }
                    ?>
                    <option value="33">Otro</option>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="municipio1">Municipio de Nacimiento (Si es Extranjero seleccione la Opción "Otro")</label>
                  <select class="form-select" name="numMunicipioNac" id="municipio1" required>
                    <option value="0">Seleccione</option>
                    <?php
                      foreach($municipios as $municipio){
                        ?>
                          <option value="<?php echo($municipio['id']) ?>" data-depto="<?php echo($municipio['id_departamento'])   ?>">  <?php echo($municipio['nombre']) ?></option>
                        <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            
            <!-- Información de características personales -->
            <div class="row mt-4">
              <div class="col-12">
                <h5 class="border-bottom pb-2 mb-3">Características Personales</h5>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtGrupoEtnico">Grupo Étnico</label>
                  <select class="form-select" name="txtGrupoEtnico" id="txtGrupoEtnico" >
                    <option value="na">Seleccione</option>
                    <option value="Ninguno">Ninguno</option>
                    <option value="Afrodescendiente">Afrodescendiente</option>
                    <option value="Gitano">Gitano</option>
                    <option value="Indígena">Indígena</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtVictimaConflicto">Victima de Conflicto Armado</label>
                  <select class="form-select" name="txtVictimaConflicto" id="txtVictimaConflicto" >
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtPersonaDiscapacidad">Persona con Discapacidad</label>
                  <select class="form-select" name="txtPersonaDiscapacidad" id="txtPersonaDiscapacidad">
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtMigrante">Migrante</label>
                  <select class="form-select" name="txtMigrante" id="txtMigrante">
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtComunidadLGBTI">Comunidad LGBTIQ+</label>
                  <select class="form-select" name="txtComunidadLGBTI" id="txtComunidadLGBTI">
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                  </select>
                </div>
              </div>
            </div>
            
            <!-- Información de residencia -->
            <div class="row mt-4">
              <div class="col-12">
                <h5 class="border-bottom pb-2 mb-3">Información de Residencia</h5>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtDireccionRes">Direccion de Residencia (Con Barrio, Conjunto, Interior, Etc.)</label>
                  <input class="form-control" type="text" name="txtDireccionRes" id="txtDireccionRes" required>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="departamento">Departamento de Residencia</label>
                  <select class="form-select" name="numDepartamentoRes" id="departamento" required>
                    <option value="0">Seleccione</option>
                    <?php
                      foreach($departamentos as $departamento){
                        ?>
                          <option value="<?php echo($departamento['id']) ?>"><?php echo($departamento['nombre']) ?></option>
                        <?php
                      }
                    ?>
                    <option value="33">Otro</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="municipio">Municipio de Residencia</label>
                  <select class="form-select" name="numMunicipioRes" id="municipio" required>
                    <?php
                      foreach($municipios as $municipio){
                        ?>
                          <option value="<?php echo($municipio['id']) ?>" data-depto="<?php echo($municipio['id_departamento'])   ?>" ><?php echo($municipio['nombre']) ?></option>
                        <?php
                      }
                    ?>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtSisben">Categoria de SISBEN</label>
                  <select class="form-select" name="txtSisben" id="txtSisben">
                    <option value="">Seleccione</option>
                    <option value="Categoria A">Categoria A</option>
                    <option value="Categoria B">Categoria B</option>
                    <option value="Categoria C">Categoria C</option>
                    <option value="Categoria D">Categoria D</option>
                    <option value="No Sabe / No Responde">No Sabe / No Responde</option>
                  </select>
                </div>
              </div>
            </div>
            
            <!-- Información de seguridad social -->
            <div class="row mt-4">
              <div class="col-12">
                <h5 class="border-bottom pb-2 mb-3">Información de Seguridad Social y Económica</h5>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtSeguridadSocial">Regimen Seguridad Social</label>
                  <select class="form-select" name="txtSeguridadSocial" id="txtSeguridadSocial">
                    <option value="na">Seleccione</option>
                    <option value="Afiliado Contributivo">Afiliado Contributivo (Aportante)</option>
                    <option value="Afiliado Subsidiado">Afiliado Subsidiado (SISBEN)</option>
                    <option value="Beneficiario">Beneficiario Contributivo</option>
                    <option value="Especial">Especial</option>
                    <option value="Ninguno">Ninguno</option>
                    <option value="na">No sabe / No Responde</option>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="txtPension">Regimen Pensíon</label>
                  <select class="form-select" name="txtPension" id="txtPension">
                    <option value="na">Seleccione</option>
                    <option value="BEPS">Beneficion Economicos Periodicos</option>
                    <option value="Fondo Público">Fondo Público</option>
                    <option value="Fondo Privado">Fondo Privado</option>
                  </select>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtCuentaRut">Cuenta con RUT</label>
                  <select class="form-select" name="txtCuentaRut" id="txtCuentaRut">
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                  </select>
                </div>
                
                <div class="mb-3">
                  <label class="form-label" for="numRut">Número RUT</label>
                  <input class="form-control" type="number" name="numRut" id="numRut">
                </div>
              </div>
              
              <!-- Nuevo campo: Ingresos mensuales -->
              <div class="col-12 mt-3">
                <div class="mb-3">
                  <label for="ingreso_mensual" class="form-label required">Ingresos mensuales *</label>
                  <select class="form-select" name="ingreso_mensual" id="ingreso_mensual" required>
                    <option value="" selected disabled>-- Seleccione el ingreso --</option>
                    <option value="No recibe ingresos">No recibe ingresos</option>
                    <option value="Menos de medio salario mínimo (Menos de $500.000)">Menos de medio salario mínimo (Menos de $500.000)</option>
                    <option value="Entre medio salario mínimo y un salario mínimo (De $500.000 a $1.000.000)">Entre medio salario mínimo y un salario mínimo (De $500.000 a $1.000.000)</option>
                    <option value="Entre 1 y 2 salarios mínimos (De $1.000.001 a $2.000.000)">Entre 1 y 2 salarios mínimos (De $1.000.001 a $2.000.000)</option>
                    <option value="Entre 2 y 3 salarios mínimos (De $2.000.001 a $3.000.000)">Entre 2 y 3 salarios mínimos (De $2.000.001 a $3.000.000)</option>
                    <option value="Entre 3 y 4 salarios mínimos (De $3.000.001 a $4.000.000)">Entre 3 y 4 salarios mínimos (De $3.000.001 a $4.000.000)</option>
                    <option value="Entre 4 и 5 salarios mínimos (De $4.000.001 a $5.000.000)">Entre 4 y 5 salarios mínimos (De $4.000.001 a $5.000.000)</option>
                    <option value="Más de 5 salarios mínimos (Más de $5.000.000)">Más de 5 salarios mínimos (Más de $5.000.000)</option>
                    <option value="No responde">No responde</option>
                  </select>
                  <div class="form-text">Seleccione el rango de ingresos que mejor represente su situación actual.</div>
                </div>
              </div>
            </div>
            
            <!-- Información de usuario -->
            <div class="row mt-4">
              <div class="col-12">
                <h5 class="border-bottom pb-2 mb-3">Datos de Usuario</h5>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtUsuario">Usuario</label>
                  <input class="form-control" type="text" name="txtUsuario" id="txtUsuario" required>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtClave">Contraseña</label>
                  <input class="form-control" type="password" name="txtClave" id="txtClave" required>
                </div>
              </div>
            </div>
            <div class="col -md-12">
              <p>
                De conformidad con lo definido por la Ley 1581 de 2012, el Decreto Reglamentario 1377 de 2013, la Circular Externa 002 de 2015 expedida por la Superintendencia de Industria y Comercio, la política interna de manejo de la información implementada por EL INSTITUTO MUNICIPAL DE CULTURA Y TURISMO DE TENJO y las demás normas concordantes, a través de las cuales se establecen disposiciones generales en materia de habeas data y se regula el tratamiento de la información que contenga datos personales, me permito declarar de manera expresa que:Autorizo de manera libre, voluntaria, previa, explícita, informada e inequívoca al INSTITUTO MUNICIPAL DE CULTURA Y TURISMO DE TENJO, para que en los términos legalmente establecidos realice la recolección, almacenamiento, uso, circulación, supresión y en general, el tratamiento de los datos personales que he procedido a entregar de manera veraz y completa que pueda ser recolectado para fines del instituto y/o Alcaldía Municipal, en virtud de las relaciones legales, contractuales, comerciales y/o de cualquier otra que surja, en desarrollo y ejecución de los fines descritos en el presente documento, así como, el manejo de imagen en fotografía y video.
              </p>
              aceptar
              <input type="checkbox" name="terminos" value ='1'required>
            </div>
            <!-- Botón de envío -->
            <div class="row mt-4">
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg" name="btnRegistrar">Registrarme</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const departamentoSelect = document.getElementById('departamento');
  const municipioSelect = document.getElementById('municipio');
  const todasOpciones = Array.from(municipioSelect.querySelectorAll('option'));

  departamentoSelect.addEventListener('change', function () {
      const deptoId = this.value;

      // Limpiar municipios, excepto el primero ("Seleccione")
      municipioSelect.innerHTML = '<option value="">Seleccione</option>';

      // Filtrar y volver a agregar los que coinciden
      todasOpciones.forEach(opcion => {
          if (opcion.value === '') return; // omitir la opción "Seleccione"
          if (opcion.dataset.depto === deptoId) {
              municipioSelect.appendChild(opcion);
          }
      });
  });
</script>

<script>
  const departamentoSelect1 = document.getElementById('departamento1');
  const municipioSelect1 = document.getElementById('municipio1');
  const todasOpciones1 = Array.from(municipioSelect1.querySelectorAll('option'));

  departamentoSelect1.addEventListener('change', function () {
      const deptoId = this.value;

      // Limpiar municipios, excepto el primero ("Seleccione")
      municipioSelect1.innerHTML = '<option value="">Seleccione</option>';

      // Filtrar y volver a agregar los que coinciden
      todasOpciones1.forEach(opcion => {
          if (opcion.value === '') return; // omitir la opción "Seleccione"
          if (opcion.dataset.depto === deptoId) {
              municipioSelect1.appendChild(opcion);
          }
      });
  });
</script>

<?php include 'footer.php' ?>