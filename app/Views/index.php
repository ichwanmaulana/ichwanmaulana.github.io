<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">

            <h1 class="mb-3"><?= $title; ?></h1>
            <a href="/crud/create" class="btn btn-primary mb-3">Tambah Data</a>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($crud as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $c['nama']; ?></td>
                            <td><?= $c['alamat']; ?></td>
                            <td>
                                <a href="/crud/edit/<?= $c['id']; ?>" class="btn btn-success">Update</a>
                                <form action="/crud/<?= $c['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin mau menghapus?'); ">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>