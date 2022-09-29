<?= $this->extend('general-admin/default') ?>

<?= $this->section('content') ?>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-left">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Customer</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ;?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ;?>">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Data Detail Pembelian</h5>
                    </div>
                    <div class="card-body table-border-style table-responsive">
                        <div class="row mb-3">
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <strong>Pembelian</strong>
                                <p> <br> No. Pembelian : <?= $view_detail_pembelian->id_pembelian ;?></p>
                                <p>
                                    Tanggal pembelian :
                                    <?= date('d-m-Y', strtotime($view_detail_pembelian->tanggal_pembelian)) ;?>  <br>
                                    Total pembelian : 
                                    Rp. <?= number_format($view_detail_pembelian->total_pembelian) ;?>
                                </p>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <strong>Pelanggan</strong>
                                <p> <br> Nama Lengkap : <?= $view_detail_pembelian->nama_pelanggan ;?> </p>
                                <p>
                                    No. Hp : <?= $view_detail_pembelian->telepon_pelanggan ;?> <br>
                                    Email : <?= $view_detail_pembelian->email_pelanggan ;?>
                                </p>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                <strong>Pengiriman</strong>
                                <p> <br> Kota : <?= $view_detail_pembelian->nama_kabupaten ;?> </p>
                                <p>
                                    Ongkos Kirim : Rp. <?= number_format($view_detail_pembelian->tarif) ;?> <br>
                                    Alamat : <?= $view_detail_pembelian->alamat_pengiriman ;?>
                                </p>
                            </div>
                        </div>

                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama produk</th>
                                    <th>Harga produk</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ;?>
                                <?php foreach ($view_detail_pembelian_produk as $vdpp) : ?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td><?= $vdpp['nama_produk'] ;?></td>
                                    <td>Rp. <?= number_format($vdpp['harga_produk']) ;?></td>
                                    <td><?= $vdpp['jumlah_produk'] ;?></td>
                                    <td>Rp. <?= number_format($vdpp['harga_produk'] * $vdpp['jumlah_produk']) ;?></td>
                                </tr>
                                <?php $no++ ;?>
                                <?php endforeach ;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
    
<?= $this->endSection() ?>