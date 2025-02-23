<?php
$conexion = new mysqli('sql212.infinityfree.com', 'if0_38381608', '9LQpqf5yDEMWfQ', 'if0_38381608_escuela');
if($conexion->connect_error){	
    die('Error en la conexion' . $mysqli->connect_error);
}

$sql = "SELECT id_actividad, titulo, descripcion, fecha_entrega, archivo FROM trabajos";
$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['id_actividad']}</td>
            <td>{$fila['titulo']}</td>
            <td>{$fila['descripcion']}</td>
            <td>{$fila['fecha_entrega']}</td>
            <td><a href='uploads/{$fila['archivo']}' target='_blank'>Ver Archivo</a></td>
          </tr>";
}

$conexion->close();
?>
