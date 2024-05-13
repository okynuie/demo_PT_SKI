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


<script>
    $(document).ready(function() {
        
        $(document).on('input', '.input-gp input', function() {
            calculateValues($(this).closest('.input-gp'));
        });

        function calculateValues(inputGp) {
            var input2 = parseFloat(inputGp.find('#qty').val());
            var input3 = parseFloat(inputGp.find('#hargabeli').val());
            var input4 = parseFloat(inputGp.find('#diskon').val());
            var input5 = inputGp.find('#diskonrp');
            var input6 = inputGp.find('#total');

            var value5 = isNaN(input2) || isNaN(input3) ? '' : input2 * input3;
            input6.val(value5);

            var value6 = isNaN(input4) || isNaN(value5) ? '' : input4 * (value5/100);
            input5.val(value6);
        }

        $('#add-row').on('click', function() {
            var newRow = '<tr class="input-gp">' +
                            '<td><input type="text" name="dbeli[][kodebarang]" class="form-control form-control-user" id="kodebarang"><?php echo form_error('kodebarang', '<small class="text-danger">', '</small>'); ?></td>' +
                            '<td><input type="text" class="form-control form-control-user" name="dbeli[][namabarang]" id="namabarang"><?php echo form_error('namabarang', '<small class="text-danger">', '</small>'); ?></td>' +
                            '<td><input type="text" class="form-control form-control-user" name="dbeli[][hargabeli]" id="hargabeli"><?php echo form_error('hargabeli', '<small class="text-danger">', '</small>'); ?></td>' +
                            '<td><input type="text" class="form-control form-control-user" name="dbeli[][qty]" id="qty"><?php echo form_error('qty', '<small class="text-danger">', '</small>'); ?></td>' +
                            '<td><input type="text" name="dbeli[][satuan]" class="form-control form-control-user" id="satuan"><?php echo form_error('satuan', '<small class="text-danger">', '</small>'); ?></td>' +
                            '<td><input type="text" class="form-control form-control-user" name="dbeli[][diskon]" id="diskon"><?php echo form_error('diskon', '<small class="text-danger">', '</small>'); ?></td>' +
                            '<td><input type="text" class="form-control form-control-user" name="dbeli[][diskonrp]" id="diskonrp" readonly></td>' +
                            '<td><input type="text" class="form-control form-control-user" name="dbeli[][total]" id="total" readonly></td>' +
                        '</tr>';
            

            $('#inputs-container tbody').append(newRow);
        });
    });
</script>


</body>

</html>