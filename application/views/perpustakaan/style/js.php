<!-- jQuery -->
<script src="<?php echo base_url("builder/plugins/jquery/jquery.min.js"); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url("builder/plugins/jquery-ui/jquery-ui.min.js"); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('builder/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('builder/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('builder/dist/js/adminlte.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('builder/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/daterangepicker/daterangepicker.js'); ?>"></script>

<script src="<?php echo base_url('builer/dist/js/adminlte.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('builder/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('builder/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<script src="<?php echo base_url('builer/dist/js/pages/dashboard.js'); ?>"></script>
<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $("#perpustakaan-table").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    }).buttons().container().appendTo('#perpustakaan-table_wrapper .col-md-6:eq(0)');

    $("#perpustakaan-table2").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    }).buttons().container().appendTo('#perpustakaan-table_wrapper .col-md-6:eq(0)');

    $("#data-table").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    }).buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');

    $("#data-table2").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    }).buttons().container().appendTo('#data-table_wrapper .col-md-6:eq(0)');
});
</script>
<!-- Select2 -->
<script src="<?php echo base_url('builder/plugins/select2/js/select2.full.min.js'); ?>"></script>