<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('supplier_product/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data Supplier Product</a>
            <a href="<?= base_url('supplier_product/print') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('supplier_product/pdf') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file"></i> Export Pdf</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Name Product</th>
                        <th>Stock Product</th>
                        <th>Supplier ID</th>
                        <th>Expired</th>
                        <th>Date Received</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($supplier_product as $spl_p) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $spl_p->name_product ?></td>
                            <td><?= $spl_p->stock_product ?></td>
                            <td><?= $spl_p->supplier_id ?></td>
                            <td><?= $spl_p->qty ?></td>
                            <td><?= $spl_p->date_received ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $spl_p->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('supplier_product/delete/' . $spl_p->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Supplier Ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($supplier_product as $spl_p) { ?>
        <div class="modal fade" id="edit<?= $spl_p->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('supplier_product/edit/' . $spl_p->id) ?>" method="POST">
                            <div class="form-group">
                                <label>Name Supplier</label>
                                <input type="text" name="name_product" class="form-control" value="<?= $spl_p->name_product ?>">
                                <?= form_error('name_product', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Stock Supplie</label>
                                <input type="text" name="stock_product" class="form-control" value="<?= $spl_p->stock_product ?>">
                                <?= form_error('stock_product', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Supplier ID</label>
                                <input type="text" name="supplier_id" class="form-control" value="<?= $spl_p->supplier_id ?>">
                                <?= form_error('supplier_id', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Expired</label>
                                <input type="text" name="qty" class="form-control" value="<?= $spl_p->qty ?>">
                                <?= form_error('qty', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Date Received</label>
                                <input type="text" name="date_received" class="form-control" value="<?= $spl_p->date_received ?>">
                                <?= form_error('date_received', '<div class="text-small text-danger">', '</div>'); ?>
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