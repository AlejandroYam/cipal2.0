<?php

class ContribuyentesModel extends Query{

    private $nombre, $rfc, $telefono, $domicilio, $idcontribuyente, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }

    public function getContribuyentes()
    {
        $sql = "SELECT * FROM contribuyente ";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarContribuyente(string $nombre, string $rfc, string $telefono, string $domicilio)
    {
        $this->nombre = $nombre;
        $this->rfc = $rfc;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
        $verificar = "SELECT * FROM contribuyente WHERE rfc ='$this->rfc'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO contribuyente(nombre, rfc, telefono, domicilio) VALUES(?,?,?,?)";
            $datos = array($this->nombre, $this->rfc, $this->telefono, $this->domicilio);
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
    public function modificarContribuyente(string $nombre, string $rfc, string $telefono, string $domicilio, int $idcontribuyente)
    {
        $this->nombre = $nombre;
        $this->rfc = $rfc;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
        $this->idcontribuyente = $idcontribuyente;
        $sql = "UPDATE contribuyente SET nombre=?, rfc=?, telefono=?, domicilio=? WHERE idcontribuyente=? ";
        $datos = array($this->nombre, $this->rfc, $this->telefono, $this->domicilio, $this->idcontribuyente);
        $data = $this->save($sql, $datos);
        if ($data ==1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    //consulta
    public function editarCon(int $idcontribuyente)
    {
        $sql = "SELECT * FROM contribuyente WHERE idcontribuyente = $idcontribuyente";
        $data= $this->select($sql);
        return $data;
    }

    public function accionCon(int $estatus, int $idcontribuyente)
    {
        $this->idcontribuyente = $idcontribuyente;
        $this->estatus= $estatus;
        $sql= "UPDATE contribuyente SET estatus = ? WHERE idcontribuyente=?";
        $datos= array($this->estatus, $this->idcontribuyente);
        $data= $this->save($sql, $datos);
        return $data;
    }

    

}
?>
