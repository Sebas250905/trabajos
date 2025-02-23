<?php
// Establecer la conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'escuela');

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die('Error en la conexión: ' . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si los campos están completos
    if (isset($_POST['titulo'], $_POST['descripcion']) && isset($_FILES['archivo'])) {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        // Obtener la fecha y hora actual del servidor
        $fecha_entrega = date('Y-m-d H:i:s');  // Esto obtendrá la fecha y hora actuales

        // Procesamiento del archivo
        $archivo = $_FILES['archivo'];
        $nombreArchivo = $archivo['name'];
        $rutaArchivo = '../uploads/' . $nombreArchivo;

        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($archivo['tmp_name'], $rutaArchivo)) {
            // Preparar la consulta para insertar los datos en la base de datos
            $query = "INSERT INTO trabajos (titulo, descripcion, fecha_entrega, archivo) 
                      VALUES (?, ?, ?, ?)";

            // Preparar la sentencia
            if ($stmt = $conexion->prepare($query)) {
                // Enlazar los parámetros
                $stmt->bind_param("ssss", $titulo, $descripcion, $fecha_entrega, $rutaArchivo);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">El trabajo ha sido guardado exitosamente.</div>';
                } else {
                    echo '<div class="alert alert-danger">Error al guardar el trabajo en la base de datos.</div>';
                }

                // Cerrar la sentencia
                $stmt->close();
            } else {
                echo '<div class="alert alert-danger">Error al preparar la consulta.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Error al subir el archivo.</div>';
        }
    } else {
        // Responder con error si algún campo está vacío
        echo '<div class="alert alert-danger">Todos los campos son obligatorios.</div>';
    }
} else {
    // Responder con error si no es un POST
    echo '<div class="alert alert-danger">Método de solicitud no válido.</div>';
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
