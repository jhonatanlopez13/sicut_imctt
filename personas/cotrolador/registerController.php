<?php
require_once '../models/RegisterModel.php';
require_once '../utilities/db.php';
require_once '../utilities/tools.php';

class RegisterController {
    private $model;
    
    public function __construct() {
        $connectionMysql = new Connection();
        $connection = $connectionMysql->getConnection();
        $mysqlQuery = new MySqlQuery($connection);
        $this->model = new RegisterModel($mysqlQuery);
    }
    
    public function handleRequest() {
        // Obtener datos para el formulario
        $data = $this->model->getFormData();
        
        // Procesar registro si se envió el formulario
        if(isset($_POST['btnRegistrar'])) {
            $this->processRegistration();
        }
        
        // Mostrar vista
        require_once '../views/registerView.php';
    }
    
    private function processRegistration() {
        limpiar_entradas();
        $personaData = [
            'numTipoIdentificacion' => $_POST['numTipoIdentificacion'],
            'numNumeroIdentificacion' => $_POST['numNumeroIdentificacion'],
            'txtNombre' => $_POST['txtNombre'],
            'txtApellido' => $_POST['txtApellido'],
            'numTelefono' => $_POST['numTelefono'],
            'txtEmail' => $_POST['txtEmail'],
            'datFechaNac' => $_POST['datFechaNac'],
            'txtNivelEducativo' => $_POST['txtNivelEducativo'],
            'txtTitulo' => $_POST['txtTitulo'],
            'txtPais' => $_POST['txtPais'],
            'numDepartamentoNac' => $_POST['numDepartamentoNac'],
            'numMunicipioNac' => $_POST['numMunicipioNac'],
            'txtGenero' => $_POST['txtGenero'],
            'txtGrupoEtnico' => $_POST['txtGrupoEtnico'],
            'txtVictimaConflicto' => $_POST['txtVictimaConflicto'],
            'txtPersonaDiscapacidad' => $_POST['txtPersonaDiscapacidad'],
            'txtMigrante' => $_POST['txtMigrante'],
            'txtComunidadLGBTI' => $_POST['txtComunidadLGBTI'],
            'txtDireccionRes' => $_POST['txtDireccionRes'],
            'numDepartamentoRes' => $_POST['numDepartamentoRes'],
            'numMunicipioRes' => $_POST['numMunicipioRes'],
            'txtSisben' => $_POST['txtSisben'],
            'txtSeguridadSocial' => $_POST['txtSeguridadSocial'],
            'txtPension' => $_POST['txtPension'],
            'txtCuentaRut' => $_POST['txtCuentaRut'],
            'numRut' => $_POST['numRut']
        ];
        
        $usuarioData = [
            'txtUsuario' => md5($_POST['txtUsuario']),
            'txtClave' => md5($_POST['txtClave'])
        ];
        
        $result = $this->model->registerUser($personaData, $usuarioData);
        
        if($result['success']) {
            echo('<script>
                alert("Se ha creado el usuario correctamente");
                window.location.href = "index.php";
            </script>');
        } else {
            echo('<script>
                alert("'.$result['message'].'");
                window.location.href = "index.php";
            </script>');
        }
    }
}

// Ejecutar el controlador
$controller = new RegisterController();
$controller->handleRequest();
?>