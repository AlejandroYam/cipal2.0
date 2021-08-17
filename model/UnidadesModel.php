<?php

class UnidadesModel extends Query{

    private $nombre, $clave, $descripcion, $idunidad, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }

    public function getUnidades()
    {
        $sql = "SELECT * FROM unidad ";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarUnidad(string $nombre, string $clave, string $descripcion)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $verificar = "SELECT * FROM unidad WHERE clave ='$this->clave'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO unidad(nombre, clave, descripcion) VALUES(?,?,?)";
            $datos = array($this->nombre, $this->clave, $this->descripcion);
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
    public function modificarUnidad(string $nombre, string $clave, string $descripcion, int $idunidad)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->idunidad = $idunidad;
        $sql = "UPDATE unidad SET nombre=?, clave=?, descripcion=? WHERE idunidad=? ";
        $datos = array($this->nombre, $this->clave, $this->descripcion, $this->idunidad);
        $data = $this->save($sql, $datos);
        if ($data ==1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    //consulta
    public function editarUni(int $idunidad)
    {
        $sql = "SELECT * FROM unidad WHERE idunidad = $idunidad";
        $data= $this->select($sql);
        return $data;
    }

    public function accionUni(int $estatus, int $idunidad)
    {
        $this->idunidad = $idunidad;
        $this->estatus= $estatus;
        $sql= "UPDATE unidad SET estatus = ? WHERE idunidad=?";
        $datos= array($this->estatus, $this->idunidad);
        $data= $this->save($sql, $datos);
        return $data;
    }

    

}
?>
