<?php
require_once 'utilities/db.php';
require_once 'utilities/tools.php';
regenerar_cookie();

// Check if user is logged in
if (!isset($_SESSION['idUsuario']) || !isset($_SESSION['idPersona'])) {
    echo '<script>
        alert("Sesion no iniciada");
        window.location.href = "index.php";
    </script>';
    exit();
}

// Check user permissions
$connectionMysql = new Connection();
$connection = $connectionMysql->getConnection();
$mysqlQuery = new MySqlQuery($connection);

$query = "SELECT id_tipo_usuario FROM usuarios WHERE id = :id";
$usuario = $mysqlQuery->get($query, array(':id' => $_SESSION['idUsuario']));

if ($usuario[0]['id_tipo_usuario'] != 1) {
    echo '<script>
        alert("No cuenta con los permisos necesarios");
        window.location.href = "index.php";
    </script>';
    exit();
}

// Get pending trajectories
$query = "
    SELECT 
        t.id AS id,
        CONCAT(p.nombres, ' ', p.apellidos) AS nombres,
        ssc.nombre AS subsector,
        t.actividades_formacion AS actividades_formacion,
        t.actividades_creacion_produccion AS actividades_creacion,
        t.actividades_investigacion AS actividades_investigacion,
        t.actividades_promosion AS actividades_promosion,
        t.actividades_emprendiimiento AS actividades_emprendimiento,
        t.anios_experiencia AS anios_experiencia
    FROM trayectoria t
    INNER JOIN usuarios u ON t.id_usuario = u.id 
    INNER JOIN personas p ON u.id_persona = p.id
    INNER JOIN sub_sector_cultural ssc ON t.id_sub_sector_cultural = ssc.id 
    WHERE trayectoria_aprobada IS NULL;
";
$trayectorias = $mysqlQuery->get($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('head.php') ?>
    <title>Trayectorias por Aprobar</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Trayectorias por Aprobar</h2>
                </div>
                
                <?php if (empty($trayectorias)): ?>
                    <div class="alert alert-info">
                        No hay trayectorias pendientes de aprobación.
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Sub Sector</th>
                                    <th scope="col">Años de Experiencia</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($trayectorias as $trayectoria): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($trayectoria['nombres']) ?></td>
                                        <td><?= htmlspecialchars($trayectoria['subsector']) ?></td>
                                        <td><?= htmlspecialchars($trayectoria['anios_experiencia']) ?></td>
                                        <td>
                                            <a href="trayectoria.php?id=<?= $trayectoria['id'] ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i> Ver Detalles
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>