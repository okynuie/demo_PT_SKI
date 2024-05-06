 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>

            <?= $this->session->flashdata('message'); ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">List of Sub Menu</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th>URL</th>
                                    <th>Icon</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach($submenu as $sm) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $sm['title'];?></td>
                                    <td><?php foreach ($menu as $m) : ?>
                                    <?php if($m['id']==$sm['menu_id']){ echo($m['menu']);}  ?>
                                      <?php endforeach; ?>
                                    </td>
                                    <td><?= $sm['url']; ?></td>
                                    <td><?= $sm['icon']; ?></td>
                                    <td><?php
                                      if($sm['is_active'] == 1){
                                        echo('<span class="badge badge-success">Active</span>');
                                      }else{
                                        echo('<span class="badge badge-warning">Not Active</span>');
                                      } ?></td>
                                    <td>
                                      <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editSubMenuModal<?= $sm['id'];?>">Edit</a>
                                      <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteSubModal<?= $sm['id']; ?>">Delete</a></td>
                                </tr>

<!-- Modal Edit Menu-->
<div class="modal fade" id="editSubMenuModal<?= $sm['id'];?>" tabindex="-1" aria-labelledby="tambahSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSubMenuModalLabel">Add Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('admin/menu/editSubMenu/'.$sm['id']); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value=""></option>
                            <?php foreach ($menu as $m) : ?>
                                <option value=""<?php if($m['id']==$sm['menu_id']){ echo('selected'); } ?>><?= $m['menu'];  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Url -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                    </div>

                    <!-- Icon -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                    </div>

                    <!-- Is active -->
                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" <?php if($sm['is_active'] == 1)
                        {
                            echo ('checked');
                        } ?>>
                            <label class="form-check-label" for="is_active">
                                Aktif?
                            </label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal delete subMenu-->
<div class="modal fade" id="deleteSubModal<?= $sm['id'];?>" tabindex="-1" aria-labelledby="tambahMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="tambahMenuModalLabel">Delete Sub Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <form action="<?= base_url('admin/menu/deleteSubMenu/'.$sm['id']); ?>" method="post">
              <div class="modal-body">
                  <p>Are you sure want to delete <span style="font-weight:bold; color:black"><?= $sm['title']; ?></span> as a sub menu?</p>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('setting/addSubmenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
