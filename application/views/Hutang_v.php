 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            
          <a href="<?= base_url('transaksi/detailBeli')?>" class="btn btn-primary mb-3">Tambah Pembelian</a>

          <?= $this->session->flashdata('message'); ?>

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
                                    <th>No. Transaksi</th>
                                    <th>Nama Supplier</th>
                                    <th>Tanggal Beli</th>
                                    <th>Total Hutang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($hutang as $ht) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><a href="<?= base_url('transaksi/viewBeli/'.$ht['notransaksi']);?>"><?= $ht['notransaksi']; ?></td>
                                    <td><?php foreach($supplier as $sp): ?>
                                    <?php if($sp['kodespl'] == $ht['kodespl'])
                                    {
                                        echo($sp['namaspl']);
                                    }
                                    ?>
                                    <?php endforeach; ?>
                                    </td>
                                    <td><?= $ht['tglbeli']; ?></td>
                                    <td><?= $ht['totalhutang']; ?></td>
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

