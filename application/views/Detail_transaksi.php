<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="row">

    <div class="col-lg-14">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pembelian</h6>
            </div>
            
            <div class="card-body">
            <form action="<?= base_url('transaksi/simpanInput');?>" method="post">
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-4">
                  <label>No. Transaksi</label>
                  <input type="text" name="notransaksi" class="form-control form-control-user" id="notransaksi" value="<?= $notransaksi ?>" readonly>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-4">
                  <label for="kodespl">Kode Supplier</label>
                  <select name="kodespl" class="form-control" id="kodespl">
                            <option value="">Pilih Supplier</option>
                            <?php foreach ($supplier as $sp) : ?>
                              <option value="<?= $sp['kodespl']; ?>"><?php echo($sp['kodespl'].' ('.$sp['namaspl'].')'); ?></option>
                            <?php endforeach; ?>
                  </select>
                  <?php echo form_error('kodespl', '<small class="text-danger">', '</small>'); ?>
              </div>
              <!-- <div class="input-group date"> -->
              <div class="col-sm-2 mb-3 mb-sm-4">
                  <label for="tanggalbeli">Tanggal</label>
                  <input type="date" class="form-control datepicker" name="tanggalbeli" id="tanggalbeli" placeholder="Pilih tanggal...">
                  <?php echo form_error('tanggalbeli', '<small class="text-danger">', '</small>'); ?>
              </div>
                <!-- </div> -->
            </div>

            <!-- tabel input -->
            <div class="btn btn-primary mb-3">
            <a id="add-row">Add Row</a>
            </div>
            
            <!-- <div id="inputs-container"> -->
            <table class="table table-bordered" id="inputs-container" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Diskon</th>
                        <th>DiskonRP</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="input-gp">
                        <td><input type="text" name="dbeli[][kodebarang]" class="form-control form-control-user" id="kodebarang">
                        <?php echo form_error('kodebarang', '<small class="text-danger">', '</small>'); ?></td>
                        <td><input type="text" class="form-control form-control-user" name="dbeli[][namabarang]" id="namabarang">
                        <?php echo form_error('namabarang', '<small class="text-danger">', '</small>'); ?></td>
                        <td><input type="text" class="form-control form-control-user" name="dbeli[][hargabeli]" id="hargabeli">
                        <?php echo form_error('hargabeli', '<small class="text-danger">', '</small>'); ?></td>
                        <td><input type="text" class="form-control form-control-user" name="dbeli[][qty]" id="qty">
                        <?php echo form_error('qty', '<small class="text-danger">', '</small>'); ?></td>
                        <td><input type="text" name="dbeli[][satuan]" class="form-control form-control-user" id="satuan">
                        <?php echo form_error('satuan', '<small class="text-danger">', '</small>'); ?></td>
                        <td><input type="text" class="form-control form-control-user" name="dbeli[][diskon]" id="diskon">
                        <?php echo form_error('diskon', '<small class="text-danger">', '</small>'); ?></td>
                        <td><input type="text" class="form-control form-control-user" name="dbeli[][diskonrp]" id="diskonrp" readonly></td>
                        <td><input type="text" class="form-control form-control-user" name="dbeli[][total]" id="total" readonly></td>
                    </tr>
                    
                </tbody>
            </table>
            <!-- </div> -->
            </div>
        </div>
        <div class="form-group">
            <a href="<?= base_url('transaksi/index')?>" class="btn btn-secondary mb-3">Cancel</a>
            <button class="btn btn-success mb-3" type="submit">Save</button>
        </div>
        
        </form>
    </div>

    

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->