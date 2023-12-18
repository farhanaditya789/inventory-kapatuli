<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('inventaris_pendataan_out/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data Inventaris Out</a>
            <a href="<?= base_url('inventaris_pendataan_out/print') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('inventaris_pendataan_out/pdf') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file"></i> Export Pdf</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Product ID</th>
                        <th>Merchant ID</th>
                        <th>User ID</th>
                        <th>Date Delivery</th>
                        <th>Amount Delivery</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($inventaris_pendataan_out as $ivt_po) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $ivt_po->product_id ?></td>
                            <td><?= $ivt_po->merchant_id ?></td>
                            <td><?= $ivt_po->user_id ?></td>
                            <td><?= $ivt_po->date_delivery ?></td>
                            <td><?= $ivt_po->amount_delivered ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $ivt_po->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('inventaris_pendataan_out/delete/' . $ivt_po->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Inventaris Ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($inventaris_pendataan_out as $ivt_po) { ?>
        <div class="modal fade" id="edit<?= $ivt_po->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Inventaris</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('inventaris_pendataan_out/edit/' . $ivt_po->id) ?>" method="POST">
                            <div class="form-group">
                                <label>Product ID</label>
                                <input type="text" name="product_id" class="form-control" value="<?= $ivt_po->product_id ?>">
                                <?= form_error('product_id', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Merchant ID</label>
                                <input type="text" name="merchant_id" class="form-control" value="<?= $ivt_po->merchant_id ?>">
                                <?= form_error('merchant_id', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>User ID</label>
                                <input type="text" name="user_id" class="form-control" value="<?= $ivt_po->user_id ?>">
                                <?= form_error('user_id', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Date Delivery</label>
                                <input type="text" name="date_delivery" class="form-control" value="<?= $ivt_po->date_delivery ?>">
                                <?= form_error('date_delivery', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Amount Delivered</label>
                                <input type="text" name="amount_delivered" class="form-control" value="<?= $ivt_po->amount_delivered ?>">
                                <?= form_error('amount_delivered', '<div class="text-small text-danger">', '</div>'); ?>
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