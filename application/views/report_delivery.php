<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('report_delivery/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Data Report Delivery</a>
            <a href="<?= base_url('report_delivery/print') ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print</a>
            <a href="<?= base_url('report_delivery/pdf') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file"></i> Export Pdf</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Stock Out ID</th>
                        <th>Date Delivery</th>
                        <th>Amount Delivery</th>
                        <th>Delivery Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($report_delivery as $rdy) : ?>
                    <tbody>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $rdy->stock_out_id ?></td>
                            <td><?= $rdy->date_delivery ?></td>
                            <td><?= $rdy->amount_delivery ?></td>
                            <td><?= $rdy->delivery_status ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#edit<?= $rdy->id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('report_delivery/delete/' . $rdy->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Supplier Ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($report_delivery as $rdy) { ?>
        <div class="modal fade" id="edit<?= $rdy->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('report_delivery/edit/' . $rdy->id) ?>" method="POST">
                            <div class="form-group">
                                <label>Stock Out ID</label>
                                <input type="text" name="stock_out_id" class="form-control" value="<?= $rdy->stock_out_id ?>">
                                <?= form_error('stock_out_id', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Date Delivery</label>
                                <input type="date" name="date_delivery" class="form-control" value="<?= $rdy->date_delivery ?>">
                                <?= form_error('date_delivery', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Amount Delivery</label>
                                <input type="text" name="amount_delivery" class="form-control" value="<?= $rdy->amount_delivery ?>">
                                <?= form_error('amount_delivery', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Delivery Status</label>
                                <input type="text" name="delivery_status" class="form-control" value="<?= $rdy->delivery_status ?>">
                                <?= form_error('delivery_status', '<div class="text-small text-danger">', '</div>'); ?>
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