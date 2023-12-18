<div class="container-fluid">
    <form action="<?= base_url('products/tambah_aksi') ?>" method="POST">
        <div class="form-group">
            <label>Name Product</label>
            <input type="text" name="name" class="form-control">
            <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Stock Product</label>
            <input type="text" name="stock" class="form-control">
            <?= form_error('stock', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Expired Product</label>
            <input type="date" name="exp_date" class="form-control">
            <?= form_error('exp_date', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Production Product</label>
            <input type="date" name="production_date" class="form-control">
            <?= form_error('production_date', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> reset</button>
    </form>
</div>