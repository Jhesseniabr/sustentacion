<?php include 'nav1.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registrocliente.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <title>Registro de Cliente</title>
</head>
<body>
    <div class="container">
        <div class="contenedorcentrado">
            <div class="header">
                <form action="../logica/clientes.php" method="POST">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>EMPRESA <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de la Empresa" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>N° REGISTRO <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="numero_registro" name="numero_registro" placeholder="Número de Registro/Orden" disabled>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>FECHA EMISION <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="fecha_emision" name="fecha_emision" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>FECHA ENTREGA <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de Vencimiento" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>DNI <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="dni" name="dni" placeholder="DNI" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>NOMBRE <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>TELEFONO <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Telefono" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Marca <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="marca" name="marca" placeholder="Marca" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tipo <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="tipo" name="tipo" placeholder="Tipo" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Servicio <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="servicio" name="servicio" placeholder="Servicio" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Descripcion <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" required></textarea>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-danger submit-btn" type="submit">Registrar</button>
                        </div>
                    </div>
                </form>
                <div class="popup-form" id="formCliente">
                    <h2>Registrar Cliente</h2>
                    <form onsubmit="guardarDatosCliente(event)">
                        <input type="text" id="dni_cliente" placeholder="DNI" required>
                        <input type="text" id="nombre_cliente" placeholder="Nombre" required>
                        <input type="text" id="telefono_cliente" placeholder="Teléfono" required>
                        <button type="submit">Registrar Cliente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function mostrarFormularioCliente() {
            $('.popup-form').fadeIn();
        }

        function guardarDatosCliente(event) {
            event.preventDefault(); // Evita que el formulario se envíe

            // Captura de los valores ingresados en el formulario emergente
            var dniCliente = document.getElementById('dni_cliente').value;
            var nombreCliente = document.getElementById('nombre_cliente').value;
            var telefonoCliente = document.getElementById('telefono_cliente').value;

            // Colocar los valores capturados en los campos correspondientes del formulario principal
            document.getElementById('dni').value = dniCliente;
            document.getElementById('nombre').value = nombreCliente;
            document.getElementById('telefono').value = telefonoCliente;

            // Ocultar la ventana emergente
            $('.popup-form').fadeOut();
        }
    </script>
</body>
</html>
