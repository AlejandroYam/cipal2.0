<?php

class DepartamentosModel extends Query{

    private $nombre, $iddepartamento, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }

    public function getDepartamentos()
    {
        $sql = "SELECT * FROM departamento ";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarDepartamento(string $nombre)
    {
        $this->nombre = $nombre;
        $verificar = "SELECT * FROM departamento WHERE nombre ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO departamento(nombre) VALUES(?)";
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
    public function modificarDepartamento(string $nombre, int $iddepartamento)
    {
        $this->nombre = $nombre;
        $this->iddepartamento = $iddepartamento;
        $sql = "UPDATE departamento SET nombre=? WHERE iddepartamento=? ";
        $datos = array($this->nombre, $this->iddepartamento);
        $data = $this->save($sql, $datos);
        if ($data ==1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    //consulta
    public function editarDep(int $iddepartamento)
    {
        $sql = "SELECT * FROM departamento WHERE iddepartamento = $iddepartamento";
        $data= $this->select($sql);
        return $data;
    }

    public function accionDep(int $estatus, int $iddepartamento)
    {
        $this->iddepartamento = $iddepartamento;
        $this->estatus= $estatus;
        $sql= "UPDATE departamento SET estatus = ? WHERE iddepartamento=?";
        $datos= array($this->estatus, $this->iddepartamento);
        $data= $this->save($sql, $datos);
        return $data;
    }

    

}
?>