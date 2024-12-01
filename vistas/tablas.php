<?php include 'nav1.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="../css/t_clientes.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.7.0/css/autoFill.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<style>
        /* Estilos para el modal */
        .popup-form {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4); /* Fondo semitransparente */
            padding-top: 60px; /* Alineación del contenido */
        }

        /* Estilos para el contenido del modal */
        .popup-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px; /* Anchura máxima */
            border-radius:5px;
        }

        /* Estilos para el botón de cierre */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
    <div class="table-wrapper">
        <h2 class="mb-4">Clientes</h2>
        <div class="text-left mb-3">
                    <button class="btn btn-outline-secondary submit-btn" type="submit" onclick="openModal()" value="Registrarse">Registrar Servicio</button>
                </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="min">Fecha mínima:</label>
                <input type="text" id="min" class="form-control" placeholder="dd/mm/yyyy">
            </div>
            <div class="col-md-3">
                <label for="max">Fecha máxima:</label>
                <input type="text" id="max" class="form-control" placeholder="dd/mm/yyyy">
            </div>
            <div class="col-md-3">
                <label for="status">Estado:</label>
                <select id="status" class="form-control">
                    <option value="">Todos</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="proceso">En proceso</option>
                    <option value="finalizado">Finalizado</option>
                </select>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>N° DE REGISTRO</th>
                        <th>FECHA_EMISION</th>
                        <th>FECHA_VENCIMIENTO</th>
                        <th>DNI</th>
                        <th>CLIENTE</th>
                        <th>TELEFONO</th>
                        <th>MARCA</th>
                        <th>TIPO</th>
                        <th>SERVICIO</th>
                        <th>DESCRIPCION</th>
                        <th>ESTADO</th>
                        <th>ACCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../logica/conexion.php");
                    $con=conectar();
                    $query = "SELECT * FROM clientes";
                    $resultado = mysqli_query($con, $query);    
                    while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['numero_registro'] ?></td>
                        <td><?php echo $row['fecha_emision'] ?></td>
                        <td><?php echo $row['fecha_vencimiento'] ?></td>
                        <td><?php echo $row['dni'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['telefono'] ?></td>
                        <td><?php echo $row['marca'] ?></td>
                        <td><?php echo $row['tipo'] ?></td>
                        <td><?php echo $row['servicio'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['estado'] ?></td>
                        <td><?php echo $row['h_salida'] ?></td>
                      
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div id="formTurno" class="popup-form">
        <div class="popup-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="text-center m-b-3">
            <h2 class="mb-5">REGISTRO DE CLIENTE Y SERVICIO</h2>
            </div>
            <form action="../logica/clientes.php" method="POST">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>EMPRESA <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="nombre_empresa"value="<?php echo('PERUSIS'); ?>" name="nombre_empresa" placeholder="Nombre de la Empresa"readonly>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>N° REGISTRO <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="numero_registro" name="numero_registro" placeholder="Número de Registro/Orden" readonly>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>FECHA EMISION <span class="text-danger">*</span></label>
                            <input class="form-control" type="date" id="fecha_emision" name="fecha_emision" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>FECHA ENTREGA <span class="text-danger">*</span></label>
                            <input class="form-control" type="date" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de Vencimiento" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>DNI <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="dni" name="dni" placeholder="DNI" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>NOMBRE <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>TELEFONO <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Telefono" required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Marca <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="marca" name="marca" placeholder="Marca" required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Tipo <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="tipo" name="tipo" placeholder="Tipo" required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Servicio <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="servicio" name="servicio" placeholder="Servicio" required>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Descripcion <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center m-b-3">
                            <button class="btn btn-outline-secondary submit-btn" type="submit">Registrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>  
 <!--   <script>
     function openModal() {
    document.getElementById("formTurno").style.display = "block";
}

// Función para cerrar el modal
function closeModal() {
    document.getElementById("formTurno").style.display = "none";
}   
    </script>-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/autofill/2.7.0/js/dataTables.autoFill.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Custom Script -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/tablas.js"></script>
</body>
</html>