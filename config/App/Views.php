<?php
class Views{

    public function getView($controlador, $vista)
    {
        $controlador = get_class($controlador);
        if ($controlador == "Home") {
            $vista = "src/".$vista.".php";
        }else{
            $vista = "src/".$controlador."/".$vista.".php";
        }
        require $vista;
    }
}


?>