<?php
class Empleados extends Controller{

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
        $data = $this->model->getEmpleado();
        for ($i=0; $i< count($data); $i++){
            if($data[$i]['estatus']==1){
                $data[$i]['estatus']='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarEmpleado('.$data[$i]['idempleado'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarEmpleado('.$data[$i]['idempleado'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }else{
                $data[$i]['estatus']='<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarEmpleado('.$data[$i]['idempleado'].')"><i class="fas fa-circle"></i></button>
                </div>';
            }
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REALIZAR UN REGISTRO
    public function registrar()
    {
        $idempleado = $_POST['idempleado'];
        $iddepartamento = $_POST['iddepartamento'];
        $idpuesto = $_POST['idpuesto'];
        $nombre = $_POST['nombre'];
        $apellidopaterno = $_POST['apellidopaterno'];
        $apellidomaterno = $_POST['apellidomaterno'];
        $rfc = $_POST['rfc'];
        $curp = $_POST['curp'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
       
        if (empty($rfc)){
            $msg= "Todos los campos son obligatorios";
        }else{
            if ($idempleado== ""){
                    $data = $this->model->registrarEmpleado($iddepartamento, $idpuesto, $nombre, $apellidopaterno, $apellidomaterno,
                    $rfc, $curp, $correo, $telefono);
                    if ($data =="ok"){
                        $msg= "si";
                    }else if($data == "existe"){
                        $msg= "El rfc ya existe";
                    }else{
                        $msg= "Error al registrar el puesto";
                    }

            }else{
                $data = $this->model->modificarPuesto($nombre, $idpuesto);
                if ($data =="modificado"){
                    $msg= "modificado";
                }else{
                    $msg= "Error al modificar el puesto";
                }
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA actualizar
    public function editar(int $idpuesto)
    {
        $data = $this->model->editarPuesto($idpuesto);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA ELIMINAR
    public function eliminar(int $idpuesto)
    {
        $data= $this->model->accionPuesto(0, $idpuesto);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al eliminar el puesto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REINGRESAR
    public function reingresar(int $idpuesto)
    {
        $data= $this->model->accionPuesto(1, $idpuesto);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al reingresar el puesto";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
}
?>
