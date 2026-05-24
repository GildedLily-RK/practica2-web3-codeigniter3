<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Pacientes - Form</title>
</head>
<body>
    <h2><?= isset($paciente) ? 'Editar Paciente' : 'Nuevo Paciente' ?></h2>
    <?php
    $accion = isset($paciente)
        ? site_url('pacientes/actualizar/' . $paciente['id'])
        : site_url('pacientes/guardar');
    ?>

    <?= form_open($accion) ?>
    <div>
        <label for="">Nombre Completo</label>
        <input type="text" name="nombre_completo"
            value="<?= isset($paciente) ? $paciente['nombre_completo']: set_value('nombre_completo') ?>" required> <br>

        <label for="">Diagnóstico</label>
        <input type="text" name="diagnostico"
            value="<?= isset($paciente) ? $paciente['diagnostico']: set_value('diagnostico') ?>" required> <br>

        <label for="">Fecha de Ingreso</label>
        <input type="date" name="fecha_ingreso"
            value="<?= isset($paciente) ? $paciente['fecha_ingreso']: set_value('fecha_ingreso') ?>" required> <br>
        
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    <?= form_close() ?>
</body>
</html>