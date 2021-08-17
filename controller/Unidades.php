<?php
class Unidades extends Controller{

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
        $data = $this->model->getUnidades();
        for ($i=0; $i< count($data); $i++){
            if($data[$i]['estatus']==1){
                $data[$i]['estatus']='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarUni('.$data[$i]['idunidad'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarUni('.$data[$i]['idunidad'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }else{
                $data[$i]['estatus']='<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarUni('.$data[$i]['idunidad'].')"><i class="fas fa-circle"></i></button>
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
        $clave = $_POST['clave'];
        $descripcion = $_POST['descripcion'];
        $idunidad = $_POST['idunidad'];
       
        if (empty($nombre) || empty($clave) || empty($descripcion)){
            $msg= "Todos los campos son obligatorios";
        }else{
            if ($idunidad== ""){
                    $data = $this->model->registrarUnidad($nombre, $clave, $descripcion);
                    if ($data =="ok"){
                        $msg= "si";
                    }else if($data == "existe"){
                        $msg= "La unidad ya existe";
                    }else{
                        $msg= "Error al registrar la unidad";
                    }

            }else{
                $data = $this->model-> modificarUnidad($nombre, $clave, $descripcion, $idunidad);
                if ($data =="modificado"){
                    $msg= "modificado";
                }else{
                    $msg= "Error al modificar la unidad de medida";
                }
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA actualizar
    public function editar(int $idunidad)
    {
        $data = $this->model->editarUni($idunidad);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA ELIMINAR
    public function eliminar(int $idunidad)
    {
        $data= $this->model->accionUni(0, $idunidad);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al eliminar la unidad de medida";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REINGRESAR
    public function reingresar(int $idunidad)
    {
        $data= $this->model->accionUni(1, $idunidad);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al reingresar la unidad de medida";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
}
?>
