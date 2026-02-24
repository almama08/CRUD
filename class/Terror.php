<?php
class Terror extends Videojuego{
    protected $titulo;
    protected $tipoTerror; //survival o psicológico

    public function __construct($id,$titulo,$tipoTerror){
        parent::__construct($id);
        $this->titulo=$titulo;
        $this->tipoTerror=$tipoTerror;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getTipoTerror(){
        return $this->tipoTerror;
    }

    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }

    public function setTipoTerror($tipoTerror){
        $this->tipoTerror=$tipoTerror;
    }
}
?>