<?php
class Contribuyentes extends Controller{

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
        $data = $this->model->getContribuyentes();
        for ($i=0; $i< count($data); $i++){
            if($data[$i]['estatus']==1){
                $data[$i]['estatus']='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarCon('.$data[$i]['idcontribuyente'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarCon('.$data[$i]['idcontribuyente'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }else{
                $data[$i]['estatus']='<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarCon('.$data[$i]['idcontribuyente'].')"><i class="fas fa-circle"></i></button>
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
        $domicilio = $_POST['domicilio'];
        $idcontribuyente = $_POST['idcontribuyente'];
       
        if (empty($nombre) || empty($rfc) || empty($telefono) || empty($domicilio)){
            $msg= "Todos los campos son obligatorios";
        }else{
            if ($idcontribuyente== ""){
                    $data = $this->model->registrarContribuyente($nombre, $rfc, $telefono, $domicilio);
                    if ($data =="ok"){
                        $msg= "si";
                    }else if($data == "existe"){
                        $msg= "El rfc ya existe";
                    }else{
                        $msg= "Error al registrar el contribuyente";
                    }

            }else{
                $data = $this->model->modificarContribuyente($nombre, $rfc, $telefono, $domicilio, $idcontribuyente);
                if ($data =="modificado"){
                    $msg= "modificado";
                }else{
                    $msg= "Error al modificar el contribuyente";
                }
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA actualizar
    public function editar(int $idcontribuyente)
    {
        $data = $this->model->editarCon($idcontribuyente);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA ELIMINAR
    public function eliminar(int $idcontribuyente)
    {
        $data= $this->model->accionCon(0, $idcontribuyente);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al eliminar el contribuyente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REINGRESAR
    public function reingresar(int $idcontribuyente)
    {
        $data= $this->model->accionCon(1, $idcontribuyente);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al reingresar el contribuyente";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
}
?>
