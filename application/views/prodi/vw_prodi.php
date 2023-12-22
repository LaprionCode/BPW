<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul;?></h1>
    <div class="col-md-6"><a href="<?= base_url() ?>index.php/Prodi/tambah" class="btn btn-info mb-2">Tambah Prodi</a></div>
    <div class="col-md-12">
    <?= $this->session->flashdata('message'); ?>
        <table class="table">
            <thead>
                <tr>
                        <td>ID prodi</td>
                        <td>Nama Prodi</td>
                        <td>Ruangan</td>
                        <td>Jurusan</td>
                        <td>Akreditasi</td>
                        <td>Nama Kaprodi</td>
                        <td>Tahun Berdiri</td>
                        <td>Output Jurusan</td>
                        <td>Gambar</td>
                        <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($prodi as $pr) : ?>
                    <tr> 
                        <td> <?= $i; ?>.</td>
                        <td> <?= $pr ['nama']; ?>.</td>
                        <td> <?= $pr ['ruangan']; ?>.</td>
                        <td> <?= $pr ['jurusan']; ?>.</td>
                        <td> <?= $pr ['akreditasi']; ?>.</td>
                        <td> <?= $pr ['nama_kaprodi']; ?>.</td>
                        <td> <?= $pr ['tahun_berdiri']; ?>.</td>
                        <td> <?= $pr ['output_lulusan']; ?>.</td>
                        <td> <img src="<?= base_url('assets/img/prodi/') .$pr['gambar']; ?>" style="width: 100px;" class="img-thumbnail"></td>

                        <td>
                        <a href="<?= base_url('prodi/edit/') .$pr['id']; ?>" class="badge badge-warning">edit</a>
                        <a href="<?= base_url('prodi/hapus/') .$pr['id']; ?>" class="badge badge-danger">hapus</a>
                        
                         </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
