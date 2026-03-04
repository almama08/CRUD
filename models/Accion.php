<?php
class Accion extends Videojuego{
    protected $titulo;
    protected $tipoArmas; //cuerpo a cuerpo o a distancia

    public function __construct($id,$titulo,$tipoArmas){
        parent::__construct($id);
        $this->titulo=$titulo;
        $this->tipoArmas=$tipoArmas;
    }

    public function getId(){ return $this->id;
    }

    public function getTituloAccion(){
        return $this->titulo;
    }

    public function getTipoArmas(){
        return $this->tipoArmas;
    }

    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }

    public function setTipoArmas($tipoArmas){
        $this->tipoArmas=$tipoArmas;
    }
}
?>