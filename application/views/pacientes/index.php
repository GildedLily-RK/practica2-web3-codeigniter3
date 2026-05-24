<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Clínica - Pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <h2>Lista de Pacientes</h2>
    <a href="<?= site_url('pacientes/crear') ?>" class="btn btn-primary">+ Nuevo Paciente</a>
    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Diagnóstico</th>
                <th>Fecha de Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $p): ?>
                <tr>
                    <td><?= $p['id']; ?></td>
                    <td><?= $p['nombre_completo']; ?></td>
                    <td><?= $p['diagnostico']; ?></td>
                    <td><?= $p['fecha_ingreso']; ?></td>
                    <td>
                        <a href="<?= site_url('pacientes/editar/' . $p['id']) ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= site_url('pacientes/eliminar/' . $p['id']) ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este paciente?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>