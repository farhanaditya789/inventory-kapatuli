<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('supplier/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data Supplier</a>
            <a href="<?= base_url('supplier/print') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('supplier/pdf') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file"></i> Export Pdf</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name Supplier</th>
                        <th>Address Supplier</th>
                        <th>Phone Supplier</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($supplier as $spl) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $spl->name ?></td>
                            <td><?= $spl->address ?></td>
                            <td><?= $spl->phone ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $spl->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('supplier/delete/' . $spl->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Supplier Ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($supplier as $spl) { ?>
        <div class="modal fade" id="edit<?= $spl->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('supplier/edit/' . $spl->id) ?>" method="POST">
                            <div class="form-group">
                                <label>Name Supplier</label>
                                <input type="text" name="name" class="form-control" value="<?= $spl->name ?>">
                                <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Address Supplier</label>
                                <textarea name="address" class="form-control"><?= $spl->address ?></textarea>
                                <?= form_error('address', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Phone Supplier</label>
                                <input type="text" name="phone" class="form-control" value="<?= $spl->phone ?>">
                                <?= form_error('phone', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>