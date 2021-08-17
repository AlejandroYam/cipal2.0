<?php
class Usuarios extends Controller{

    public function __construct(){
        session_start();
       
        parent::__construct();
    }
    public function index()
    {
        if (empty($_SESSION['activo'])){
            header("location: ".base_url);
        }
        $this->views->getView($this, "index");
        
    }

    public function listar()
    {
        $data = $this->model->getUsuarios();
        for ($i=0; $i< count($data); $i++){
            if($data[$i]['estatus']==1){
                $data[$i]['estatus']='<span class="badge badge-success">Activo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['idsuario'].');"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['idsuario'].')"><i class="fas fa-trash-alt"></i></button>
                </div>';
            }else{
                $data[$i]['estatus']='<span class="badge badge-danger">Inactivo</span>';
                $data[$i]['acciones'] = '<div>
                <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['idsuario'].')"><i class="fas fa-circle"></i></button>
                </div>';
            }
           
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function validar()
    {
        if(empty($_POST['usuario']) || empty($_POST['password'])){
            $msg = "Los campos estan vacios";
        }else{
            $usuario = $_POST['usuario'];
            $password =  $_POST['password'];
            $hash= hash("SHA256", $password);
            $data = $this->model->getUsuario($usuario, $hash);
            if($data){
                $_SESSION['id_usuario'] = $data['idsuario'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['activo'] = true;
                $msg = "ok";
                
            }else{
                $msg = "Usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REALIZAR UN REGISTRO
    public function registrar()
    {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $confirmar = $_POST['confirmar'];
        $idsuario = $_POST['idsuario'];
        $hash = hash("SHA256", $password);
        if (empty($usuario) || empty($nombre)){
            $msg= "Todos los campos son obligatorios";
        }else{
            if ($idsuario== ""){
                if($password != $confirmar){
                    $msg = "Las contraseñas no coinciden";
                }else{
                    $data = $this->model->registrarUsuario($usuario, $nombre, $hash);
                    if ($data =="ok"){
                        $msg= "si";
                    }else if($data == "existe"){
                        $msg= "El usuario ya existe";
                    }else{
                        $msg= "Error al registrar el usuario";
                    }

                }
            }else{
                $data = $this->model->modificarUsuario($usuario, $nombre, $idsuario);
                if ($data =="modificado"){
                    $msg= "modificado";
                }else{
                    $msg= "Error al modificar el usuario";
                }
            }
            
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA actualizar
    public function editar(int $idsuario)
    {
        $data = $this->model->editarUser($idsuario);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA ELIMINAR
    public function eliminar(int $idsuario)
    {
        $data= $this->model->accionUser(0, $idsuario);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al eliminar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //FUNCION PARA REINGRESAR
    public function reingresar(int $idsuario)
    {
        $data= $this->model->accionUser(1, $idsuario);
        if ($data ==1){
            $msg= "ok";
        }else{
            $msg= "Error al reingresar el usuario";
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 

    //FUNCION PARA CERRAR SESION
    public function salir()
    {
        session_destroy();
        header("location: ".base_url);
    }
}
?>
