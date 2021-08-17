<?php
class Tipoingresos extends Controller{

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
        $data = $this->model->getTipoingresos();
        for ($i=0; $i< count($data); $i++){
            if($data[$i]['estatus']==1){
                $data[$i]['estatus']='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarTipoingreso('.$data[$i]['idtipoingreso'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarTipoingreso('.$data[$i]['idtipoingreso'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }else{
                $data[$i]['estatus']='<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarTipoingreso('.$data[$i]['idtipoingreso'].')"><i class="fas fa-circle"></i></button>
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
        $idtipoingreso = $_POST['idtipoingreso'];
       
        if (empty($nombre)){
            $msg= "Todos los campos son obligatorios";
        }else{
            if ($idtipoingreso== ""){
                    $data = $this->model->registrarTipoingreso($nombre);
                    if ($data =="ok"){
                        $msg= "si";
                    }else if($data == "existe"){
                        $msg= "El rfc ya existe";
                    }else{
                        $msg= "Error al registrar el Tipo de ingreso";
                    }

            }else{
                $data = $this->model->modificarTipoingreso($nombre, $idtipoingreso);
                if ($data =="modificado"){
                    $msg= "modificado";
                }else{
                    $msg= "Error al modificar el Tipo de ingreso";
                }
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA actualizar
    public function editar(int $idtipoingreso)
    {
        $data = $this->model->editarTipoingreso($idtipoingreso);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA ELIMINAR
    public function eliminar(int $idtipoingreso)
    {
        $data= $this->model->accionTipoingreso(0, $idtipoingreso);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al eliminar el Tipo de ingreso";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REINGRESAR
    public function reingresar(int $idtipoingreso)
    {
        $data= $this->model->accionTipoingreso(1, $idtipoingreso);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al reingresar el tipo de ingreso";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
}
?>
