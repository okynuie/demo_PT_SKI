 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      <!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
</div>

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pembelian</h6>
            </div>
            
            <div class="card-body">
            <div class="form-group row">
              <div class="col-sm-2 mb-3 mb-sm-4">
                  <label>No. Transaksi</label>
                  <input type="text" name="notransaksi" class="form-control form-control-user" id="notransaksi" value="<?= $notransaksi ?>" readonly>
              </div>
              <div class="col-sm-2 mb-3 mb-sm-4">
                  <label for="kodespl">Kode Supplier</label>
                  <input type="text" name="namaspl" class="form-control form-control-user" id="kodespl" value="<?= $data_hbeli['namaspl'] ?>" readonly>
              </div>
              <!-- <div class="input-group date"> -->
              <div class="col-sm-2 mb-3 mb-sm-4">
                  <label for="tanggalbeli">Tanggal</label>
                  <input type="text" name="tanggalbeli" class="form-control form-control-user" id="tanggalbeli" value="<?= date('d/m/Y', strtotime($data_hbeli['tglbeli']));  ?>" readonly>
              </div>
                <!-- </div> -->
            </div>
            
            <!-- <div id="inputs-container"> -->
            <div class="card-body">
                    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                  <?php foreach($data_dbeli as $dbeli): ?>
                    <tr>
                        <td><?= $dbeli['notransaksi']; ?></td>
                        <td><?= $dbeli['namabrg']; ?></td>
                        <td><?= $dbeli['hargabeli']; ?></td>
                        <td><?= $dbeli['qty']; ?></td>
                        <td><?= $dbeli['satuan']; ?></td>
                        <td><?= $dbeli['diskon']; ?></td>
                        <td><?= $dbeli['diskonrp']; ?></td>
                        <td><?= $dbeli['totalrp']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                  </div>
                  </div>
            <!-- </div> -->
            </div>
        </div>
      
    </div>


</div>
</div>
</div>
</div>
<!-- End of Main Content -->
