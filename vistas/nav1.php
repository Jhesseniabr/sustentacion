
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/nav11.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand text-white" href="#">
            <img src="../recursos/logo4.png" alt="Presusis SAC Logo" class="logo">
           PERUSIS S.A.C
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../vistas/dashboard.php">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../vistas/perfil.php">
                        <i class="fas fa-user"></i>
                        Perfil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../vistas/crearcuenta.php">
                        <i class="fas fa-user"></i>
                        Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../vistas/contar.php">
                        <i class="fas fa-briefcase"></i>
                        Trabajos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../vistas/configuracion.php">
                        <i class="fas fa-cog"></i>
                        Configuración
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../logica/logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        Cerrar Sesión
                    </a>
                </li>
            </ul>
        </div>
    </nav>

<style>
    .navbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 3px;
        background-color: #f8f9fa;
        /* Cambia el color de fondo si es necesario */
        background-image: linear-gradient(90deg, rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40), rgb(235, 40, 40));
    }

    .logo-container {
        display: flex;
        align-items: center;
    }

    
.logo {
    width: 70px;
    height: 50px;
    border-radius: 0%;
    margin-bottom: 10px;
}

    .logo-text-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-weight: bold; /* Texto en negrita */
        margin-right: 15px; /* Espacio entre los elementos del menú */
        font-family: 'Arial', sans-serif; /* Cambio de tipo de letra */
    }

    .logo-text {
        font-size: 13px;
        /* Ajusta el tamaño de la fuente según sea necesario */
        text-align: center;
        text-color: white;
    }

    .user-info {
        display: flex;
        align-items: center;
        font-size: 14px;
        /* Ajusta el tamaño de la fuente según sea necesario */
    }
    .nav-link {
        font-weight: bold; /* Texto en negrita */
        margin-right: 15px; /* Espacio entre los elementos del menú */
        font-family: 'Arial', sans-serif; /* Cambio de tipo de letra */
    }
    .navbar-brand  {
        font-weight: bold; /* Texto en negrita */
        margin-right: 15px; /* Espacio entre los elementos del menú */
        font-family: 'Arial', sans-serif; /* Cambio de tipo de letra */
        }
</style>
</body>
</html>