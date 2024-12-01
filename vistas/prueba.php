<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusis - Soporte Técnico</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #333333;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        header {
            background-color: #ff0000;
            color: #ffffff;
            text-align: center;
            padding: 10px;
        }
        nav {
            background-color: #ff0000;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
        }
        nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 10px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            color: #ff0000;
        }
        .consultas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .consulta {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .consulta img {
            max-width: 80px;
            max-height: 80px;
            margin-bottom: 10px;
        }
        button {
            background-color: #ff0000;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        footer {
            background-color: #ff0000;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .contact-info {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <img src="ruta_al_logo.png" alt="Logo de Perusis">
        <h1>SOPORTE TÉCNICO</h1>
        <p>Bienvenido al Área de Soporte Técnico de Perusis. Nuestro objetivo es mejorar la gestión y el seguimiento de los servicios técnicos, optimizando la comunicación y la satisfacción.</p>
    </header>
    
    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#consultas">Consultas</a>
        <a href="#servicios">Servicios</a>
        <a href="#conocenos">Conócenos</a>
        <a href="#ubicacion">Ubicación</a>
    </nav>

    <div class="container">
        <section id="inicio" class="section">
            <h2>Inicio</h2>
            <p>Bienvenido al Área de Soporte Técnico de Perusis. Nuestro objetivo es mejorar la gestión y el seguimiento de los servicios técnicos, optimizando la comunicación y la satisfacción.</p>
        </section>

        <section id="consultas" class="section">
            <h2>Consultas</h2>
            <div class="consultas-grid">
                <div class="consulta">
                    <img src="icono_intranet.png" alt="Icono Intranet">
                    <p>De ser un personal de la empresa ingrese a la opción 'Intranet' con su contraseña previamente asignada.</p>
                    <button onclick="alert('Mostrar formulario de Intranet')">Intranet</button>
                </div>
                <div class="consulta">
                    <img src="icono_cliente.png" alt="Icono Cliente">
                    <p>Si usted es cliente y desea consultar el estado en el que se encuentra su servicio ingrese a la opción 'cliente'.</p>
                    <button onclick="alert('Mostrar formulario de Cliente')">Cliente</button>
                </div>
            </div>
        </section>

        <section id="servicios" class="section">
            <h2>Servicios</h2>
            <p>NUESTROS SERVICIOS<br>
            Ofrecemos una amplia gama de servicios informáticos diseñados para satisfacer las necesidades de nuestros clientes. Desde formateo de computadoras hasta instalación de programas y mantenimiento de hardware, nos comprometemos a proporcionar soluciones confiables y efectivas.</p>
            <ul>
                <li>Formateo de computadora</li>
                <li>Mantenimiento Correctivo</li>
                <li>Actualización de Antivirus</li>
                <li>Instalación de Software de Ingeniería</li>
                <li>Mantenimiento interno de computadora</li>
                <li>Instalación STANDAR</li>
            </ul>
        </section>

        <section id="conocenos" class="section">
            <h2>Conócenos</h2>
            <p>Sobre Nosotros:</p>
            <ul>
                <li>Inicio</li>
                <li>Consultas</li>
                <li>Servicios</li>
                <li>Ubicación</li>
            </ul>
            <p>Atención al Cliente:</p>
            <ul>
                <li>Jr. Moquegua N° 180, Puno</li>
                <li>Lunes-Sábado, 8:30 am - 7:30 pm</li>
                <li>Grupo Perusis</li>
            </ul>
        </section>

        <section id="ubicacion" class="section">
            <h2>Ubicación</h2>
            <p>Si deseas contactarnos para obtener más información sobre nuestros servicios o para hacer una consulta específica, aquí tienes nuestras opciones de contacto:</p>
            <div id="mapa">
                <!-- Aquí va el mapa (puedes incrustar un mapa de Google Maps u otro proveedor) -->
            </div>
            <div class="contact-info">
                <p>21000, Puno, Peru, 21000</p>
                <p>(051) 775403</p>
                <p>gerencia@perusis.com</p>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Perusis - Soporte Técnico</p>
    </footer>
</body>
</html>
