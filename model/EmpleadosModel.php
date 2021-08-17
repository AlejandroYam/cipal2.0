<?php

class EmpleadosModel extends Query{

    private $nombre, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }

    public function getEmpleado()
    {
        $sql = "SELECT * FROM empleado";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarEmpleado(int $iddepartamento,int $idpuesto, string $nombre, string $apellidopaterno, string $apellidomaterno,
    string $rfc, string $curp, string $correo, string $telefono )
    {
        $this->iddepartamento = $iddepartamento;
        $this->idpuesto = $idpuesto;
        $this->nombre = $nombre;
        $this->apellidopaterno = $apellidopaterno;
        $this->apellidomaterno = $apellidomaterno;
        $this->rfc = $rfc;
        $this->curp = $curp;
        $this->correo = $correo;
        $this->telefono = $telefono;

        $verificar = "SELECT * FROM empleado WHERE rfc ='$this->rfc'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO empleado(iddepartamento, idpuesto, nombre, apellidopaterno, apellidomaterno, rfc, curp, correo, telefono) VALUES(?,?,?,?,?,?,?,?,?)";
            $datos = array($this->iddepartamento, $this->idpuesto, $this->nombre, $this->apellidopaterno, $this->apellidomaterno,$this->rfc,
            $this->curp, $this->correo, $this->telefono);
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
