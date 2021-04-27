<?php include "php/cabecera.php"?>

<?php
$conexion=mysqli_connect("localhost","tienda","online","tiendaonline");
mysqli_set_charset($conexion,"utf8");
$peticion="SELECT * FROM productos";
$resultado=mysqli_query($conexion,$peticion);
while($fila=mysqli_fetch_array($resultado)){
    echo "<article>";
    echo "<a href='producto.php?id=".$fila['id']."'><h3>".$fila['nombre']."</h3></a>";
    echo "<p>".$fila["descripcion"]."</p>";
    echo "<p>Precio: ".$fila['precio']." $</p>";
    $peticion2="SELECT * FROM imagenesproductos WHERE idproducto = ". $fila['id']." limit 1";
    $resultado2 = mysqli_query($conexion,$peticion2);
    while($fila2 = mysqli_fetch_array($resultado2)){
        echo "<a href='producto.php?id=".$fila['id']."'><img src='photo/".$fila2['imagen']."' width=100px>";
    }
    echo "<br>";
    echo "<a href='producto.php?id=".$fila['id']."'><button> mas informcion</button></a>";
    echo "<button value='".$fila['id']."' 
    class='botoncompra'> comprar ahora </button>";
    echo "</article>"; 
}
mysqli_close($conexion);
?>

<?php include "php/piedepagina.php"?>
