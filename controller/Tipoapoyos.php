<?php
class Tipoapoyos extends Controller{

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
        $data = $this->model->getTipoapoyo();
        for ($i=0; $i< count($data); $i++){
            if($data[$i]['estatus']==1){
                $data[$i]['estatus']='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarTipoapoyo('.$data[$i]['idtipoapoyo'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarTipoapoyo('.$data[$i]['idtipoapoyo'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }else{
                $data[$i]['estatus']='<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarTipoapoyo('.$data[$i]['idtipoapoyo'].')"><i class="fas fa-circle"></i></button>
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
        $idtipoapoyo = $_POST['idtipoapoyo'];
       
        if (empty($nombre)){
            $msg= "Todos los campos son obligatorios";
        }else{
            if ($idtipoapoyo== ""){
                    $data = $this->model->registrarTipoapoyo($nombre);
                    if ($data =="ok"){
                        $msg= "si";
                    }else if($data == "existe"){
                        $msg= "El rfc ya existe";
                    }else{
                        $msg= "Error al registrar el Tipo de apoyo";
                    }

            }else{
                $data = $this->model->modificarTipoapoyo($nombre, $idtipoapoyo);
                if ($data =="modificado"){
                    $msg= "modificado";
                }else{
                    $msg= "Error al modificar el Tipo de apoyo";
                }
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA actualizar
    public function editar(int $idtipoapoyo)
    {
        $data = $this->model->editarTipoapoyo($idtipoapoyo);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA ELIMINAR
    public function eliminar(int $idtipoapoyo)
    {
        $data= $this->model->accionTipoapoyo(0, $idtipoapoyo);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al eliminar el Tipo de Apoyo";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REINGRESAR
    public function reingresar(int $idtipoapoyo)
    {
        $data= $this->model->accionTipoapoyo(1, $idtipoapoyo);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al reingresar el tipo de apoyo";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
}
?>
