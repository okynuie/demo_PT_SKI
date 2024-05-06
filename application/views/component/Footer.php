<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
    </div>
</div>


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

    <script href="<?= base_url('assets/plugin/');?>datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
    $(function(){
        $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
        });
    });
    </script>

    <script>
    $(document).ready(function(){
    // click handler
    $("#add-row").on("click", function() {
        $("table").append('<tr><td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td><td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td><td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td><td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td><td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td><td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td><td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td><td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td></tr>');
    })
    })
    </script>

</body>

</html>