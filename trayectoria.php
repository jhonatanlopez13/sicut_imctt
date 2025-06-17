<?php
require_once 'utilities/db.php';
require_once 'utilities/tools.php';
regenerar_cookie();

// Check session and permissions
if (!isset($_SESSION['idUsuario']) || !isset($_SESSION['idPersona'])) {
    echo '<script>
        alert("Sesion no iniciada");
        window.location.href = "index.php";
    </script>';
    exit();
}

$connectionMysql = new Connection();
$connection = $connectionMysql->getConnection();
$mysqlQuery = new MySqlQuery($connection);

// Verify user type
$query = "SELECT id_tipo_usuario FROM usuarios WHERE id = :id";
$usuario = $mysqlQuery->get($query, array(':id' => $_SESSION['idUsuario']));

if ($usuario[0]['id_tipo_usuario'] != 1) {
    echo '<script>
        alert("No cuenta con los permisos necesarios");
        window.location.href = "index.php";
    </script>';
    exit();
}

// Get trajectory details
$query = "
    SELECT 
        t.id AS id,
        CONCAT(p.nombres, ' ', p.apellidos) AS nombres,
        ssc.nombre AS subsector,
        p.email,
        p.telefono,
        t.actividades_formacion AS actividades_formacion,
        t.actividades_creacion_produccion AS actividades_creacion,
        t.actividades_investigacion AS actividades_investigacion,
        t.actividades_promosion AS actividades_promocion,
        t.actividades_emprendiimiento AS actividades_emprendimiento,
        t.anios_experiencia AS anios_experiencia,
        t.archivo AS archivo
    FROM trayectoria t
    INNER JOIN usuarios u ON t.id_usuario = u.id 
    INNER JOIN personas p ON u.id_persona = p.id
    INNER JOIN sub_sector_cultural ssc ON t.id_sub_sector_cultural = ssc.id 
    WHERE t.id = :id
";
$trayectorias = $mysqlQuery->get($query, array(':id' => $_GET['id']));

// Handle approval
if (isset($_POST['btnAprobarTrayectoria'])) {
    $query = 'UPDATE trayectoria SET trayectoria_aprobada = 1 WHERE id = ?';
    $estadoQuery = $mysqlQuery->excecuteQuery($query, array($_GET['id']));
    
    if ($estadoQuery == 1) {
        $correo = $trayectorias[0]['email'];
        $subject = 'Trayectoria de SICUT Aprobada';
        $body = 'Su trayectoria en SICUT ha sido aprobada, puede descargar su certificado desde la plataforma';
        sendMail($correo, $subject, $body);
        
        echo '<script>
            alert("Se ha aprobado la trayectoria");
            window.location.href = "admin.php";
        </script>';
    } else {
        echo '<script>
            alert("Error al aprobar la trayectoria, comuniquese con el administrador del sistema");
            window.location.href = "admin.php";
        </script>';
    }
}

// Handle rejection
if (isset($_POST['btnRechazarTrayectoria'])) {
    $txtMotivoRechazo = $_POST['txtMotivoRechazo'];
    $query = 'UPDATE trayectoria SET trayectoria_aprobada = 2 WHERE id = ?';
    $estadoQuery = $mysqlQuery->excecuteQuery($query, array($_GET['id']));
    
    if ($estadoQuery == 1) {
        $correo = $trayectorias[0]['email'];
        $subject = 'Trayectoria de SICUT Rechazada';
        $body = 'Su trayectoria en SICUT ha sido rechazada: '.$txtMotivoRechazo;
        sendMail($correo, $subject, $body);
        
        echo '<script>
            alert("Se ha rechazado la trayectoria");
            window.location.href = "admin.php";
        </script>';
    } else {
        echo '<script>
            alert("Error al Rechazar la trayectoria, comuniquese con el administrador del sistema");
            window.location.href = "admin.php";
        </script>';
    }
}

$connectionMysql->closeConnection();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('head.php') ?>
    <title>Detalle de Trayectoria</title>
    <!-- PDF.js para visualización de PDF en el modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <style>
        #pdf-viewer {
            width: 100%;
            height: 500px;
            border: 1px solid #ddd;
        }
        .pdf-container {
            position: relative;
        }
        .pdf-nav {
            position: absolute;
            top: 10px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 100;
        }
        .modal-xl {
            max-width: 90%;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Detalle de Trayectoria</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nombres</th>
                                        <th>Sub Sector</th>
                                        <th>Actividades de Formación</th>
                                        <th>Actividades de Creación</th>
                                        <th>Actividades de Investigación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= htmlspecialchars($trayectorias[0]['nombres']) ?></td>
                                        <td><?= htmlspecialchars($trayectorias[0]['subsector']) ?></td>
                                        <td><?= htmlspecialchars($trayectorias[0]['actividades_formacion']) ?></td>
                                        <td><?= htmlspecialchars($trayectorias[0]['actividades_creacion']) ?></td>
                                        <td><?= htmlspecialchars($trayectorias[0]['actividades_investigacion']) ?></td>
                                    </tr>
                                </tbody>
                                
                                <thead class="table-light">
                                    <tr>
                                        <th>Actividades de Promoción</th>
                                        <th>Actividades de Emprendimiento</th>
                                        <th>Años de Experiencia</th>
                                        <th>Teléfono</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= htmlspecialchars($trayectorias[0]['actividades_promocion']) ?></td>
                                        <td><?= htmlspecialchars($trayectorias[0]['actividades_emprendimiento']) ?></td>
                                        <td><?= htmlspecialchars($trayectorias[0]['anios_experiencia']) ?></td>
                                        <td><?= htmlspecialchars($trayectorias[0]['telefono']) ?></td>
                                        <td><?= htmlspecialchars($trayectorias[0]['email']) ?></td>
                                    </tr>
                                </tbody>
                                
                                <thead class="table-light">
                                    <tr>
                                        <th>Soportes</th>
                                        <th>Aprobar</th>
                                        <th>Mensaje de rechazo</th>
                                        <th>Rechazar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php if ($trayectorias[0]['archivo'] != 'no hay archivo adjunto'): ?>
                                                <?php if (pathinfo($trayectorias[0]['archivo'], PATHINFO_EXTENSION) === 'pdf'): ?>
                                                    <!-- Botón para abrir modal de PDF -->
                                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#pdfModal" 
                                                            onclick="loadPdf('<?= htmlspecialchars($trayectorias[0]['archivo']) ?>')">
                                                        <i class="fas fa-file-pdf"></i> Ver PDF
                                                    </button>
                                                <?php else: ?>
                                                    <!-- Para otros tipos de archivo, mantener el enlace original -->
                                                    <a href="<?= htmlspecialchars($trayectorias[0]['archivo']) ?>" target="_blank" class="btn btn-outline-primary">
                                                        <i class="fas fa-eye"></i> Ver Soportes
                                                    </a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                No hay archivo adjunto
                                            <?php endif; ?>
                                        </td>
                                        
                                        <td>
                                            <form action="" method="POST" class="mb-0">
                                                <button type="submit" class="btn btn-success" name="btnAprobarTrayectoria">
                                                    <i class="fas fa-check"></i> Aprobar
                                                </button>
                                            </form>
                                        </td>
                                        
                                        <td>
                                            <form action="" method="POST" class="mb-0">
                                                <input type="text" class="form-control" name="txtMotivoRechazo" required>
                                        </td>
                                        
                                        <td>
                                                <button type="submit" class="btn btn-danger" name="btnRechazarTrayectoria">
                                                    <i class="fas fa-times"></i> Rechazar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para visualizar PDF -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Visualizador de PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pdf-container">
                        <div class="pdf-nav">
                            <button class="btn btn-sm btn-primary" id="prev-page">Anterior</button>
                            <span id="page-num">Página 1 de 1</span>
                            <button class="btn btn-sm btn-primary" id="next-page">Siguiente</button>
                        </div>
                        <canvas id="pdf-viewer"></canvas>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a href="<?= isset($trayectorias[0]['archivo']) ? htmlspecialchars($trayectorias[0]['archivo']) : '#' ?>" download class="btn btn-primary">
                        <i class="fas fa-download"></i> Descargar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <script>
        // Configuración de PDF.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
        
        let pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 1.5;
        
        function loadPdf(url) {
            // Resetear el visor
            const canvas = document.getElementById('pdf-viewer');
            const context = canvas.getContext('2d');
            context.clearRect(0, 0, canvas.width, canvas.height);
            
            // Cargar el nuevo PDF
            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page-num').textContent = `Página 1 de ${pdfDoc.numPages}`;
                
                // Renderizar la primera página
                renderPage(1);
            }).catch(function(error) {
                console.error('Error al cargar PDF:', error);
                alert('Error al cargar el documento PDF');
            });
        }
        
        function renderPage(num) {
            pageRendering = true;
            
            pdfDoc.getPage(num).then(function(page) {
                const viewport = page.getViewport({ scale: scale });
                const canvas = document.getElementById('pdf-viewer');
                const context = canvas.getContext('2d');
                
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                
                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                
                const renderTask = page.render(renderContext);
                
                renderTask.promise.then(function() {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });
            
            document.getElementById('page-num').textContent = `Página ${num} de ${pdfDoc.numPages}`;
            pageNum = num;
        }
        
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }
        
        // Eventos para navegación
        document.getElementById('prev-page').addEventListener('click', function() {
            if (pageNum <= 1) return;
            pageNum--;
            queueRenderPage(pageNum);
        });
        
        document.getElementById('next-page').addEventListener('click', function() {
            if (pageNum >= pdfDoc.numPages) return;
            pageNum++;
            queueRenderPage(pageNum);
        });
        
        // Limpiar al cerrar el modal
        document.getElementById('pdfModal').addEventListener('hidden.bs.modal', function() {
            const canvas = document.getElementById('pdf-viewer');
            const context = canvas.getContext('2d');
            context.clearRect(0, 0, canvas.width, canvas.height);
            pdfDoc = null;
            pageNum = 1;
        });
    </script>
</body>
</html>