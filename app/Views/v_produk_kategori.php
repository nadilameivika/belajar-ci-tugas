<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
if (session()->getFlashData('success')) { 
?>
    <div class="alert alert-info alert-dismissible fade show" role="alert"> 
        <?= session()->getFlashData('success') ?> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
    </div>
<?php
}
?>

<?php
if (session()->getFlashData('failed')) { 
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
        <?= session()->getFlashData('failed') ?> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
<?php
}
?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"> 
    Tambah Data
</button>

<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produkKategori as $index => $produk): ?> 
            <tr>
                <th scope="row"><?php echo $index + 1 ?></th> 
                <td><?php echo $produk['category_name'] ?></td> 
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produk['id'] ?>"> 
                        Ubah
                    </button>
                    <a href="<?= base_url('product-category/delete/' . $produk['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini?');"> 
                        Hapus
                    </a>
                </td>
            </tr>

            <div class="modal fade" id="editModal-<?= $produk['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header"> 
                            <h5 class="modal-title">Edit Data</h5> 
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
                        </div>
                        <form action="<?= base_url('product-category/edit/' . $produk['id']) ?>" method="post" enctype="multipart/form-data"> 
                            <?= csrf_field(); ?> 
                            <div class="modal-body"> 
                                <div class="form-group"> 
                                    <label for="nama">Nama</label> 
                                    <input type="text" name="category_name" class="form-control" id="nama" value="<?= $produk['category_name'] ?>" required> 
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
            <?php endforeach ?>
    </tbody>
</table>
<div class="modal fade" id="addModal" tabindex="-1"> 
    <div class="modal-dialog modal-dialog-centered"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title">Tambah Data</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
            </div>
            <form action="<?= base_url('product-category') ?>" method="post" enctype="multipart/form-data"> 
                <?= csrf_field(); ?> 
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label> 
                        <input type="text" name="category_name" class="form-control" id="nama" placeholder="Nama Kategori" required> 
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
<?= $this->endSection() ?>