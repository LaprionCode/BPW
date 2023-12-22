<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url() ?>Sembako/tambah" class="btn btn-info mb-2"> Tambah Sembako </a></div>
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Gambar</td>
                        <td>Nama</td>
                        <td>Stok</td>
                        <td>Harga</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                   <?php $i = 1; ?>
                    <?php foreach ($sembako as $us) : ?>
                    <tr>
                        <td><?= $i; ?>.</td>
                        <td><img src="<?= base_url("/assets/img/sembako/") . $us['gambar']; ?>" style="width:100px;" class="img-thumbnail"></td>
                        <td><?= $us['nama']; ?></td>
                        <td><?= $us['stok']; ?></td>
                        <td><?= $us['harga']; ?></td>
                        <td>
                        <a href="<?= base_url('Sembako/hapus/') . $us['id']; ?>" class="badge badge-danger">Hapus</a>
                        <a href="<?= base_url('Sembako/edit/') . $us['id']; ?>" class="badge badge-warning">Edit</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
