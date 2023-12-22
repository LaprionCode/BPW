<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Prodi
                </div>
                <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $prodi['id']; ?>">
                        <div class="form-group">
                            <label for="prodi">Nama Prodi</label>
                            <input type="text" name="nama" value="<?= $prodi['nama']; ?>"
                            class="form-control" id="namap" placeholder="Nama Prodi">
                            <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nim">Ruangan</label>
                            <input type="text" name="ruangan" value="<?= $prodi['ruangan']; ?>"
                            class="form-control" id="ruangan" placeholder="Ruangan">
                            <?= form_error('ruangan','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" value="<?= $prodi['jurusan']; ?>"
                            class="form-control" id="jurusan" placeholder="Jurusan">
                            <?= form_error('jurusan','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="akreditasi">Akreditasi</label>
                            <input type="text" name="akreditasi" value="<?= $prodi['akreditasi']; ?>"
                            class="form-control" id="akreditasi" placeholder="Akreditasi ">
                            <?= form_error('akreditasi','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Kaprodi </label>
                            <input type="text" name="nama_kaprodi" value="<?= $prodi['nama_kaprodi']; ?>"
                            class="form-control" id="nama_kaprodi" placeholder="Nama Kaprodi">
                            <?= form_error('nama_kaprodi','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tahun_berdiri">Tahun Berdiri</label>
                            <input type="text" name="tahun_berdiri" value="<?= $prodi['tahun_berdiri']; ?>"
                            class="form-control" id="tahun" placeholder="Tahun Berdiri">
                            <?= form_error('tahun_berdiri','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="output">Output Lulusan</label>
                            <input type="text" name="output_lulusan" value="<?= $prodi['output_lulusan']; ?>"
                            class="form-control" id="output" placeholder="Output Lulusan">
                            <?= form_error('output_lulusan','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <img src="<?= base_url('assets/img/prodi/') . $prodi['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" id="gambar">
                            <label for="gambar" class="custom-file-label">Choose File</label>
                            <?= form_error('gambar','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <a href="<?= base_url('Prodi') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Prodi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>