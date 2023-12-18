<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>

    <!-- Page Heading -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>

    <!-- Content -->
    <div class="card">
        <!-- Card Header -->
        <div class="card-header text-right">
            <a href="<?= base_url('users/print') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('users/pdf') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file"></i> Export Pdf</a>
            <!-- <?php if ($this->session->userdata('roles_id') == 1) : ?>
            <a href="<?= base_url('users/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Users</a>
            <?php endif; ?> -->
        </div>
        
        <!-- Card Body -->
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Status</th>
                        <!-- <?php if ($this->session->userdata('roles_id') == 1) : ?>
                        <th>Action</th>
                        <?php endif; ?> -->
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($list_user as $usr) : ?>
                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $usr->name ?></td>
                            <td><?= $usr->email ?></td>
                            <td><?= $usr->address ?></td>
                            <td><?= $usr->phone ?></td>
                            <td><?= $usr->role_name ?></td>
                            <td>
                                <p class="<?= $usr->is_active == 1 ? 'badge badge-success' : 'badge badge-warning' ?>">
                                    <?= $usr->is_active == 1 ? 'ACTIVE' : 'INACTIVE' ?>
                                </p>
                            </td>
                            <!-- <?php if ($this->session->userdata('roles_id') == 1) : ?>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $usr->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('users/delete/' . $usr->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus User Ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                            <?php endif; ?> -->
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($list_user as $usr) { ?>
        <div class="modal fade" id="edit<?= $usr->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('products/edit/' . $usr->id) ?>" method="POST">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $usr->name ?>">
                                <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $usr->email ?>">
                                <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="<?= $usr->address ?>">
                                <?= form_error('address', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="<?= $usr->phone ?>">
                                <?= form_error('phone', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <!-- roles_id
                            is_active -->
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>