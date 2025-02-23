<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Trabajos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    <div class="container mt-5 flex-grow-1">
        <h2 class="mb-4 text-center">Lista de Trabajos</h2>
        <div class="text-end mb-3">
            <button class="btn btn-success" onclick="window.location.href='../nuevo_trabajo/alta_trabajo.php'">Añadir Trabajo</button>
        </div>
        
        <!-- Hacer la tabla responsiva utilizando clases de Bootstrap y aplicando estilos personalizados -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de Entrega</th>
                        <th>Archivo</th>
                    </tr>
                </thead>
                <tbody id="tabla-trabajos">
                    <!-- Aquí se cargarán los registros con AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer estilizado y responsivo -->
   

    <script>
        function cargarTrabajos() {
            $.ajax({
                url: 'epi/cargar_trabajos.php',
                type: 'GET',
                success: function(data) {
                    $('#tabla-trabajos').html(data);
                }
            });
        }
        
        $(document).ready(function() {
            cargarTrabajos();
        });
    </script>
</body>
</html>
