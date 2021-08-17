<?php

class TipoingresosModel extends Query{

    private $nombre, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }

    public function getTipoingresos()
    {
        $sql = "SELECT * FROM tipoingreso";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarTipoingreso(string $nombre)
    {
        $this->nombre = $nombre;
        $verificar = "SELECT * FROM tipoingreso WHERE nombre ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO tipoingreso(nombre) VALUES(?)";
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
    public function modificarTipoingreso(string $nombre, int $idtipoingreso)
    {
        $this->nombre = $nombre;
        $this->idtipoingreso = $idtipoingreso;
        $sql = "UPDATE tipoingreso SET nombre=? WHERE idtipoingreso=? ";
        $datos = array($this->nombre, $this->idtipoingreso);
        $data = $this->save($sql, $datos);
        if ($data ==1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    //consulta
    public function editarTipoingreso(int $idtipoingreso)
    {
        $sql = "SELECT * FROM tipoingreso WHERE idtipoingreso = $idtipoingreso";
        $data= $this->select($sql);
        return $data;
    }

    public function accionTipoingreso(int $estatus, int $idtipoingreso)
    {
        $this->idtipoingreso = $idtipoingreso;
        $this->estatus= $estatus;
        $sql= "UPDATE tipoingreso SET estatus = ? WHERE idtipoingreso=?";
        $datos= array($this->estatus, $this->idtipoingreso);
        $data= $this->save($sql, $datos);
        return $data;
    }

    

}
?>
