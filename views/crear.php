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
<a href="index.php">Volver</a>