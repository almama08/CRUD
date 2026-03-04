<?php
require_once "autoload.php";
session_start();

//1: Creamos la implementación concreta que queremos usar
$gameStop=new GestorVideojuego();
//2: Se la pasamos al controlador
$controller=new VideojuegoController($gameStop);

$accion=$_GET['accion'] ?? "index";

switch($accion){
    case "crear":
        $controller->crear();
        break;
    case "editarAccion":
        $controller->editarAccion();
        break;
    case "editarTerror":
        $controller->editarTerror();
        break;
    case "eliminar":
        $controller->eliminar();
        break;
    default:
        $controller->index();
}
?>