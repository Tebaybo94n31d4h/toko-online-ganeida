<header class="header">

    <a style="text-decoration: none;" href="<?= htmlentities(base_url('/')) ;?>" class="logo"> Ganeida<strong>Toko</strong> </a>

    <nav class="navbar">
        <ul>
            <li><a href="<?= htmlentities(base_url('/')) ;?>" style="text-decoration: none;border-style: none;">Beranda</a></li>
            
            <li><a href="<?= base_url('/home/produk') ;?>" style="text-decoration: none;border-style: none;">produk</a></li>
            <?php if (session()->email_pelanggan) :?>
                <li><a href="<?= htmlentities(base_url('/checkout')) ;?>" style="text-decoration: none;border-style: none;">Checkout</a></li>
                <li><a href="<?= htmlentities(base_url('/riwayat')) ;?>" style="text-decoration: none;border-style: none;">Riwayat</a></li>
            <?php endif ;?>
            
            <?php if (session()->email_pelanggan) :?>
                <li><a href="<?= htmlentities(base_url('auth/logout')) ;?>" style="text-decoration: none;border-style: none;">Logout</a></li>
            <?php else :?>
                <li><a href="#" style="text-decoration: none;border-style: none;">Akun +</a>
                    <ul>
                        <li><a href="<?= htmlentities(base_url('/auth')) ;?>" style="text-decoration: none;border-style: none;">Masuk</a></li>
                        <li><a href="<?= htmlentities(base_url('/auth/register')) ;?>" style="text-decoration: none;border-style: none;">Daftar</a></li>
                    </ul>
                </li>
            <?php endif ;?>
            
        </ul>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search fs-2"></div>
        <a style="text-decoration: none;" href="<?= htmlentities(base_url('/keranjang')) ;?>" class="fas fa-shopping-cart position-relative fs-2">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 8px;">
               <?php if (isset($_SESSION['keranjang'])) : ?>
                    <?php echo count($_SESSION['keranjang']) ;?>
                <?php else : ?>
                    0
                <?php endif ;?>
            </span>
        </a>
        <?php if (session()->email_pelanggan) :?>
            <a href="#" class="user-profile" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <!-- icon user -->
                    <i class="fas fa-user"></i>
            </a>
        <?php endif ;?>
    </div>

    <form action="<?= base_url('/home/hasil_pencarian') ;?>" class="search-form" method="post">
        <?= csrf_field() ;?>
        <input type="search" name="search_produk" placeholder="Cari disini..." id="search-box">
        <button type="submit" class="fas fa-search fs-1 text-danger bg-transparent"></button>
    </form>

</header>
