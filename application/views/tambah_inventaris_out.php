<div class="container-fluid">
    <form action="<?= base_url('inventaris_pendataan_out/tambah_aksi') ?>" method="POST">
        <div class="form-group">
            <label>Product ID</label>
            <select class="form-select" name="product_id" aria-label="Default select example">
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
            <?= form_error('product_id', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Merchant ID</label>
            <select class="form-select" name="merchant_id" aria-label="Default select example">
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
            <?= form_error('merchant_id', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>User ID</label>
            <select class="form-select" name="User_id" aria-label="Default select example">
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
            <?= form_error('user_id', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Date Delivery</label>
            <input type="date" name="date_received" class="form-control">
            <?= form_error('date_received', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Amount Delivered</label>
            <input type="text" name="amount_delivered" class="form-control">
            <?= form_error('amount_delivered', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> reset</button>
    </form>
</div>