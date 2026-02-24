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

    public function listar(){
        return $_SESSION['videojuegos'];
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