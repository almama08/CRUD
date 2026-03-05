<?php
class GestorVideojuego{

    public function __construct(){
        if(!isset($_SESSION['videojuegos'])){
            $_SESSION['videojuegos']=[];
        }
    }

    public function anyadir($videojuego){
        $_SESSION['videojuegos'][]=$videojuego;
    }

    public function listarAccion(){
        $accion=[];
        for($i=0;$i<count($_SESSION['videojuegos']);$i++){
            if(get_class($_SESSION['videojuegos'][$i])=="Accion"){
                $accion[]=$_SESSION['videojuegos'][$i];
            }
        }
        return $accion;
    }

    public function listarTerror(){
        $terror=[];
        for($i=0;$i<count($_SESSION['videojuegos']);$i++){
            if(get_class($_SESSION['videojuegos'][$i])=="Terror"){
                $terror[]=$_SESSION['videojuegos'][$i];
            }
        }
        return $terror;
    }

    public function buscar($id){
        foreach ($_SESSION['videojuegos'] as $videojuego){
            if($videojuego->getId()==$id){
                return $videojuego;
            }
        }
    }

    public function actualizarTerror($id, $titulo, $tipoTerror){
        foreach ($_SESSION['videojuegos'] as $i=>$videojuego){
            if(get_class($videojuego) == "Terror" && $videojuego->getId() == $id){
                $_SESSION['videojuegos'][$i]->setTitulo($titulo);
                $_SESSION['videojuegos'][$i]->setTipoTerror($tipoTerror);
            }
        }
    }

    public function actualizarAccion($id, $titulo, $tipoArmas){
        foreach ($_SESSION['videojuegos'] as $i=>$videojuego){
            if(get_class($videojuego) == "Accion" && $videojuego->getId() == $id){
                $_SESSION['videojuegos'][$i]->setTitulo($titulo);
                $_SESSION['videojuegos'][$i]->setTipoArmas($tipoArmas);
            }
        }
    }

    public function eliminar($id){
        foreach($_SESSION['videojuegos'] as $i=>$videojuego){
            if($videojuego->getId()==$id){
                unset($_SESSION['videojuegos'][$i]);
                $_SESSION['videojuegos']=array_values($_SESSION['videojuegos']);
            }
        }
    }
}
?>