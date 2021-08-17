<?php

class TipoapoyosModel extends Query{

    private $nombre, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }

    public function getTipoapoyo()
    {
        $sql = "SELECT * FROM tipoapoyo";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarTipoapoyo(string $nombre)
    {
        $this->nombre = $nombre;
        $verificar = "SELECT * FROM tipoapoyo WHERE nombre ='$this->nombre'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO tipoapoyo(nombre) VALUES(?)";
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
    public function modificarTipoapoyo(string $nombre, int $idtipoapoyo)
    {
        $this->nombre = $nombre;
        $this->idtipoapoyo = $idtipoapoyo;
        $sql = "UPDATE tipoapoyo SET nombre=? WHERE idtipoapoyo=? ";
        $datos = array($this->nombre, $this->idtipoapoyo);
        $data = $this->save($sql, $datos);
        if ($data ==1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    //consulta
    public function editarTipoapoyo(int $idtipoapoyo)
    {
        $sql = "SELECT * FROM tipoapoyo WHERE idtipoapoyo = $idtipoapoyo";
        $data= $this->select($sql);
        return $data;
    }

    public function accionTipoapoyo(int $estatus, int $idtipoapoyo)
    {
        $this->idtipoapoyo = $idtipoapoyo;
        $this->estatus= $estatus;
        $sql= "UPDATE tipoapoyo SET estatus = ? WHERE idtipoapoyo=?";
        $datos= array($this->estatus, $this->idtipoapoyo);
        $data= $this->save($sql, $datos);
        return $data;
    }

    

}
?>
