<?php

class UsuariosModel extends Query{

    private $usuario, $nombre, $password, $idsuario, $estatus;

    public function __construct()
    { 
        parent::__construct();
    }
    public function getUsuario( string $usuario, string $password)
    {
        $sql = "SELECT * FROM usuario WHERE usuario= '$usuario' AND contraseña='$password'";
        $data = $this->select($sql);
        return $data;
    }

    public function getUsuarios()
    {
        $sql = "SELECT * FROM usuario  ";
        $data = $this->selectAll($sql);
        return $data;
    }

    //METODO RESGITRAR 
    public function registrarUsuario(string $usuario, string $nombre, string $password)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $verificar = "SELECT * FROM usuario WHERE usuario ='$this->usuario'";
        $existe = $this->select($verificar);
        if (empty($existe)){
            $sql = "INSERT INTO usuario(usuario, nombre, contraseña) VALUES(?,?,?)";
            $datos = array($this->usuario, $this->nombre, $this->password);
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
    public function modificarUsuario(string $usuario, string $nombre, int $idsuario)
    {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->idsuario = $idsuario;
        $sql = "UPDATE usuario SET usuario=?, nombre=? WHERE idsuario=? ";
        $datos = array($this->usuario, $this->nombre, $this->idsuario);
        $data = $this->save($sql, $datos);
        if ($data ==1){
            $res = "modificado";
        }else{
            $res = "error";
        }
        return $res;
    }

    //consulta
    public function editarUser(int $idsuario)
    {
        $sql = "SELECT * FROM usuario WHERE idsuario = $idsuario";
        $data= $this->select($sql);
        return $data;
    }

    public function accionUser(int $estatus, int $idsuario)
    {
        $this->idsuario = $idsuario;
        $this->estatus= $estatus;
        $sql= "UPDATE usuario SET estatus = ? WHERE idsuario=?";
        $datos= array($this->estatus, $this->idsuario);
        $data= $this->save($sql, $datos);
        return $data;
    }

    

}
?>
