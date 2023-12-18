<div class="container-fluid">
    <form action="<?= base_url('report_delivery/tambah_aksi') ?>" method="POST">
        <div class="form-group">
            <label>Stock Out ID</label>
            <select class="form-select" name="stock_out_id" aria-label="Default select example">
                <option selected>Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <?= form_error('stock_out_id', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Date Delivery</label>
            <input type="date" name="date_delivery" class="form-control">
            <?= form_error('date_delivery', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Amount Delivery</label>
            <input type="text" name="amount_delivery" class="form-control">
            <?= form_error('amount_delivery', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Delivery Status</label>
            <input type="text" name="delivery_status" class="form-control">
            <?= form_error('delivery_status', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> reset</button>
    </form>
</div>