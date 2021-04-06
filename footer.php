<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="http://www.ekesoft.net">ekesoft.net</a>.</strong>
    Derechos reservados
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $ruta_absoluta;?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $ruta_absoluta;?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $ruta_absoluta;?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $ruta_absoluta;?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $ruta_absoluta;?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo $ruta_absoluta;?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $ruta_absoluta;?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $ruta_absoluta;?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $ruta_absoluta;?>/plugins/moment/moment.min.js"></script>
<script src="<?php echo $ruta_absoluta;?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $ruta_absoluta;?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $ruta_absoluta;?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $ruta_absoluta;?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $ruta_absoluta;?>/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $ruta_absoluta;?>/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $ruta_absoluta;?>/dist/js/demo.js"></script>

<!-- Modal pantalla completa-->
<div class="modal fullscreen-modal" id="modal_fs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialoge" role="document">
        <div class="modal-content">

            <div  id="formulario_fs" class="modal-body">

            </div>

        </div>
    </div>
</div>

<!--modal grande-->
<div class="modal fade bd-example-modal-lg" id="modal_cont" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div id="formulario" class="modal-body">

            </div>
            <div id="mensaje_cont" style="display: flex; justify-content: center;">
                
            </div>

        </div>
    </div>
</div>

<!--modal pequeño-->
<div class="modal" tabindex="-1" role="dialog" id="modal_cont_sm">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div id="formulario_sm" class="modal-body">

            </div>
            <div id="mensaje_cont_sm" style="display: flex; justify-content: center;">
                
            </div>

        </div>
    </div>
</div>
</body>
</html>
