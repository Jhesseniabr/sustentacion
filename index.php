<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Perusis</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="../seguimiento/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="../seguimiento/css/styles.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../seguimiento/css/responsive.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../seguimiento/css/pop.css">
    <link rel="stylesheet" href="../seguimiento/css/pop_loginq.css">
    <link rel="stylesheet" href="../seguimiento/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">


</head>

<body>
<style>
    /*--------------------------------------------------------------------- File Name: style.css ---------------------------------------------------------------------*/


    /*--------------------------------------------------------------------- import Fonts ---------------------------------------------------------------------*/

    @import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=latin-ext');
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

    /*****---------------------------------------- 1) font-family: 'Rajdhani', sans-serif;
 2) font-family: 'Poppins', sans-serif;
 ----------------------------------------*****/


    /*--------------------------------------------------------------------- import Files ---------------------------------------------------------------------*/

    @import url(..seguimiento/css/animate.min.css);
    @import url(..seguimiento/css/normalize.css);
    @import url(..seguimiento/css/meanmenu.css);
    @import url(..seguimiento/css/owl.carousel.min.css);
    @import url(..seguimiento/css/slick.css);
    @import url(..seguimiento/css/jquery-ui.css);
    @import url(..seguimiento/css/nice-select.css);

    /*--------------------------------------------------------------------- skeleton ---------------------------------------------------------------------*/

    * {
        box-sizing: border-box !important;
        transition: ease all 0.5s;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        color: #666666;
        font-size: 14px;
        font-family: 'Raleway', sans-serif;
        ;
        line-height: 1.80857;
        font-weight: normal;
        overflow-x: hidden;
    }

    a {
        color: #1f1f1f;
        text-decoration: none !important;
        outline: none !important;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        letter-spacing: 0;
        font-weight: normal;
        position: relative;
        padding: 0 0 10px 0;
        font-weight: normal;
        line-height: normal;
        color: #111111;
        margin: 0
    }

    h1 {
        font-size: 48px
    }

    h2 {
        font-size: 22px
    }

    h3 {
        font-size: 18px
    }

    h4 {
        font-size: 16px
    }

    h5 {
        font-size: 14px
    }

    h6 {
        font-size: 13px
    }

    *,
    *::after,
    *::before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    h1 a,
    h2 a,
    h3 a,
    h4 a,
    h5 a,
    h6 a {
        color: #212121;
        text-decoration: none !important;
        opacity: 1
    }

    button:focus {
        outline: none;
    }

    ul,
    li,
    ol {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    p {
        margin: 20px;
        font-weight: 600;
        font-size: 15px;
        line-height: 24px;
        color: #110f0a;
    }

    a {
        color: #ffffff;
        text-decoration: none;
        outline: none !important;
    }

    .layout_padding {
        padding: 90px 0;
    }

    .center-desk {
        width: 100%;
        float: left;
        padding-bottom: 20px;
    }

    .header_main {
        width: 100%;
        float: left;
        background-image: url(../seguimiento/recursos/banner-2.png);
        height: 650px;
        padding-top: -10px;
        padding-bottom: -10px;
        background-size: cover;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .main-menu ul>li a {
        line-height: 20px;
        font-size: 16px;
        display: block;
        font-weight: 500;
        color: #ffffff;
        padding: 22px 20px;
        text-transform: uppercase;
    }

    nav.main-menu {
        float: right;
        margin-left: 0;
    }

    .main-menu ul {
        margin: 0;
        list-style-type: none;
        margin-bottom: 10px;
    }

    ul,
    li,
    ol {
        margin: 0px;
        padding: 0px;
        list-style: none;
    }

    .main-menu ul li:first-child {
        margin-left: 0;
    }

    .main-menu ul>li {
        position: inherit;
        display: inline-block;
        vertical-align: middle;
    }

    .main-menu ul>li a:hover {
        color: #fff;
    }

    .mean-container .mean-bar {
        background: #2aab7c;
    }

    .web_taital {
        font-size: 24pt;
    }

    .logo {
        width: 100%;
        float: left;
    }

    .web_text {
        width: 100%;
        float: left;
        font-size: 48px;
        padding-top: 160px;
    }

    .margin-top-20 {
        margin-top: 20px;
    }

    .donec_text {
        font-size: 17px;
        color: #110f0a;
        margin-left: 0;
        padding-bottom: 20px;
        z-index: 9;
        position: relative;
    }

    .bannen_inner {
        width: 100%;
        float: left;
    }

    .taital_main {
        width: 100%;
        float: left;
        margin-top: 30px;
    }

    .get_bg {
        background-color: #ff0000;
        padding: .5rem 1rem;
        font-size: 1.25rem;
        line-height: 1.5;
        border-radius: .3rem;
        padding: 11px 16px 14px 15px;
        margin-right: 25px;
    }

    a:hover {
        color: #fff;
    }

    .get_bga:hover {
        color: #000;
    }

    .get_bga:not(:disabled):not(.disabled).active,
    .get_bga:not(:disabled):not(.disabled):active,
    .show>.get_bga.dropdown-toggle {
        color: #000;
        background-color: #1d2124;
        border-color: #171a1d;
    }

    button.btn.btn-primary,
    button.btn.btn-primary:hover,
    button.btn.btn-primary:focus {
        background: #136af8;
        padding: 10 40px;
    }

    .search_bt {
        border-top-right-radius: 30px !important;
        border-bottom-right-radius: 30px !important;
        color: #fff;
        padding-bottom: 10px;
        padding-top: 10px;
        background-color: #000;
        padding: 15px 45px;
        border: 0px;
    }

    .form-control:not(:last-child) {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        padding-left: 25px;
    }

    .choose_section {
        width: 90%;
        float: left;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    .img-box {
        width: 150%;
    }

    .img-box img {
        width: 80%;
        height: auto;
        transform: translateY(-130px);
        /* Ajusta este valor según necesites para subir la imagen */
    }

    .choose_text {
        width: 100%;
        float: left;
        text-align: center;
        color: #000000;
        font-weight: 600;
    }

    .lorem_text {
        width: 100%;
        float: left;
        text-align: center;
        ;
    }

    .color {
        color: #ff0000;
    }

    .choose_section_2 {
        width: 100%;
        float: left;
    }

    .power_full {
        width: 100%;
        float: left;
        /*background: linear-gradient(to right, #e71919, #e71919, #e71919);*/
        background-image: url(../seguimiento/recursos/fondo-intranet.jpg);
        border-radius: 30px;
        padding: 20px;
        box-shadow: 0px 0px 8px 0px;
    }

    .power {
        width: 100%;
        float: left;
        background: linear-gradient(to right, #e71919, #e71919, #e71919);
        border-radius: 30px;
        padding: 20px;
        box-shadow: 0px 0px 8px 0px;
        background-image: url(../seguimiento/recursos/fondo-intranet.jpg);
    }

    .icon {
        text-align: center;
        margin-top: 40px;
    }

    .icon img {
        width: 210px;
        /* Ajusta el ancho según tus necesidades */
        height: 120px;
        /* Ajusta la altura según tus necesidades */
    }

    .powerful_text {
        width: 100%;
        float: left;
        text-align: center;
        margin-top: 20px;
        color: #000000;
        font-weight: 600;
        font-weight: bold;
    }

    .totaly_text {
        width: 100%;
        float: left;
        text-align: center;
        margin-top: 20px;
        color: #000000;
        font-weight: 600;
        font-weight: bold;
    }

    .making_tetx {
        width: 100%;
        float: left;
        text-align: center;
        margin-top: 20px;
        color: #000000;
        margin-left: 0;
        font-weight: bold;
    }

    .making {
        width: 100%;
        float: left;
        text-align: center;
        margin-top: 20px;
        color: #000;
        margin-left: 0;
        font-weight: bold;
    }

    .btn_main {
        width: 50%;
        margin: 0 auto;
        text-align: center;
    }

    .read_bt {
        height: 50px;
        width: 100%;
        float: left;
        border-radius: 11px;
        border: 9px;
        color: #000000;
        background-color: #ffffff;
        margin-top: 30px;
        font-size: 17px;
        margin-bottom: 30px;
        font-weight: bold;
        /* seccion de boton de intranet cliente y del cuadro*/
    }

    .read_bt a:hover {
        color: #ffffff;
    }

    .about_main {
        width: 100%;
        float: left;
        /*background: linear-gradient(to right, #e71919, #e71919, #e71919);*/
        background-image: url(../seguimiento/recursos/fondo-intranet.jpg);
        height: auto;
        margin-top: 70px;
        margin-bottom: 20px;
        position: relative;
    }

    .about_main:before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        width: 100%;
        height: 110px;
        background-image: url(../seguimiento/recursos/about-top-bg.png);
        z-index: 1;
        background-size: 100%;
        background-position: top center;
        background-repeat: no-repeat;
    }

    .about_main:after {
        content: "";
        display: block;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 110px;
        background-image: url(../seguimiento/recursos/about-bottom-bg.png);
        z-index: 1;
        background-size: 100%;
        background-position: bottom center;
        background-repeat: no-repeat;
    }

    .images img {
        width: 600px;
        /* Ajusta el valor según lo necesites */
        height: 490px;
        /* Ajusta el valor según lo necesites */
        border-radius: 30px;
    }

    .right_section_main {
        width: 100%;
        float: left;
        background-color: #ffffff;
        padding: 12px 40px 0px 40px;
        border-radius: 30px;
    }

    .dolar_tetx {
        width: 100%;
        float: left;
    }

    .special_text {
        color: #000000;
        font-weight: 500;
    }

    .right_aero {
        max-width: 100%;
        left: -150px;
        position: relative;
        top: -185px;
        /*la cola del burbuja conocenos*/
    }

    .about_inner {
        width: 100%;
        float: left;
        margin-top: 10px;
        margin-bottom: 10px;
        background: linear-gradient(to right, #e71919, #e71919, #e71919);
        /*color de fondo de los cuadros*/
        border-radius: 40px;
        border: 2px solid #ff0000;
        /* los cuadros de bordes nuestros servicios*/
    }

    .bt_main {
        width: 16%;
        margin: 0 auto;
        text-align: center;
        margin-top: 45px;
    }

    .read_more {
        height: 50px;
        width: 100%;
        float: left;
        border-radius: 11px;
        border: 0px;
        color: #ffffff;
        background-color: #000;
        margin-top: 30px;
        font-size: 17px;
        margin-bottom: 30px;
    }

    .read_more a:hover {
        color: #ffffff;
    }

    .contact_section {
        width: 100%;
        float: left;
        margin-top: 65px;
    }

    .contact_section_2 {
        width: 100%;
        float: left;
        height: auto;
        padding-top: 300px;
        padding-bottom: 0;
        background-size: cover;
        /* Ajusta el tamaño de la imagen de fondo */
        background-position: center;
        /* Centra la imagen de fondo */
        margin-top: 65px;
        z-index: 5;
        position: relative;
    }

    .section_right {
        width: 100%;
        float: left;
        margin-top: 15px;
    }

    .input_main {
        width: 100%;
        float: left;
        padding: 40px 20px;
        border-radius: 20px;
        margin-top: 15px;
    }

    .map-wrapper {
        position: absolute;
        top: 50%;
        left: 40%;
        transform: translate(-20%, -92%);
        width: 400%;
        /* Ajusta el ancho del mapa según sea necesario */
        max-width: 1150px;
        /* Establece un ancho máximo mayor para el mapa */
    }
    .mobile-image {
        display: none;
        width: 100%;
        height: auto;
    }


    .map-container {
        width: 100%;
        height: 484px;
        /* Ajusta la altura del contenedor del mapa */
        position: relative;
        border: 2px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        resize: both;
        /* Permite ajustar el tamaño desde todos los lados */
        min-width: 990px;
        /* Establece un ancho mínimo */
        min-height: -6px;
        /* Establece una altura mínima */
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }

    .margin-0 {
        margin: 0px;
        padding: 0px;
    }

    button.main_bt {
        background: #ff1212;
        border: none;
        color: #fff;
        width: 150px;
        height: 50px;
        border-radius: 5px;
        font-size: 22px;
    }

    button.main_bt a:hover {
        color: #ffffff;
    }

    .send_btn {
        width: 30%;
        margin: 0 auto;
        text-align: center;
    }

    .contact_section_3 {
        width: 100%;
        float: left;
        background-color: #f82727;
        /*ABAJO SECCION ULTIMO*/
        padding-bottom: 15px;
        padding-top: 15px;
        margin-top: -20px;
    }

    .contact_taital {
        width: 100%;
        float: left;
        padding-left: 100px;
        padding-right: 100px;
        margin-top: 100px;
    }

    .web {
        background-color: #ffffff;
        border-radius: 50px;
        height: auto;
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .londan_text {
        padding-left: 20px;
    }

    .map_main {
        width: 100%;
        float: left;
        font-size: 17px;
        color: #000000;
        padding-left: 17px;
        text-align: center;
    }

    .contact_product {
        width: 100%;
        float: left;
        padding-bottom: 20px;
        padding-top: 65px;
    }

    .menu {
        width: 100%;
        float: left;
        margin-top: 15px;
    }

    .menu ul {
        margin: 0px;
        padding: 0px;
    }

    .menu ul li {
        color: #fcfcfc;
    }

    .menu ul li a:hover {
        color: #fcfcfc;
    }

    .useful_text {
        width: 100%;
        float: left;
        color: #fcfcfc;
        font-size: 24px;
        font-weight: bold;
        margin-top: 15px;
    }

    .menu.multi_column_menu li {
        float: left;
        width: 33.33%;
    }

    .footer-logo {
        margin-top: 70px;
    }

    .margin-top-30 {
        padding-top: 25px;
        width: 90%;
    }

    .icon_main {
        width: 100%;
        float: left;
        text-align: center;
    }

    .menu_text {
        width: 20%;
        margin: 0 auto;
        text-align: center;
    }

    .menu_text ul {
        margin: 0px;
        padding: 0px;
    }

    .menu_text li {
        float: left;
        padding-left: 6px;
        padding-right: 25px;
    }

    .copyright_main {
        width: 100%;
        float: left;
        background-color: #000000;
        height: 50px;
        padding-bottom: 0px;
        padding-top: 0px;
        display: flex;
    }

    .copy_text {
        width: 100%;
        float: left;
        text-align: center;
        color: #ffffff;
        margin-left: 0px;
        margin-right: 0px;
        text-align: center;
    }

    .copy_text a:hover {
        color: #ffffff;
    }

    .footer_menu {
        padding-right: 10px;
    }


    /*mapa*/


    /* Ajustar el mapa para dispositivos móviles */

    @media (max-width: 768px) {
        .map-wrapper {
        display: none;
        flex-direction: column; /* Ajusta según tus necesidades */
        width: 100%;
        height: auto;
    }
        .map {
            /* Ajusta la altura para dispositivos móviles */
            display: none;
        }
        .mobile-image {
        display: block;
        height: 50px;
        width: 50%;
    }

        .logo {
            width: 20%;
            height: 80px;
        }

        .img-box {
            width: 102%;
            height: 102px;
            /*display: none;*/
            display: flex;
        }

        /*.web_text {
            font-size: 15px;
            /* Ajusta el tamaño de fuente para pantallas pequeñas 
        }*/

        /*.donec_text {
            font-size: 8px;
            /* Ajusta el tamaño de fuente para pantallas pequeñas 
        }*/

        .main-menu ul {
            display: none;
            flex-direction: column;
            width: 100%;
            text-align: center;
            background: #333;
            position: absolute;
            top: 50px;
            /* Ajustar según la altura del header o contenedor */
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .main-menu:hover ul,
        .main-menu.active ul {
            display: flex;
        }

        .main-menu {
            position: relative;
        }
    }


    /* Ocultar el botón de menú en pantallas grandes */

    .menu-toggle {
        display: none;
    }


    /* Ajustes generales del mapa para asegurar que se ajuste a diferentes pantallas */

    .map-wrapper {
        width: 100%;
        height: 454px;
    }

    .map-container {
        width: 100%;
        height: 100%;
        /* Ajusta la altura del contenedor del mapa */
        position: relative;
        border: 2px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }


    /* Mostrar el menú desplegable en dispositivos móviles */

    .main-menu ul {
        display: none;
        flex-direction: column;
        width: 100%;
        text-align: center;
        background: #333;
        position: absolute;
        top: 50px;
        /* Ajustar según la altura del botón */
        left: 0;
        right: 0;
    }

    .main-menu.active ul {
        display: flex;
    }

    .menu-area {
        display: block;
        text-align: center;
        width: 100%;
        background: #333;
        position: relative;
    }

    .menu-toggle {
        display: block;
        background: #333;
        color: #fff;
        border: none;
        padding: 10px;
        font-size: 18px;
        cursor: pointer;
        width: 100%;
        text-align: center;
    }


    /* Ocultar el botón de menú en pantallas grandes */

    @media (min-width: 769px) {
        .menu-toggle {
            display: none;
        }
    }
</style>
    <style>
    /* Estilos de navbar */
    /* Estilos de navbar */

    .navbar {
        /*background: linear-gradient(to right, #f2f2f2, #f2f2f2, #e71919, #e71919, #e71919, #e71919, #4F0001);*/
        /* Asegúrate de que es transparente */
        /* Eliminar cualquier borde */

        background-image: red;
        background-image: url(../seguimiento/recursos/banner-20.png);
    }

    .navbar-nav {
        margin: 0;
        padding: 0;
        background-image: red;
        /* Asegúrate de que es transparente */
    }

    .container-fluid {
        width: 100%;
        padding: 0;
        margin: 0;
        /* Eliminar márgenes */
    }

    .nav-item {
        margin: 0 15px;
    }

    .nav-link {
        color: white !important;
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
        /* Añadido para negrita */
    }

    .nav-link:hover {
        text-decoration: underline;
    }
    /*estilo ventana emergente*/
    
    </style>
    <header id="home" class="section">
        <div class="header_main">
            <!-- header inner -->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                            <div class="full">
                                <div class="center-desk">
                                    <div class="logo">
                                        <a href="#home"><img src="../seguimiento/recursos/logo-5.png" style="max-width: 90%;"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                            <div class="menu-area">
                                <div class="limit-box">
                                    <nav class="navbar navbar-expand-lg navbar-light">
                                        <div class="container">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                                aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarNav">
                                                <ul class="navbar-nav ml-auto">
                                                    <li class="nav-item"><a class="nav-link" href="#home">INICIO</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link" href="#about">CONSULTA</a>
                                                    </li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="#service">SERVICIOS</a></li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="#testimonial">CONOCENOS</a></li>
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="#contact">UBICACION</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <section>
                <div class="bannen_inner">
                    <div class="container">
                        <div class="row marginii">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="taital_main">

                                </div>
                                <h1 class="web_text"><strong>SOPORTE TECNICO</strong></h1>
                                <p class="donec_text">"Bienvenido al Área de Soporte Técnico de Perusis.Nuestro objetivo
                                    es mejorar la gestión y el seguimiento de los servicios técnicos, optimizando la
                                    comunicación y la satisfacccion"</p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="img-box">
                                    <figure><img src="../seguimiento/recursos/woofer-1.png" alt="img" style="max-width: 100%;">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </header>
    <!-- banner end -->
    <!-- choose start -->
    <div id="about" class="choose_section">
        <div class="container">
            <div class="col-sm-12">
                <h1 class="choose_text">CONSULTAS</h1>
            </div>
        </div>
    </div>
    <div class="choose_section_2">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="power_full text-center mb-5">
                        <div class="icon">
                            <a href="#"><img src="../seguimiento/recursos/icon_intranet.png"></a>
                        </div>
                        <h2 class="powerful_text">INTRANET</h2>
                        <p class="making_tetx">De ser un personal de la empresa ingrese a la opción 'Intranet' con su
                            contraseña previamente asignada y de poseer la clave asignada por Perusis S.A.C</p>
                        <div class="btn_main">
                            <button type="button" role="button" class="read_bt"
                                onclick="mostrarFormulario('formUser')">INGRESAR</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="power text-center mb-5">
                        <div class="icon">
                            <a href="#"><img src="../seguimiento/recursos/icon_cliente.png"></a>
                        </div>
                        <h2 class="totaly_text">CLIENTE</h2>
                        <p class="making">Si usted es cliente y desea consultar el estado en el que se encuentra su
                            servicio ingrese a la opción 'cliente',con su numero de orden y codigo previamente asignada.
                        </p>
                        <div class="btn_main">
                            <button type="button" role="button" class="read_bt"
                                onclick="mostrarFormulario('formCliente')">CONSULTAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ventana emergente cosulta cliente -->
    <div class="popup-form" id="formCliente">
        <h2>CONSULTE SU ORDEN DE TRABAJO</h2>
        <h3>Ingrese los datos:</h3>
        <form action="../seguimiento/logica/consulta.php" method="POST">
            <div class="form-group">
                <label for="numero_registro">Número de Orden:</label>
                <input type="text" id="numero_registro" name="numero_registro" required>
            </div>
            <div class="form-group">
                <label for="codigo_unico">Código Único:</label>
                <input type="text" id="codigo_unico" name="codigo_unico" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Consultar">
            </div>
        </form>
    </div>
    <!-- ventana emergente login usuario-->
    <div class="popup-form" id="formUser">
        <h2>LOGIN</h2>
        <form action="../seguimiento/logica/loguear.php" method="POST">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="clave" name="clave" required>
                <span toggle="#clave" class="eye-icon fa fa-eye-slash"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Ingresar">
            </div>
        </form>
    </div>


    <!-- choose start -->
    <!-- about start -->
    <div id="testimonial" class="choose_section">
        <div class="container">
            <div class="col-sm-12">
                <h1 class="choose_text">CONOCENOS</h1>
            </div>
        </div>
    </div>
    <div class="about_main layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="images">
                        <img src="../seguimiento/recursos/conocenos.png" style="max-width: 100%;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right_section_main">
                        <h1 class="dolar_tetx"><strong style="color: #000000;">CONOCENOS:</strong></h1>
                        <h2 class="special_text">“GRUPO PERUSIS S.A.C.”</h2>
                        <p class="donec_text"> “Perusis es una empresa que se enfoca en simplificar la vida de las
                            personas y potenciar el éxito de las empresas brindando productos tecnológicos e
                            informáticos de primera calidad, ofreciendo soluciones fiables y asequibles, respaldadas
                            por un servicio excepcional. A través de la tecnología, aspiran a ser un motor para el
                            progreso y la prosperidad de los clientes.”</p>
                        <div class="right_aero"><img src="../seguimiento/recursos/right-aerow.png"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about end -->
    <!-- service start -->
    <div id="service" class="choose_section">
        <div class="container">
            <div class="col-sm-12">
                <h1 class="choose_text">NUESTROS SERVICIOS</h1>
                <p class="lorem_text">Ofrecemos una amplia gama de servicios informáticos diseñados para satisfacer las
                    necesidades de nuestros clientes. Desde formateo de computadoras hasta instalación de programas y
                    mantenimiento de hardware, nos comprometemos a proporcionar
                    soluciones confiables y efectivas.</p>
            </div>
        </div>
    </div>
    <div class="choose_section_2">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon">
                            <a href="#"><img src="../seguimiento/recursos/icon-1.png"></a>
                        </div>
                        <h2 class="totaly_text">Formateo de computadora</h2>
                        <p class="making">El formateo implica eliminar completamente todos los datos y programas
                            almacenados en ella, devolviéndola a su estado original de fábrica.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon">
                            <a href="#"><img src="../seguimiento/recursos/icon-2.png"></a>
                        </div>
                        <h2 class="totaly_text">Mantenimiento Correctivo</h2>
                        <p class="making">Incluye acciones como reparación de hardware,solución de errores de software y
                            limpieza para restaurar la funcionalidad normal del sistema.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon">
                            <a href="#"><img src="../seguimiento/recursos/icon-3.png"></a>
                        </div>
                        <h2 class="totaly_text">Actualización de Antivirus</h2>
                        <p class="making">Implica mantener actualizado el software antivirus,realizar ajustes para
                            mejorar la seguridad y el rendimiento del sistema operativo de una computadora.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="choose_section_2">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon">
                            <a href="#"><img src="../seguimiento/recursos/icon-4.png"></a>
                        </div>
                        <h2 class="totaly_text">Instalación de Software de Ingeniería</h2>
                        <p class="making">Incluye la descarga del medio de instalación, seguido de la ejecución de un
                            programa que guía al usuario en la instalación.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon">
                            <a href="#"><img src="../seguimiento/recursos/icon-5.png"></a>
                        </div>
                        <h2 class="totaly_text">Mantenimiento interno de computadora</h2>
                        <p class="making">Incluye la limpieza de polvo, verificación de conexiones de hardware, y la
                            aplicación de pasta térmica en el procesador.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="about_inner">
                        <div class="icon">
                            <a href="#"><img src="../seguimiento/recursos/icon-6.png"></a>
                        </div>
                        <h2 class="totaly_text">Instalación STANDAR</h2>
                        <p class="making">Implica configurar una computadora con un conjunto básico de software estándar
                            para satisfacer las necesidades generales de los usuarios.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- service end -->
        <!-- contact start -->
        <div id="contact" class="contact_section">
            <div class="container">
                <div class="col-sm-12">
                    <h1 class="choose_text">UBICACION</h1>
                    <p class="lorem_text">Si deseas contactarnos para obtener más información sobre nuestros servicios o
                        para hacer una consulta específica, aquí tienes nuestras opciones de contacto:</p>
                </div>
            </div>
        </div>
        <div class="contact_section_2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input_main">
                            <div class="container">
                                <div class="map-wrapper">
                                    <div class="map-container">
                                    <!--<img src="../recursos/mapa.png" alt="Imagen alternativa" class="mobile-image">-->
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.5716265998114!2d-70.02188148531693!3d-15.84022008904298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915d6990b4b2d25d%3A0x9ed5cf967c4cfc0c!2sJirón%20Moquegua%20190%2C%20Puno%2C%20Perú!5e0!3m2!1sen!2spe!4v1620011111111!5m2!1sen!2spe"
                                            frameborder="0" style="border:0;" allowfullscreen=""
                                            loading="lazy" class="map"></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section_right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact_section_3">
                <div class="container">
                    <div class="contact_taital">
                        <div class="row web">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="map_main">
                                    <img src="../seguimiento/recursos/map-icon.png">
                                    <span class="londan_text">21000, Puno, Peru, 21000</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="map_main">
                                    <img src="../seguimiento/recursos/phone-icon.png">
                                    <span class="londan_text">(051) 775403</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <div class="map_main">
                                    <img src="../seguimiento/recursos/email-icon.png">
                                    <span class="londan_text">gerencia@perusis.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact_product">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-2">
                                <div class="footer-logo"><img src="../seguimiento/recursos/footer-logo.png" style="max-width: 80%;">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <h1 class="useful_text">Sobre Nosotros:</h1>
                                <div class="menu">
                                    <ul>
                                        <li>
                                            <a href="#home"><img src="../seguimiento/recursos/bulit-icon.png"
                                                    style="padding-right: 10px;">Inicio</a>
                                        </li>
                                        <li>
                                            <a href="#about"><img src="../seguimiento/recursos/bulit-icon.png"
                                                    style="padding-right: 10px;">Consultas</a>
                                        </li>
                                        <li>
                                            <a href="#service"><img src="../seguimiento/recursos/bulit-icon.png"
                                                    style="padding-right: 10px;">Servicios</a>
                                        </li>
                                        <li>
                                            <a href="#contact"><img src="../seguimiento/recursos/bulit-icon.png"
                                                    style="padding-right: 10px;">Ubicacion</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <h1 class="useful_text">Atencion al Cliente:</h1>
                                <div class="menu multi_column_menu">
                                    <ul>
                                        <li class="footer_menu">
                                            <a href="#"><img src="../seguimiento/recursos/bulit-icon.png" class="footer_menu">Jr.
                                                Moquegua </a>
                                        </li>
                                        <li class="footer_menu">
                                            <a href="#"><img src="../seguimiento/recursos/bulit-icon.png" class="footer_menu">N°
                                                180</a>
                                        </li>
                                        <li class="footer_menu">
                                            <a href="#"><img src="../seguimiento/recursos/bulit-icon.png"
                                                    class="footer_menu">Puno</a>
                                        </li>
                                        <li class="footer_menu">
                                            <a href="#"><img src="../seguimiento/recursos/bulit-icon.png"
                                                    class="footer_menu">Lunes-Sábado</a>
                                        </li>
                                        <li class="footer_menu">
                                            <a href="#"><img src="../seguimiento/recursos/bulit-icon.png" class="footer_menu">8:30
                                                am-7:30 pm</a>
                                        </li>
                                        <li class="footer_menu">
                                            <a href="#"><img src="../seguimiento/recursos/bulit-icon.png" class="footer_menu">Grupo
                                                Perusis</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="icon_main">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="menu_text">
                                    <ul>
                                        <li>
                                            <a href="#"><img src="../seguimiento/recursos/fb-icon.png"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../seguimiento/recursos/twitter-icon.png"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../seguimiento/recursos/in-icon.png"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="../seguimiento/recursos/google-icon.png"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright_main">
                <div class="container">
                    <p class="copy_text">©SERVICIO TECNICO_<a href="https://perusis.com/">PERUSIS S.A.C</a></p>
                </div>
            </div>


            <!-- contact end -->
            <!-- Javascript files-->
            <script src="../seguimiento/js/jquery.min.js"></script>
            <script src="../seguimiento/js/popper.min.js"></script>
            <script src="../seguimiento/js/bootstrap.bundle.min.js"></script>


            <script src="../seguimiento/js/jquery-3.0.0.min.js"></script>
            <script src="../seguimiento/js/plugin.js"></script>
            <!-- sidebar -->
            <script src="../seguimiento/js/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="../seguimiento/js/custom.js"></script>
            <!-- javascript -->
            <script src="../seguimiento/js/owl.carousel.js"></script>
            <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
            <script>
            $(document).ready(function() {
                $(".fancybox").fancybox({
                    openEffect: "none",
                    closeEffect: "none"
                });

                $(".zoom").hover(function() {

                    $(this).addClass('transition');
                }, function() {

                    $(this).removeClass('transition');
                });
            });
            </script>
            <script>
            function mostrarFormulario(id) {
                $('.popup-form').hide(); // Ocultar todos los formularios
                $('#' + id).fadeIn(); // Mostrar el formulario correspondiente
            }

            $(document).mouseup(function(e) {
                var container = $(".popup-form");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    container.fadeOut();
                }
            });
            </script>
            <script>
            function togglePassword() {
                var passwordInput = document.getElementById('clave');
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                } else {
                    passwordInput.type = "password";
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                }
            }

            eyeIcon.addEventListener('click', togglePassword);
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>