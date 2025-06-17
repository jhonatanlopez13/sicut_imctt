<?php
  
  class Connection{
    // private $host = 'localhost';
    // private $db = 'tenjocul_sicut_2024';
    // private $port = '3306';
    // private $user = 'tenjocul_adminsicut';
    // private $pass = 'admin2024*';


    private $host = 'localhost';
    private $db = 'sicut_2024';
    private $port = '3306';
    private $user = 'root';
    private $pass = '';

    private $connection;

    public function __construct(){
      $dsn = "mysql:host={$this->host};dbname={$this->db}";
      try {
        $this->connection = new PDO($dsn, $this->user, $this->pass);
        // Configurar el modo de errores de PDO para que lance excepciones
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
      }
    }

    public function getConnection(){
      return $this->connection;
    }
    public function closeConnection(){
      $this->connection = null;
    }
  }

  class MySqlQuery{
    private $connection;

    public function __construct($connection){
      $this->connection = $connection;
    }

    public function get($sql, $params = array()){
      try{
        $statement = $this->connection->prepare($sql);
        foreach ($params as $param => &$value) {
          $statement->bindParam($param, $value);
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e){
        die("Error en la consulta: ". $e->getMessage());
      }
    }

    public function excecuteQuery($sql, $params = array()){
      try{
        $statement = $this->connection->prepare($sql);
        $rowCount = $statement->execute($params);
        return $rowCount;
      } catch (PDOException $e){
        die("Error al ejecutar el procedimiento: " . $e->getMessage());
      }
    }
  }
  
  // // conexion con la base de datos
  // $connectionMysql = new Connection();
  // $connection = $connectionMysql->getConnection();
  // // consulta a la base de datos
  // $mysqlQuery = new MySqlQuery($connection);
  // $result = $mysqlQuery->get("SELECT * FROM tipo_identificacion");
  // foreach($result as $row){
  //   var_dump($row);
  // }
  // $connectionMysql->closeConection();

?>

