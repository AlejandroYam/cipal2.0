<?php

class PuestosModel extends Query{

    private $nombre, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }

    public function getPuesto()
    {
        $sql = "SELECT * FROM puesto ";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarPuesto(string $nombre)
    {
        $this->nombre = $nombre;
        $verificar = "SELECT * FROM puesto WHERE nombre ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO puesto(nombre) VALUES(?)";
            $datos = array($this->nombre);
            $data = $this->save($sql, $datos);
            if($data == 1){
                $res= "ok";
            }else{
                $res= "error";
            }
        }else{
            $res = "existe";
        }
        
        return $res;
    }

    //METODO PARA MODIFICAR
    public function modificarPuesto(string $nombre, int $idpuesto)
    {
        $this->nombre = $nombre;
        $this->idpuesto = $idpuesto;
        $sql = "UPDATE puesto SET nombre=? WHERE idpuesto=? ";
        $datos = array($this->nombre, $this->idpuesto);
        $data = $this->save($sql, $datos);
        if ($data ==1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    //consulta
    public function editarPuesto(int $idpuesto)
    {
        $sql = "SELECT * FROM puesto WHERE idpuesto = $idpuesto";
        $data= $this->select($sql);
        return $data;
    }

    public function accionPuesto(int $estatus, int $idpuesto)
    {
        $this->idpuesto = $idpuesto;
        $this->estatus= $estatus;
        $sql= "UPDATE puesto SET estatus = ? WHERE idpuesto=?";
        $datos= array($this->estatus, $this->idpuesto);
        $data= $this->save($sql, $datos);
        return $data;
    }

    

}
?>
