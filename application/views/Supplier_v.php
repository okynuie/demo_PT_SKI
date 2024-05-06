 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
            <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                    href="https://datatables.net">official DataTables documentation</a>.</p> -->
            
          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Supplier</a>

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
                                    <th>Kode Supplier</th>
                                    <th>Nama Supplier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($supplier as $sp) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $sp['kodespl']; ?></td>
                                    <td><?= $sp['namaspl']; ?></td>
                                    <td><a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $sp['id']; ?>">Delete</a>
                                    </td>
                                </tr>


<!-- Modal delete Faskes-->
<div class="modal fade" id="deleteModal<?= $sp['id']; ?>" tabindex="-1" aria-labelledby="tambahMenuModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="tambahMenuModalLabel">Delete Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="<?= base_url('supplier/deleteSpl/' . $sp['id']); ?>" method="post">
        <div class="modal-body">
            <p>Are you sure want to delete supplier <?= $sp['namaspl'];?>?</p>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Delete</button>
        </div>

    </form>

</div>
</div>
</div>
            
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

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="<?= base_url('supplier/addSpl'); ?>" method="post">
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="kodespl" name="kodespl" placeholder="Kode Supplier">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="namasupplier" name="namasupplier" placeholder="Nama Supplier">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
</div>
</div>
