<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .table-aksi {
        font-size: 13px; /* Ukuran font lebih kecil untuk tombol */
        white-space: nowrap; /* Mencegah tombol turun baris */
    }
    .table-status {
        font-size: 14px; /* Ukuran font normal untuk status */
        white-space: nowrap; /* Mencegah status turun baris */
    }
</style>

<div class="card">
    <!-- Bagian card-header yang berisi judul "Pembelian" sudah dihapus -->
    <div class="card-body pt-4">
        
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Pembelian</th>
                        <th scope="col">Username</th>
                        <th scope="col">Waktu Pembelian</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (!empty($pembelian)) :
                        foreach ($pembelian as $item) :
                    ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['username'] ?></td>
                                <td style="white-space: nowrap;"><?= $item['created_at'] ?></td>
                                <td style="white-space: nowrap;"><?= number_to_currency($item['total_harga'], 'IDR') ?></td>
                                <td><?= $item['alamat'] ?></td>
                                
                                <td class="table-status">
                                    <?php if ($item['status'] == 0) : ?>
                                        <span class="text-danger">Belum Selesai</span>
                                    <?php else : ?>
                                        <span class="text-success">Sudah Selesai</span>
                                    <?php endif; ?>
                                </td>
                                
                                <td class="table-aksi">
                                    <div class="d-flex">
                                        <form action="<?= base_url('pembelian/update-status/' . $item['id']) ?>" method="post" class="me-1">
                                            <?= csrf_field(); ?>
                                            <button type="submit" class="btn btn-warning btn-sm">Ubah Status</button>
                                        </form>
                                        <a href="#" class="btn btn-success btn-sm">Detail</a>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>