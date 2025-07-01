<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-body pt-4"> <!-- Menambahkan padding top agar tidak terlalu mepet -->
        
        <!-- Menampilkan pesan validasi error jika ada -->
        <?php
        $errors = session()->getFlashdata('errors');
        if ($errors) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            echo '<strong>Gagal!</strong> Terjadi kesalahan validasi:<br>';
            foreach ($errors as $error) {
                echo esc($error) . '<br>';
            }
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
        ?>

        <!-- Menampilkan pesan sukses jika ada -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Tombol untuk memicu modal "Tambah Data" -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            Tambah Data
        </button>

        <!-- Tabel untuk menampilkan data diskon -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nominal (Rp)</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (!empty($diskons)) :
                    foreach ($diskons as $diskon) :
                ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $diskon->tanggal ?></td>
                            <td><?= number_to_currency($diskon->nominal, 'IDR') ?></td>
                            <td>
                                <!-- Tombol Ubah yang memicu modal edit -->
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-<?= $diskon->id ?>">
                                    Ubah
                                </button>
                                <a href="<?= base_url('diskon/delete/' . $diskon->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>

                        <!-- MODAL EDIT (diletakkan di dalam loop foreach) -->
                        <div class="modal fade" id="editModal-<?= $diskon->id ?>" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('diskon/update/' . $diskon->id) ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label for="tanggal">Tanggal</label>
                                                <!-- Input tanggal dibuat readonly sesuai soal -->
                                                <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $diskon->tanggal ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <!-- ===== BAGIAN YANG DIUBAH ===== -->
                                                <label for="nominal">Diskon (Rp)</label>
                                                <!-- =============================== -->
                                                <input type="number" name="nominal" class="form-control" id="nominal" value="<?= $diskon->nominal ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit -->
                <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>


<!-- MODAL TAMBAH DATA (diletakkan di luar loop) -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Diskon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('diskon/create') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal (Rp)</label>
                        <input type="number" name="nominal" class="form-control" id="nominal" placeholder="Contoh: 100000" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->

<?= $this->endSection() ?>