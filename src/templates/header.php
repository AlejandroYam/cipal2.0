<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inicio | Cipal</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="assets/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="assets/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/dash.css">
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-cipal">
            <!-- Navbar Brand-->
            
            <a class="navbar-brand ps-3" href="index.html"><img width="60%" src="https://www.cipal.com.mx/images/logo/CIPAL.png" alt=""></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img style="border-radius:20px;" class="fa-fw fa-2x profile" src="https://i.pinimg.com/736x/7a/f2/76/7af276798566a208812ac5b624f4c690.jpg" alt=""></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!"><i class="fas fa-cog"></i> Configuración</a></li>
                        <li><a class="dropdown-item" href="#!"><i class="fas fa-history"></i> Actividad</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir"><i class="fas fa-power-off"></i> Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu" style="background-color:#31577f">
                        <div class="nav" style="color:white">
                            <div class="sb-sidenav-menu-heading"></div>

                            <a style="color:white;"class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Inicio
                            </a>
                            
                            <!--catalogos-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Catalógos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav  style="color:white "class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Tipoingresos">Tipos de ingresos</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Contribuyentes">Contribuyentes</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Tipoapoyos">Tipos de apoyo</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Beneficiarios</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Proveedores">Proveedores </a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Departamentos">Departamentos</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Empleados">Empleados</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Puestos">Puestos</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Vehículos</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Unidades">Unidades</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Impuestos</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Conceptos</a>
                                </nav>
                            </div>
                            <!--ingresos-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ingresos" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-check-alt"></i></div>
                                Ingresos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="ingresos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>

                            <!--egresos-->

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#egresos" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-funnel-dollar"></i></div>
                                Egresos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="egresos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
 
                            <!--Gestión-->

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#gestion" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                                Gestión
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="gestion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>

                            <!---configuración-->

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#configuracion" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                                Configuración
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="configuracion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Usuarios">Usuarios</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!--<h1 class="mt-4">Bienvenido, Alejandro.</h1>-->
                        
              
                
                  
            
                       
                       
                        
        
    
                