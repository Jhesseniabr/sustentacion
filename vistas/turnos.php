<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/turnos.css">

  <title>Agregar Turno</title>
</head>
<body>
  <div class="container">
    <div class="form">
      <h2>Agregar Turno</h2>
      <label for="hora_inicio">Hora de inicio:</label>
      <input type="time" id="hora_inicio" name="hora_inicio">
   b 
      <label for="hora_salida">Hora de salida:</label>
      <input type="time" id="hora_salida" name="hora_salida">

      <label for="estado_turno">Estado del turno:</label>
      <input type="radio" id="activo" name="estado_turno" value="activo" checked>
      <label for="activo">Activo</label>
      <input type="radio" id="inactivo" name="estado_turno" value="inactivo">
      <label for="inactivo">Inactivo</label>

      <button type="submit">AGREGAR TURNO</button>
    </div>
  </div>
</body>
</html>