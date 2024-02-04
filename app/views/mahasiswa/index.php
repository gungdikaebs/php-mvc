<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-outline-primary" type="submit" id="cari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php
                foreach ($data['mhs'] as $mhs) :
                ?>
                    <li class="list-group-item ">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id_mahasiswa']; ?>" class="badge text-bg-danger mx-1 float-end" onclick="confirm('yakin ingin menghapus?')">hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/update/<?= $mhs['id_mahasiswa']; ?>" class="badge text-bg-success mx-1 float-end tampilModalUpdate" data-id='<?= $mhs['id_mahasiswa']; ?>' data-bs-toggle="modal" data-bs-target="#formModal">Update</a>
                        <a href=" <?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id_mahasiswa']; ?>" class="badge text-bg-primary mx-1 float-end ">Selengkapnya</a>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formModalLabel">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_mahasiswa" id="id">
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama </label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="nrp" class="form-label">Nim </label>
                            <input type="number" class="form-control" id="nim" name="nim" placeholder="nim">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-select" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Sistem Komputer">Sistem Komputer</option>
                            <option value="Bisnis Digital">Bisnis Digital</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>