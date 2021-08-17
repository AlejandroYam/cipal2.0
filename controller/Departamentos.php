<?php
class Departamentos extends Controller{

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
        $data = $this->model->getDepartamentos();
        for ($i=0; $i< count($data); $i++){
            if($data[$i]['estatus']==1){
                $data[$i]['estatus']='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarDep('.$data[$i]['iddepartamento'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarDep('.$data[$i]['iddepartamento'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }else{
                $data[$i]['estatus']='<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarDep('.$data[$i]['iddepartamento'].')"><i class="fas fa-circle"></i></button>
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
        $iddepartamento = $_POST['iddepartamento'];
       
        if (empty($nombre)){
            $msg= "Todos los campos son obligatorios";
        }else{
            if ($iddepartamento== ""){
                    $data = $this->model->registrarDepartamento($nombre);
                    if ($data =="ok"){
                        $msg= "si";
                    }else if($data == "existe"){
                        $msg= "El nombre ya existe";
                    }else{
                        $msg= "Error al registrar el Departamento";
                    }

            }else{
                $data = $this->model-> modificarDepartamento($nombre, $iddepartamento);
                if ($data =="modificado"){
                    $msg= "modificado";
                }else{
                    $msg= "Error al modificar el Departamento";
                }
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA actualizar
    public function editar(int $iddepartamento)
    {
        $data = $this->model->editarDep($iddepartamento);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA ELIMINAR
    public function eliminar(int $iddepartamento)
    {
        $data= $this->model->accionDep(0, $iddepartamento);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al eliminar el Departamento";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REINGRESAR
    public function reingresar(int $iddepartamento)
    {
        $data= $this->model->accionDep(1, $iddepartamento);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al reingresar el Departamento";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
}
?>
