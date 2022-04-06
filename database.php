<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    //Introducir los datos de la base de datos
    public function __construct(){
        $this->host = 'dwes.lan';
        $this->db = 'tiendaLibros';
        $this->user = 'root';
        $this->password = 'usuario';
        $this->charset = 'utf8mb4';
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
    
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

}

?>
