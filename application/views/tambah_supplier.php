<div class="container-fluid">
    <form action="<?= base_url('supplier/tambah_aksi') ?>" method="POST">
        <div class="form-group">
            <label>Name Supplier</label>
            <input type="text" name="name" class="form-control">
            <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Address Supplier</label>
            <textarea name="address" class="form-control"></textarea>
            <?= form_error('address', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="form-group">
            <label>Phone Supplier</label>
            <input type="text" name="phone" class="form-control">
            <?= form_error('phone', '<div class="text-small text-danger">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> reset</button>
    </form>
</div>