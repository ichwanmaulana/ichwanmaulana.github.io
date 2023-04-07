<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2><?= $title; ?></h2>

            <form action="/crud/update/<?= $crud['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $crud['nama']  ?>" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $crud['alamat']  ?>">
                    </div>
                </div>

                <button type=" submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>