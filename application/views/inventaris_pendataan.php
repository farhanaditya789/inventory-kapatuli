<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('inventaris_pendataan/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data Inventaris In</a>
            <a href="<?= base_url('inventaris_pendataan/print') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('inventaris_pendataan/pdf') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file"></i> Export Pdf</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Product ID</th>
                        <th>Supplier ID</th>
                        <th>Supplier Product ID</th>
                        <th>Stock</th>
                        <th>Date Received</th>
                        <th>Total Received</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($inventaris_pendataan as $ivt_p) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $ivt_p->product_id ?></td>
                            <td><?= $ivt_p->supplier_id ?></td>
                            <td><?= $ivt_p->supplier_product_id ?></td>
                            <td><?= $ivt_p->stock ?></td>
                            <td><?= $ivt_p->date_received ?></td>
                            <td><?= $ivt_p->total_received ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $ivt_p->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('inventaris_pendataan/delete/' . $ivt_p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Inventaris Ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($inventaris_pendataan as $ivt_p) { ?>
        <div class="modal fade" id="edit<?= $ivt_p->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Inventaris</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('inventaris_pendataan/edit/' . $ivt_p->id) ?>" method="POST">
                            <div class="form-group">
                                <label>Product ID</label>
                                <input type="text" name="product_id" class="form-control" value="<?= $ivt_p->product_id ?>">
                                <?= form_error('product_id', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Supplier ID</label>
                                <input type="text" name="supplier_id" class="form-control" value="<?= $ivt_p->supplier_id ?>">
                                <?= form_error('supplier_id', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Supplier Product ID</label>
                                <input type="text" name="supplier_product_id" class="form-control" value="<?= $ivt_p->supplier_product_id ?>">
                                <?= form_error('supplier_product_id', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" name="stock" class="form-control" value="<?= $ivt_p->stock ?>">
                                <?= form_error('stock', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Date Received</label>
                                <input type="text" name="date_received" class="form-control" value="<?= $ivt_p->date_received ?>">
                                <?= form_error('date_received', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Total Received</label>
                                <input type="text" name="total_received" class="form-control" value="<?= $ivt_p->total_received ?>">
                                <?= form_error('total_received', '<div class="text-small text-danger">', '</div>'); ?>
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