<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('products/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data Product</a>
            <a href="<?= base_url('products/print') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('products/pdf') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file"></i> Export Pdf</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name Product</th>
                        <th>Stock Product</th>
                        <th>Expired Product</th>
                        <th>Production Date</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($products as $pdt) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $pdt->name ?></td>
                            <td><?= $pdt->stock ?></td>
                            <td><?= $pdt->exp_date ?></td>
                            <td><?= $pdt->production_date ?></td>

                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $pdt->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('products/delete/' . $pdt->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Product Ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($products as $pdt) { ?>
        <div class="modal fade" id="edit<?= $pdt->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('products/edit/' . $pdt->id) ?>" method="POST">
                            <div class="form-group">
                                <label>Name Product</label>
                                <input type="text" name="name" class="form-control" value="<?= $pdt->name ?>">
                                <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Stock Product</label>
                                <input type="text" name="stock" class="form-control" value="<?= $pdt->stock ?>">
                                <?= form_error('stock', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Expired Product</label>
                                <input type="date" name="exp_date" class="form-control" value="<?= $pdt->exp_date ?>">
                                <?= form_error('exp_date', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Production Date</label>
                                <input type="text" name="production_date" class="form-control" value="<?= $pdt->production_date ?>">
                                <?= form_error('production_date', '<div class="text-small text-danger">', '</div>'); ?>
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