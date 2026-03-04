<?php

class VideojuegoController{

    private $gestor;

    public function __construct($gestor){
        $this->gestor=$gestor;
    }

    public function index(){
        $videojuegos=$this->gestor->listar();
        include "views/listar.php";
    }

    public function crear(){
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $id=$_POST['id'];
            if(!empty($_POST['tituloAccion'])){
                $tituloAccion=$_POST['tituloAccion'];
                $tipoArmas=$_POST['tipoArmas'];
                $videojuego=new Accion($id,$tituloAccion,$tipoArmas);
            }else{
                $tituloTerror=$_POST['tituloTerror'];
                $tipoTerror=$_POST['tipoTerror'];
                $videojuego=new Terror($id,$tituloTerror,$tipoTerror);
            }
            $this->gestor->anyadir($videojuego);

            header("Location: index.php");
            exit();
        }
        include "views/crear.php";
    }

    public function editarTerror(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->gestor->actualizarTerror($_POST['id'],$_POST['tituloTerror'],$_POST['tipoTerror']);

            header("Location: index.php");
            exit();
        }
    }

    public function editarAccion(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->gestor->actualizarAccion($_POST['id'],$_POST['tituloAccion'],$_POST['tipoArmas']);

            header("Location: index.php");
            exit();
        }
    }

    public function eliminar(){
        if($_SERVER['REQUEST_METHOD']=='GET'){
            $this->gestor->eliminar($_GET['id']);

            header("Location: index.php");
            exit();
        }
    }
}
?>