<?php
require_once "autoload.php";
session_start();

$gameStop = new GestorVideojuego();
$videojuegos = $gameStop->listar();

$accion=$_GET['accion'] ?? null;

//Operaciones del CRUD
if($accion=='crear'){
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
    $gameStop->anyadir($videojuego);

    header("Location: index.php");
    exit();
}

if($accion=="editarAccion"){
    $gameStop->actualizarAccion($_POST['id'],$_POST['tituloAccion'],$_POST['tipoArmas']);
    header("Location: index.php");
    exit();
}

if($accion=="editarTerror"){
    $gameStop->actualizarTerror($_POST['id'],$_POST['tituloTerror'],$_POST['tipoTerror']);
    header("Location: index.php");
    exit();
}

if($accion=="eliminar"){
    $gameStop->eliminar($_GET['id']);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP con POO y Arrays</title>
</head>
<body>

<h1>Gestión de videojuegos</h1>
<hr>
<!--FORMULARIO CREAR-->
<h2>Crear Videojuego</h2>

<form method="POST" action="index.php?accion=crear">
    ID:
    <input type="number" name="id" required><br>

    <strong>Videojuego de acción:</strong><br>
    Título:
    <input type="text" name="tituloAccion">

    Tipo de armas:
    <input type="text" name="tipoArmas"><br>

    <strong>Videojuego de terror:</strong><br>
    Título:
    <input type="text" name="tituloTerror">

    Tipo de terror:
    <input type="text" name="tipoTerror"><br>

    <button type="submit">Agregar</button>
</form>

<h3>Acción</h3>
<!--Listado de acción-->
 <table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Tipo de armas</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($videojuegos as $v):?>
        <?php if(get_class($v)=="Accion"): ?>
        <tr>
            <td><?php echo $v->getId();?></td>
            <td><?php echo $v->getTituloAccion();?></td>
            <td><?php echo $v->getTipoArmas();?></td>
            <td>
                <!--Botón editar-->
                <form method="POST" action="index.php?accion=editarAccion" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $v->getId(); ?>">
                    Título: <input type="text" name="tituloAccion" value="<?php echo $v->getTituloAccion(); ?>" required>
                    Tipo de armas: <input type="text" name="tipoArmas" value="<?php echo $v->getTipoArmas(); ?>" required> 
                    <button type="submit">Guardar</button>
                    <!--botón eliminar-->
                </form>
                <a href="index.php?accion=eliminar&id=<?php echo $v->getId() ?>">Eliminar</a>
            </td>
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
 </table>

 <h3>Terror</h3>
<!--Listado de terror-->
 <table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Tipo de Terror</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($videojuegos as $v):?>
        <?php if(get_class($v)=="Terror"): ?>
        <tr>
            <td><?php echo $v->getId();?></td>
            <td><?php echo $v->getTituloTerror();?></td>
            <td><?php echo $v->getTipoTerror();?></td>
            <td>
                <!--Botón editar-->
                <form method="POST" action="index.php?accion=editarTerror" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $v->getId(); ?>">
                    Título: <input type="text" name="tituloTerror" value="<?php echo $v->getTituloTerror(); ?>" required>
                    Tipo de terror: <input type="text" name="tipoTerror" value="<?php echo $v->getTipoTerror(); ?>" required> 
                    <button type="submit">Guardar</button>
                    <!--botón eliminar-->
                </form>
                <a href="index.php?accion=eliminar&id=<?php echo $v->getId() ?>">Eliminar</a>
            </td>
        </tr>
        <?php endif; ?>
    <?php endforeach; ?>
 </table>