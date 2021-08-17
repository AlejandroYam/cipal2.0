<?php

class Conexion{

    private $host= "localhost";
    private $user= "root";
    private $password= "";
    private $db= "BDcipal";
    private $connect;

    public function __construct(){
        $connectionString = "mysql:host".$this->host.";dbname=".$this->db.";charset=utf8";
        try{
            $this->connect = new PDO($connectionString,$this->user,$this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexion exitosa";
        }catch(Exeption $e){
            $this->connect = 'Error en la conexion';
            echo "Error: ". $e->getMessage();
        }
    }
}
$connect = new Conexion();
?>