<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Trabajo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center text-white">Añadir Nuevo Trabajo</h2>
        <form id="formTrabajo" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control custom-input" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control custom-input" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
           
            <div class="mb-3">
                <label for="archivo" class="form-label">Subir Archivo</label>
                <input type="file" class="form-control custom-input" id="archivo" name="archivo" required>
            </div>
            <button type="submit" class="btn btn-primary custom-btn">Guardar Trabajo</button>
            <a href="index.php" class="btn btn-secondary custom-btn">Cancelar</a>
            <button class="btn btn-success" onclick="window.location.href='../index.php'">Regresar</button>
            <div class="text-end mb-3">
            
        </div>
        </form>
        <div id="mensaje" class="mt-3"></div>
    </div>

    <script>
        $(document).ready(function() {
            // Enviar formulario con AJAX
            $('#formTrabajo').on('submit', function(e) {
                e.preventDefault(); // Prevenir el envío del formulario

                var formData = new FormData(this); // Crear objeto FormData con el formulario

                $.ajax({
                    url: 'guardar_trabajo.php', // Archivo PHP que procesará la solicitud
                    type: 'POST', // Método de solicitud
                    data: formData, // Datos del formulario
                    contentType: false, // Desactivar el tipo de contenido automático
                    processData: false, // Desactivar el procesamiento automático de los datos
                    success: function(response) {
                        // Mostrar el mensaje de éxito o error
                        $('#mensaje').html(response);
                    },
                    error: function() {
                        $('#mensaje').html('<div class="alert alert-danger">Hubo un error al guardar el trabajo. Inténtalo nuevamente.</div>');
                    }
                });
            });
        });
    </script>
</body>
</html>
