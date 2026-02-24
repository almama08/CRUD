<?php
class GestorVideojuego{
    protected $gameStop;

    public function __construct(){
        $this->gameStop=[];
    }

    public function anyadir($videojuego){
        $this->gameStop[]=$videojuego;
    }

    public function listar(){
        return $this->gameStop;
    }

    public function buscar($id){
        foreach ($this->gameStop as $videojuego){
            if($videojuego->getId()==$id){
                return $videojuego;
            }
        }
    }

    public function actualizarTerror($id,$titulo,$tipoTerror){
        foreach ($this->gameStop as $i=>$videojuego){
            if($videojuego->getId()==$id){
                $this->gameStop[$i]->setTitulo($titulo);
                $this->gameStop[$i]->setTipoTerror($tipoTerror);
            }
        }
    }

    public function actualizarAccion($id,$titulo,$tipoArmas){
        foreach ($this->gameStop as $i=>$videojuego){
            if($videojuego->getId()==$id){
                $this->gameStop[$i]->setTitulo($titulo);
                $this->gameStop[$i]->setTipoArmas($tipoArmas);
            }
        }
    }

    public function eliminar($id){
        foreach($this->gameStop as $i=>$videojuego){
            if($videojuego->getId()==$id){
                unset($this->gameStop[$i]);
                $this->gameStop=array_values($this->gameStop);
            }
        }
    }
}
?>