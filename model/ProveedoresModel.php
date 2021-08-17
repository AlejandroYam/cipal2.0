<?php

class ProveedoresModel extends Query{

    private $nombre, $rfc, $telefono, $direccion, $idproveedor, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }

    public function getProveedores()
    {
        $sql = "SELECT * FROM proveedor ";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarProveedor(string $nombre, string $rfc, string $telefono, string $direccion)
    {
        $this->nombre = $nombre;
        $this->rfc = $rfc;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $verificar = "SELECT * FROM proveedor WHERE rfc ='$this->rfc'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO proveedor(nombre, rfc, telefono, direccion) VALUES(?,?,?,?)";
            $datos = array($this->nombre, $this->rfc, $this->telefono, $this->direccion);
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
    public function modificarProveedor(string $nombre, string $rfc, string $telefono, string $direccion, int $idproveedor)
    {
        $this->nombre = $nombre;
        $this->rfc = $rfc;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->idproveedor = $idproveedor;
        $sql = "UPDATE proveedor SET nombre=?, rfc=?, telefono=?, direccion=? WHERE idproveedor=? ";
        $datos = array($this->nombre, $this->rfc, $this->telefono, $this->direccion, $this->idproveedor);
        $data = $this->save($sql, $datos);
        if ($data ==1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    //consulta
    public function editarPro(int $idproveedor)
    {
        $sql = "SELECT * FROM proveedor WHERE idproveedor = $idproveedor";
        $data= $this->select($sql);
        return $data;
    }

    public function accionPro(int $estatus, int $idproveedor)
    {
        $this->idproveedor = $idproveedor;
        $this->estatus= $estatus;
        $sql= "UPDATE proveedor SET estatus = ? WHERE idproveedor=?";
        $datos= array($this->estatus, $this->idproveedor);
        $data= $this->save($sql, $datos);
        return $data;
    }

    

}
?>
