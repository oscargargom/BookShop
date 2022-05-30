<?php

$dbDsn = getenv('DB_DSN');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');
$dbName = getenv('DB_NAME');

$conn = mysqli_connect($dbDsn, $dbUser, $dbPassword, $dbName);

    class Database{

        private $charset;
    
        //Introducir los datos de la base de datos
        public function __construct(){
            $this->dbDsn = getenv('DB_DSN');
            $this->dbName = getenv('DB_NAME');
            $this->dbUser = getenv('DB_USER');
            $this->dbPassword = getenv('DB_PASSWORD');
            $this->charset = 'utf8mb4';
        }
    
        function connect(){
            try{
               //Los datos se sustituyen
                $connection = "mysql:host=" . $this->dbDsn . ";dbname=" . $this->dbName . ";charset=" . $this->charset;
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                
                $pdo = new PDO($connection, $this->dbUser, $this->dbPassword, $options);
        
                return $pdo;
            }catch(PDOException $e){
                print_r('Error connection: ' . $e->getMessage());
            }
        }
    
    }
