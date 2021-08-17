
<!-- ============================================================== -->
            <!-- CONTENIDO DE LA PÁGINA DE INICIO AQUÍ -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- INICIO DE CONTENIDO-->
                    <div class="container-fluid">
                        
                        <!-- TITULO DE LA PAGINA DE INICIO -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">CIPAL</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Configuración</a></li>
                                            <li class="breadcrumb-item active">Municipio</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Información de Municipio</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- FINAL DEL INICIO --> 
                        
                    </div> <!-- CONTENIDO -->

                </div> <!-- CONTENIDO -->
    <div class="row">
        <div class="col-12" id="informacion_municipio">
           <?php include("ajax/municipio.php");?>
        </div><!-- end col-->
    </div>
    <!-- end row-->


    <script src="js/municipio.js?v=<?php echo $_SESSION['vsistema'];?>"></script>

</body>
</html> 