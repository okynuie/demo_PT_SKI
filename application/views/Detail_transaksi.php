<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
</div>

<div class="row">

    <div class="col-lg-14">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pembelian</h6>
            </div>
            
            <div class="card-body">

            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-4">
                  <label for="no_peserta">No. Transaksi</label>
                  <input type="text" class="form-control form-control-user" id="exampleFirstName">
              </div>
              <div class="col-sm-2 mb-3 mb-sm-4">
                  <label for="no_peserta">Kode Supplier</label>
                  <select name="kodespl" class="form-control" id="kodespl">
                            <option value="">Pilih Supplier</option>
                            <?php foreach ($supplier as $sp) : ?>
                              <option value="<?= $sp['id']; ?>"><?php echo($sp['kodespl'].' ('.$sp['namaspl'].')'); ?></option>
                            <?php endforeach; ?>
                  </select>
              </div>
              <!-- <div class="input-group date"> -->
              <div class="col-sm-2 mb-3 mb-sm-4">
              <label>Tanggal</label>
                  <input type="text" class="form-control datepicker" name="tanggalbeli">
              </div>
                <!-- </div> -->
            </div>

            <!-- tabel input -->
            <div class="btn btn-primary mb-3">
            <a id="add-row">Add Row</a>
            </div>

            <table class="table table-bordered" id="" width="100%" cellspacing="0">
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
                    <tr>
                        <td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td>
                        <td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td>
                        <td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td>
                        <td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td>
                        <td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td>
                        <td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td>
                        <td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td>
                        <td><input type="text" class="form-control form-control-user" id="exampleFirstName"></td>
                    </tr>
                </tbody>
            </table>
            
            <!-- <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-0">
                  <label for="no_peserta">Kode Barang</label>
                  <input type="text" class="form-control form-control-user" id="exampleFirstName">
              </div>
              <div class="col-sm-2">
                  <label for="no_peserta">Nama Barang</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName">
              </div>
              <div class="col-sm-2">
              <label for="no_peserta">Harga Beli</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName">
              </div>
              <div class="col-sm-1">
              <label for="no_peserta">QTY</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName">
              </div>
              <div class="col-sm-1">
              <label for="no_peserta">Diskon</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName">
              </div>
              <div class="col-sm-2">
              <label for="no_peserta">DiskonRP</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName">
              </div>
              
              <div class="col-sm-2">
              <label for="no_peserta">Total</label>
                  <input type="text" class="form-control form-control-user" id="exampleLastName">
              </div>
            </div> -->

            </div>
          </div>
          <a href="index" class="btn btn-secondary mb-3">Cancel</a>
          <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newMenuModal">Save</a>

    </div>

    

</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->