<?php

class VideojuegoController{

    private $gestor;

    public function __construct($gestor){
        $this->gestor=$gestor;
    }

    public function index(){
        //cálculos para el paginador de Acción
        $accion=$this->gestor->listarAccion();
        $totalAccion=count($accion);
        $accionPorPagina=3;
        $totalPaginasAccion=ceil($totalAccion/$accionPorPagina);
        $paginaActualAccion=$_GET['pActualAccion'] ?? 1;
        $accionAcortados=array_slice($accion,($paginaActualAccion-1)*$accionPorPagina,$accionPorPagina);
        //cálculos para el paginador de Terror
        $terror=$this->gestor->listarTerror();
        $totalTerror=count($terror);
        $terrorPorPagina=3;
        $totalPaginasTerror=ceil($totalTerror/$terrorPorPagina);
        $paginaActualTerror=$_GET['pActualTerror'] ?? 1;
        $terrorAcortados=array_slice($terror,($paginaActualTerror-1)*$terrorPorPagina,$terrorPorPagina);
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