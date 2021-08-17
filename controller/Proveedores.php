<?php
class Proveedores extends Controller{

    public function __construct(){
        session_start();
        if (empty($_SESSION['activo'])){
            header("location: ".base_url);
        }
        parent::__construct();
    }
    public function index()
    {
        $this->views->getView($this, "index");
        
    }

    public function listar()
    {
        $data = $this->model->getProveedores();
        for ($i=0; $i< count($data); $i++){
            if($data[$i]['estatus']==1){
                $data[$i]['estatus']='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarPro('.$data[$i]['idproveedor'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarPro('.$data[$i]['idproveedor'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }else{
                $data[$i]['estatus']='<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarPro('.$data[$i]['idproveedor'].')"><i class="fas fa-circle"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REALIZAR UN REGISTRO
    public function registrar()
    {
        $nombre = $_POST['nombre'];
        $rfc = $_POST['rfc'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $idproveedor = $_POST['idproveedor'];
       
        if (empty($nombre) || empty($rfc) || empty($telefono) || empty($direccion)){
            $msg= "Todos los campos son obligatorios";
        }else{
            if ($idproveedor== ""){
                    $data = $this->model->registrarProveedor($nombre, $rfc, $telefono, $direccion);
                    if ($data =="ok"){
                        $msg= "si";
                    }else if($data == "existe"){
                        $msg= "El rfc ya existe";
                    }else{
                        $msg= "Error al registrar el proveedor";
                    }

            }else{
                $data = $this->model->modificarProveedor($nombre, $rfc, $telefono, $direccion, $idproveedor);
                if ($data =="modificado"){
                    $msg= "modificado";
                }else{
                    $msg= "Error al modificar el proveedor";
                }
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA actualizar
    public function editar(int $idproveedor)
    {
        $data = $this->model->editarPro($idproveedor);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA ELIMINAR
    public function eliminar(int $idproveedor)
    {
        $data= $this->model->accionPro(0, $idproveedor);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al eliminar el proveedor";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REINGRESAR
    public function reingresar(int $idproveedor)
    {
        $data= $this->model->accionPro(1, $idproveedor);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al reingresar el proveedor";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
}
?>
