<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="<?= base_url('/') ?>">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Home Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="<?= base_url('keranjang') ?>">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li><!-- End Keranjang Nav -->

        <!-- ========== HANYA UNTUK ADMIN ========== -->
        <?php if (session()->get('role') == 'admin') : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="<?= base_url('produk') ?>">
                    <i class="bi bi-receipt"></i>
                    <span>Produk</span>
                </a>
            </li><!-- End Produk Nav -->

            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'product-category') ? "" : "collapsed" ?>" href="<?= base_url('product-category') ?>">
                    <i class="bi bi-tag"></i> <span>Kategori Produk</span>
                </a>
            </li><!-- End Kategori Produk Nav -->

            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'diskon') ? "" : "collapsed" ?>" href="<?= base_url('diskon') ?>">
                    <i class="bi bi-tag"></i> <span>Diskon</span>
                </a>
            </li><!-- End Diskon Nav -->

             <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'pembelian') ? "" : "collapsed" ?>" href="<?= base_url('pembelian') ?>">
                    <i class="bi bi-wallet2"></i> <span>Pembelian</span>
                </a>
            </li><!-- End Pembelian Nav -->
        <?php endif; ?>
        <!-- ====================================== -->


        <!-- ========== UNTUK SEMUA USER (TERMASUK GUEST) ========== -->
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'profile') ? "" : "collapsed" ?>" href="<?= base_url('profile') ?>">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'faq') ? "" : "collapsed" ?>" href="<?= base_url('faq') ?>">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li><!-- End FAQ Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'contact') ? "" : "collapsed" ?>" href="<?= base_url('contact') ?>">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Nav -->
        <!-- ======================================================= -->

    </ul>

</aside><!-- End Sidebar-->