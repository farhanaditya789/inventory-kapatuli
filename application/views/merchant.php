<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('merchant/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data Merchant</a>
            <a href="<?= base_url('merchatn/print') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('merchant/pdf') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file"></i> Export Pdf</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name Merchant</th>
                        <th>Address Merchant</th>
                        <th>Phone Merchant</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($merchant as $mrc) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $mrc->name ?></td>
                            <td><?= $mrc->address ?></td>
                            <td><?= $mrc->phone ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $mrc->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('merchant/delete/' . $mrc->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Merchant Ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($merchant as $mrc) { ?>
        <div class="modal fade" id="edit<?= $mrc->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Merchant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('merchant/edit/' . $mrc->id) ?>" method="POST">
                            <div class="form-group">
                                <label>Name Merchant</label>
                                <input type="text" name="name" class="form-control" value="<?= $mrc->name ?>">
                                <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Address Merchant</label>
                                <textarea name="address" class="form-control"><?= $mrc->address ?></textarea>
                                <?= form_error('address', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Phone Merchant</label>
                                <input type="text" name="phone" class="form-control" value="<?= $mrc->phone ?>">
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