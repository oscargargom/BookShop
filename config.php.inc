<?php

class Config{

    public $host;
    public $db;
    public $user;
    public $password;
    public $charset;

    //Introducir los datos de la base de datos
    public function __construct(){
        $this->host = 'dwes.lan';
        $this->db = 'tiendaLibros';
        $this->user = 'root';
        $this->password = 'usuario';
        $this->charset = 'utf8mb4';
    }

}

$config = new Config();

?>