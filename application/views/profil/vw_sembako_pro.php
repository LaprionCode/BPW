<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-6"><a href="<?= base_url() ?>Sembako/tambah" class="btn btn-info mb-2"> Tambah Sembako </a></div>
        <div class="col-md-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <?php $i = 1; ?>
        <?php foreach ($sembako as $us) : ?>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div><?= $us['nama'] ?></div>
                                <div class="tetxt-xs font-weight-bold text-gray-800">Rp.<?= $us['harga'] ?></div>
                                <div>Stok <a class="badge badge-info"><?= $us['stok'] ?></a></div>
                            </div>
                            <div class="col-auto">

                                <img src="<?= base_url('assets/img/sembako/') . $us['gambar']; ?>" style="width:100px" class="img-thumbnail">

                            </div>
                        </div>
                        <div class="align-items-center">

                            <a href="<?= base_url('Profil/keranjang/') . $us['id'] ?>" class="badge badge-warning badge-block">Beli</a>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
</div>














<!--
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

                    -->