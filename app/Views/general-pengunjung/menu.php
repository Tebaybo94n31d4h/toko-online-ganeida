<nav class="pcoded-navbar theme-horizontal menu-light brand-blue">
    <div class="navbar-wrapper container">
        <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
            <ul class="nav pcoded-inner-navbar sidenav-inner">
                
                <?php if (session()->logged_in) :?>
                    <li class="nav-item" style="text-decoration: none;border-style: none;">
                        <a style="text-decoration: none;border-style: none;" href="<?= htmlentities(base_url('/checkout')) ;?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Checkout</span></a>
                    </li>
                    <li class="nav-item">
                        <a style="text-decoration: none;" href="<?= htmlentities(base_url('home/riwayat')) ;?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-clipboard"></i></span><span class="pcoded-mtext">Riwayat</span></a>
                    </li>
                    <li class="nav-item">
                        <a style="text-decoration: none;" href="<?= htmlentities(base_url('auth/logout')) ;?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-log-out"></i></span><span class="pcoded-mtext">Logout</span></a>
                    </li>
                <?php else :?>
                    <li class="nav-item">
                        <a style="text-decoration: none;" href="<?= htmlentities(base_url('auth/register')) ;?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Daftar</span></a>
                    </li>
                    <li class="nav-item">
                        <a style="text-decoration: none;" href="<?= htmlentities(base_url('/auth')) ;?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Login</span></a>
                    </li>
                <?php endif ;?>

            </ul>
        </div>
    </div>
</nav>