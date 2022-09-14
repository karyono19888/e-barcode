<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="#">E-Barcode 1.0</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets'); ?>/dist/js/demo.js"></script>
<!-- Sweetalert2 -->
<script src="<?= base_url('assets'); ?>/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- pace-progress -->
<script src="<?= base_url('assets'); ?>/plugins/pace-progress/pace.min.js"></script>
<?php if ($this->session->flashdata('success')) : ?>
    <script>
        SweetAlert.fire({
            icon: 'success',
            title: 'Success',
            text: '<?php echo $this->session->flashdata('success'); ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif;
unset($_SESSION['success']); ?>
<?php if ($this->session->flashdata('error')) : ?>
    <script>
        SweetAlert.fire({
            icon: 'error',
            title: 'Oops..',
            text: '<?php echo $this->session->flashdata('error'); ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif;
unset($_SESSION['error']); ?>
<?php if ($this->session->flashdata('warning')) : ?>
    <script>
        SweetAlert.fire({
            icon: 'warning',
            title: 'Warning !',
            text: '<?php echo $this->session->flashdata('warning'); ?>',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
<?php endif;
unset($_SESSION['warning']); ?>
<script>
    function Logout() {
        SweetAlert.fire({
            title: 'Logout',
            text: "Apakah kamu yakin , mau keluar dari aplikasi ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.assign('<?php echo base_url('login/logout') ?>');
            }
        })
    }
</script>