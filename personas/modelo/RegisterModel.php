<?php
class RegisterModel {
    private $db;
    
    public function __construct($mysqlQuery) {
        $this->db = $mysqlQuery;
    }
    
    public function getFormData() {
        $query = "select * from tipo_identificacion";
        $tipos_identificacion = $this->db->get($query);

        $query = "select * from departamentos";
        $departamentos = $this->db->get($query);

        $query = "select * from municipios";
        $municipios = $this->db->get($query);
        
        return [
            'tipos_identificacion' => $tipos_identificacion,
            'departamentos' => $departamentos,
            'municipios' => $municipios
        ];
    }
    
    public function registerUser($personaData, $usuarioData) {
        // Verificar si el número de identificación ya existe
        $query = "select * from personas where numero_identificacion = :numero_identificacion";
        $persona = $this->db->get($query, array(':numero_identificacion' => $personaData['numNumeroIdentificacion']));
        
        if(!empty($persona)) {
            return ['success' => false, 'message' => 'El Número de identificación ya se encuentra registrado en la base de datos'];
        }
        
        // Insertar persona
        $query = "
            INSERT INTO personas(
                id, id_tipo_identificacion, numero_identificacion, nombres, apellidos, telefono, email, fecha_nac, pais_nac, id_departamento_nac, 
                id_municipio_nac, genero, grupo_etnico, victima_conflicto, persona_discapacidad, migrante, comunidad_lgbti, direccion_residencia, 
                id_departamento_residencia, id_municipio_residencia, categoria_sisben, regimen_seguridad_social, regimen_pension, cuenta_con_rut, 
                numero_rut, nivel_educativo, titulo_educativo
            )
            VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ";
        
        $params = [
            $personaData['numTipoIdentificacion'],
            $personaData['numNumeroIdentificacion'],
            $personaData['txtNombre'],
            $personaData['txtApellido'],
            $personaData['numTelefono'],
            $personaData['txtEmail'],
            $personaData['datFechaNac'],
            $personaData['txtPais'],
            $personaData['numDepartamentoNac'],
            $personaData['numMunicipioNac'],
            $personaData['txtGenero'],
            $personaData['txtGrupoEtnico'],
            $personaData['txtVictimaConflicto'],
            $personaData['txtPersonaDiscapacidad'],
            $personaData['txtMigrante'],
            $personaData['txtComunidadLGBTI'],
            $personaData['txtDireccionRes'],
            $personaData['numDepartamentoRes'],
            $personaData['numMunicipioRes'],
            $personaData['txtSisben'],
            $personaData['txtSeguridadSocial'],
            $personaData['txtPension'],
            $personaData['txtCuentaRut'],
            $personaData['numRut'],
            $personaData['txtNivelEducativo'],
            $personaData['txtTitulo']
        ];
        
        $this->db->excecuteQuery($query, $params);
        
        // Obtener ID de la persona insertada
        $query = "select id from personas where numero_identificacion = :numero_identificacion";
        $persona = $this->db->get($query, array(':numero_identificacion' => $personaData['numNumeroIdentificacion']));
        $idPersona = $persona[0]['id'];
        
        // Insertar usuario
        $query = "insert into usuarios (id, id_persona, fecha_creacion, clave, token, usuario) values(NULL, ?, NOW(), ?, NULL, ?)";
        $this->db->excecuteQuery($query, array($idPersona, $usuarioData['txtClave'], $usuarioData['txtUsuario']));
        
        return ['success' => true, 'message' => 'Se ha creado el usuario correctamente'];
    }
}
?>