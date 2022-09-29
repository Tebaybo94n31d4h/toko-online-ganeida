<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            
            <div class="">
                <div class="main-menu-header">
                    <?php 
                    
                    $email = session()->email;
                    // db connection
                    $db = \Config\Database::connect();
                    $query = $db->query("SELECT * FROM admin WHERE email = '$email'");
                    $profile = $query->getRow();
                    
                    ;?>
                    <img class="img-radius" src="<?= base_url('/admin/dist/assets/images/user/' . $profile->image) ;?>" alt="User-Profile-Image">
                    <div class="user-details mt-2">
                        <div id="more-details"> <a href="<?= base_url('/dashboard') ;?>"><b>Ganeida</b> Toko</a> </div>
                    </div>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Dashboard</label>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/dashboard') ;?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Master</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Master</span></a>
                    <ul class="pcoded-submenu">
                        <!-- <li><a href="auth-signup.html">Kota</a></li>
                        <li><a href="auth-signin.html">Provinsi</a></li> -->
                        <li><a href="<?= base_url('/produk') ;?>">Produk</a></li>
                        <li><a href="<?= base_url('/kategori') ;?>">Kategori Produk</a></li>
                        <li><a href="<?= base_url('/kategori_pilihan') ;?>">Kategori Pilihan</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Customer</label>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/pembelian') ;?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Pembelian</span></a>
                </li>
                <li class="nav-item">
                    <a href="/laporan" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Laporan</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/pelanggan') ;?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Pelanggan</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>