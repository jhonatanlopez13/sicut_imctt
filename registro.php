<?php
require_once 'utilities/db.php';
require_once 'utilities/tools.php';

// Conexión y consultas iniciales
$connectionMysql = new Connection();
$connection = $connectionMysql->getConnection();
$mysqlQuery = new MySqlQuery($connection);

$query = "select * from tipo_identificacion";
$tipos_identificacion = $mysqlQuery->get($query);

$query = "select * from departamentos";
$departamentos = $mysqlQuery->get($query);

$query = "select * from municipios";
$municipios = $mysqlQuery->get($query);

// Procesamiento del formulario
if(isset($_POST['btnRegistrar'])){
    limpiar_entradas();
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
    $txtUsuario = md5($_POST['txtUsuario']);
    $txtClave = md5($_POST['txtClave']);
    $poliza = $_POST['poliza'];
    $num_poliza = $_POST['num_poliza'];

    $query = "select * from personas where numero_identificacion = :numero_identificacion";
    $persona = $mysqlQuery->get($query, array(':numero_identificacion' => $numNumeroIdentificacion));
    
    if(empty($persona)){
        $query = "
            INSERT INTO personas(
              id,id_tipo_identificacion,numero_identificacion,nombres,apellidos,telefono,email,fecha_nac,pais_nac,id_departamento_nac,id_municipio_nac,genero,grupo_etnico,victima_conflicto,persona_discapacidad,migrante,comunidad_lgbti,direccion_residencia,id_municipio_residencia,id_departamento_residencia,categoria_sisben,regimen_seguridad_social,regimen_pension,cuenta_con_rut,numero_rut,nivel_educativo,titulo_educativo,poliza,terminos
            )
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
            $poliza,
            $num_poliza)
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

<!-- HTML del formulario -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">Formulario de Registro</h3>
                </div>
                <div class="card-body p-4">
                    <form action="#" method="POST" class="needs-validation" novalidate>
                        <div class="row g-3">
                            <!-- Sección 1: Información Básica -->
                            <div class="col-md-6">
                                <h5 class="mb-3 text-primary">Información Personal</h5>
                                
                                <div class="mb-3">
                                    <label for="numTipoIdentificacion" class="form-label">Tipo de Identificación</label>
                                    <select class="form-select" name="numTipoIdentificacion" id="numTipoIdentificacion" required>
                                        <option value="">Seleccione</option>
                                        <?php foreach($tipos_identificacion as $tipo_identificacion): ?>
                                            <option value="<?= $tipo_identificacion['id'] ?>"><?= $tipo_identificacion['nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="numNumeroIdentificacion" class="form-label">Número de identificación</label>
                                    <input class="form-control" id="numNumeroIdentificacion" name="numNumeroIdentificacion" oninput="actualizarValorMunicipioInm()"></input>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtNombre" class="form-label">Nombres</label>
                                    <input class="form-control" type="text" name="txtNombre" id="txtNombre" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtApellido" class="form-label">Apellidos</label>
                                    <input class="form-control" type="text" name="txtApellido" id="txtApellido" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="numTelefono" class="form-label">Teléfono</label>
                                    <input class="form-control" type="number" name="numTelefono" id="numTelefono" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtEmail" class="form-label">Email</label>
                                    <input class="form-control" type="email" name="txtEmail" id="txtEmail" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="datFechaNac" class="form-label">Fecha Nacimiento</label>
                                    <input class="form-control" type="date" name="datFechaNac" id="datFechaNac" required>
                                </div>
                            </div>
                            
                            <!-- Sección 2: Información Adicional -->
                            <div class="col-md-6">
                                <h5 class="mb-3 text-primary">Información Adicional</h5>
                                
                                <div class="mb-3">
                                    <label for="txtNivelEducativo" class="form-label">Nivel Educativo</label>
                                    <select class="form-select" name="txtNivelEducativo" id="txtNivelEducativo">
                                        <option value="">Seleccione</option>
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                        <option value="Técnico">Técnico</option>
                                        <option value="Tecnólogo">Tecnólogo</option>
                                        <option value="Prof Universidad">Profesional (Universitario)</option>
                                        <option value="Prof Postgrado">Postgrado</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtTitulo" class="form-label">Título Obtenido</label>
                                    <input class="form-control" type="text" name="txtTitulo" id="txtTitulo">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtPais" class="form-label">País de Nacimiento</label>
                                    <input class="form-control" type="text" name="txtPais" id="txtPais" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtGenero" class="form-label">Género</label>
                                    <select class="form-select" name="txtGenero" id="txtGenero">
                                        <option value="na">Seleccione</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtGrupoEtnico" class="form-label">Grupo Étnico</label>
                                    <select class="form-select" name="txtGrupoEtnico" id="txtGrupoEtnico">
                                        <option value="na">Seleccione</option>
                                        <option value="Ninguno">Ninguno</option>
                                        <option value="Afrodescendiente">Afrodescendiente</option>
                                        <option value="Gitano">Gitano</option>
                                        <option value="Indígena">Indígena</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Sección 3: Ubicación -->
                            <div class="col-md-6">
                                <h5 class="mb-3 text-primary">Ubicación</h5>
                                
                                <div class="mb-3">
                                    <label for="numDepartamentoNac" class="form-label">Departamento de Nacimiento</label>
                                    <select class="form-select" name="numDepartamentoNac" id="numDepartamentoNac" required>
                                        <option value="0">Seleccione</option>
                                        <?php foreach($departamentos as $departamento): ?>
                                            <option value="<?= $departamento['id'] ?>"><?= $departamento['nombre'] ?></option>
                                        <?php endforeach; ?>
                                        <option value="33">Otro</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="numMunicipioNac" class="form-label">Municipio de Nacimiento</label>
                                    <select class="form-select" name="numMunicipioNac" id="numMunicipioNac" required></select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtDireccionRes" class="form-label">Dirección de Residencia</label>
                                    <input class="form-control" type="text" name="txtDireccionRes" id="txtDireccionRes" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="numDepartamentoRes" class="form-label">Departamento de Residencia</label>
                                    <select class="form-select" name="numDepartamentoRes" id="numDepartamentoRes" required>
                                        <option value="0">Seleccione</option>
                                        <?php foreach($departamentos as $departamento): ?>
                                            <option value="<?= $departamento['id'] ?>"><?= $departamento['nombre'] ?></option>
                                        <?php endforeach; ?>
                                        <option value="33">Otro</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="numMunicipioRes" class="form-label">Municipio de Residencia</label>
                                    <select class="form-select" name="numMunicipioRes" id="numMunicipioRes" required></select>
                                </div>
                            </div>
                            
                            <!-- Sección 4: Situación Social -->
                            <div class="col-md-6">
                                <h5 class="mb-3 text-primary">Situación Social</h5>
                                
                                <div class="mb-3">
                                    <label for="txtVictimaConflicto" class="form-label">Víctima de Conflicto Armado</label>
                                    <select class="form-select" name="txtVictimaConflicto" id="txtVictimaConflicto">
                                        <option value="No">No</option>
                                        <option value="Si">Si</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtPersonaDiscapacidad" class="form-label">Persona con Discapacidad</label>
                                    <select class="form-select" name="txtPersonaDiscapacidad" id="txtPersonaDiscapacidad">
                                        <option value="No">No</option>
                                        <option value="Si">Si</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtMigrante" class="form-label">Migrante</label>
                                    <select class="form-select" name="txtMigrante" id="txtMigrante">
                                        <option value="No">No</option>
                                        <option value="Si">Si</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtComunidadLGBTI" class="form-label">Comunidad LGBTIQ+</label>
                                    <select class="form-select" name="txtComunidadLGBTI" id="txtComunidadLGBTI">
                                        <option value="No">No</option>
                                        <option value="Si">Si</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtSisben" class="form-label">Categoría de SISBEN</label>
                                    <select class="form-select" name="txtSisben" id="txtSisben">
                                        <option value="">Seleccione</option>
                                        <option value="Categoria A">Categoría A</option>
                                        <option value="Categoria B">Categoría B</option>
                                        <option value="Categoria C">Categoría C</option>
                                        <option value="Categoria D">Categoría D</option>
                                        <option value="No Sabe / No Responde">No Sabe / No Responde</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Sección 5: Seguridad Social -->
                            <div class="col-md-6">
                                <h5 class="mb-3 text-primary">Seguridad Social</h5>
                                
                                <div class="mb-3">
                                    <label for="txtSeguridadSocial" class="form-label">Régimen Seguridad Social</label>
                                    <select class="form-select" name="txtSeguridadSocial" id="txtSeguridadSocial">
                                        <option value="na">Seleccione</option>
                                        <option value="Afiliado Contributivo">Afiliado Contributivo</option>
                                        <option value="Afiliado Subsidiado">Afiliado Subsidiado</option>
                                        <option value="Beneficiario">Beneficiario</option>
                                        <option value="Especial">Especial</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtPension" class="form-label">Régimen Pensión</label>
                                    <select class="form-select" name="txtPension" id="txtPension">
                                        <option value="na">Seleccione</option>
                                        <option value="BEPS">Beneficios Económicos Periódicos</option>
                                        <option value="Fondo Público">Fondo Público</option>
                                        <option value="Fondo Privado">Fondo Privado</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtCuentaRut" class="form-label">Cuenta con RUT</label>
                                    <select class="form-select" name="txtCuentaRut" id="txtCuentaRut">
                                        <option value="No">No</option>
                                        <option value="Si">Si</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="numRut" class="form-label">Número RUT</label>
                                    <input class="form-control" type="number" name="numRut" id="numRut">
                                </div>
                                <div class="mb-3">
                                    <label for="poliza" class="form-label">Cuenta con poliza</label>
                                    <select class="form-select" name="poliza" id="poliza">
                                        <option value="No">No</option>
                                        <option value="Si">Si</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="numRut" class="form-label">Número de poliza</label>
                                    <input class="form-control" type="number" name="num_poliza" id="num_poliza">
                                </div>
                            </div>
                            
                            <!-- Sección 6: Credenciales -->
                            <div class="col-md-6">
                                <h5 class="mb-3 text-primary">Credenciales de Acceso</h5>
                                
                                <div class="mb-3">
                                    <label for="txtUsuario" class="form-label">Usuario</label>
                                    <input class="form-control" id="txtUsuario" name="txtUsuario" > </input>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="txtClave" class="form-label">Contraseña</label>
                                    <input class="form-control" type="password" name="txtClave" id="txtClave" required>
                                </div>

                                <div class="mb-3">
                                    <p>
                                        De conformidad con lo definido por la Ley 1581 de 2012, el Decreto Reglamentario 1377 de 2013, la Circular Externa 002 de 2015 expedida por la Superintendencia de Industria y Comercio, la política interna de manejo de la información implementada por EL INSTITUTO MUNICIPAL DE CULTURA Y TURISMO DE TENJO y las demás normas concordantes, a través de las cuales se establecen disposiciones generales en materia de habeas data y se regula el tratamiento de la información que contenga datos personales, me permito declarar de manera expresa que:
                                        Autorizo de manera libre, voluntaria, previa, explícita, informada e inequívoca al INSTITUTO MUNICIPAL DE CULTURA Y TURISMO DE TENJO, para que en los términos legalmente establecidos realice la recolección, almacenamiento, uso, circulación, supresión y en general, el tratamiento de los datos personales que he procedido a entregar de manera veraz y completa que pueda ser recolectado para fines del instituto y/o Alcaldía Municipal, en virtud de las relaciones legales, contractuales, comerciales y/o de cualquier otra que surja, en desarrollo y ejecución de los fines descritos en el presente documento, así como, el manejo de imagen en fotografía y video.

                                    </p>
                                    <input type="checkbox" id="terminos" name="terminos" values='1' required>
                                    <label for="terminos">Acepto los términos y condiciones</label>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5" name="btnRegistrar">Registrarme</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
document.getElementById('numDepartamentoNac').addEventListener('change', function() {
    var departamentoId = this.value;
    var municipioSelect = document.getElementById('numMunicipioNac');
    
    municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';
    
    var municipiosDepartamento = <?php echo json_encode($municipios); ?>;
    for (var i = 0; i < municipiosDepartamento.length; i++) {
        if (municipiosDepartamento[i].id_departamento == departamentoId) {
            municipioSelect.innerHTML += '<option value="' + municipiosDepartamento[i].id + '">' + municipiosDepartamento[i].nombre + '</option>';
        }
    }
});

document.getElementById('numDepartamentoRes').addEventListener('change', function() {
    var departamentoId = this.value;
    var municipioSelect = document.getElementById('numMunicipioRes');
    
    municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';
    
    var municipiosDepartamento = <?php echo json_encode($municipios); ?>;
    for (var i = 0; i < municipiosDepartamento.length; i++) {
        if (municipiosDepartamento[i].id_departamento == departamentoId) {
            municipioSelect.innerHTML += '<option value="' + municipiosDepartamento[i].id + '">' + municipiosDepartamento[i].nombre + '</option>';
        }
    }
});

function actualizarValorMunicipioInm() {
    let municipio = document.getElementById("numNumeroIdentificacion").value;
    document.getElementById("txtUsuario").value = municipio;
}
</script>

<?php include 'footer.php' ?>