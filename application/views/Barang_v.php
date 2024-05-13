 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Harga Beli</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($barang as $br) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $br['kodebrg']; ?></td>
                                    <td><?= $br['namabrg']; ?></td>
                                    <td><?= $br['satuan']; ?></td>
                                    <td><?= $br['hargabeli']; ?></td>
                                    <?php foreach($stock as $st) : ?>
                                      <?php if ($br['kodebrg'] == $st['kodebrg']) : ?>
                                        <td><?= $st['qtybeli']; ?></td>
                                      <?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>
            
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

</div>
