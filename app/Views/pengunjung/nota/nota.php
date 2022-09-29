<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- [ Main Content ] start -->

<!-- service section starts  -->

<section class="service">
    <h1 class="heading"><i class="fa fa-newspaper"></i> <span>Nota</span> Pembelian </h1>
    <div class="box-container">
    
        <div class="box">
            <!-- <i class="fas fa-shipping-fast"></i> -->
            <h3>Pembelian</h3>
            <p><strong class="mb-3">No. Pembelian : <?= $view_detail_pembelian->id_pembelian ;?></strong></p>
            <p> 
                Tanggal : <?= date('d-m-Y', strtotime($view_detail_pembelian->tanggal_pembelian)) ;?> <br>
                <strong>Total : Rp. <?= number_format($view_detail_pembelian->total_pembelian) ;?></strong>
            </p>
        </div>

        <div class="box">
            <!-- <i class="fas fa-undo"></i> -->
            <h3>Pelanggan</h3>
            <p><strong class="mb-3">Nama Lengkap : <?= $view_detail_pembelian->nama_pelanggan ;?></strong></p>
            <p>
                No. Hp : <?= $view_detail_pembelian->telepon_pelanggan ;?> <br>
                Alamat : <?= $view_detail_pembelian->email_pelanggan ;?>
            </p>
        </div>

        <div class="box">
            <!-- <i class="fas fa-headset"></i> -->
            <h3>Pengiriman</h3>
            <p><strong class="mb-3">Kota : <?= $view_detail_pembelian->nama_kabupaten ;?></strong></p>
            <p> 
                Ongkos kirim : Rp. <?= number_format($view_detail_pembelian->tarif) ;?> <br>
                Alamat : <?= $view_detail_pembelian->alamat_pengiriman ;?> <br>
                Metode pembayaran : <?= $view_detail_pembelian->metode_pembayaran ;?>
            </p>
        </div>

    </div>

</section>

<section class="service">

    <div class="box-container">
    
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama produk</th>
                    <th>Harga produk</th>
                    <th>Berat produk</th>
                    <th>Jumlah produk</th>
                    <th>Subberat produk</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ;?>
                <?php foreach ($view_detail_pembelian_produk as $vdpp) : ?>
                <tr>
                    <td data-label="No"><?= $no ;?></td>
                    <td data-label="Nama Produk"><?= $vdpp['nama'] ;?></td>
                    <td data-label="Harga Produk">Rp. <?= number_format($vdpp['harga']) ;?></td>
                    <td data-label="Berat Produk"><?= $vdpp['berat'] ;?> Gr.</td>
                    <td data-label="Jumlah Produk"><?= $vdpp['jumlah_produk'] ;?></td>
                    <td data-label="Subberat Produk"><?= $vdpp['subberat'] ;?> Gr.</td>
                    <td data-label="Subtotal">Rp. <?= number_format($vdpp['subharga']) ;?></td>
                </tr>
                <?php $no++ ;?>
                <?php endforeach ;?>
            </tbody>
        </table>

        

    </div>

    <div class="row" style="font-size: 14px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <!-- jika metode pembayaran = COD maka tampilkan alert info -->
                <?php if ($view_detail_pembelian->metode_pembayaran == 'COD') : ?>

                <div class="alert alert-info">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        <strong>Metode pembayaran : <?= $view_detail_pembelian->metode_pembayaran ;?></strong>
                        <br>
                        <br>
                        <!-- pesan untuk menunggu barang dikirm dan bayar sama kurir -->
                        <strong>Pesanan akan dikirim dan mohon sediakan dananya untuk melakukan pembayaran ke kurir kami <br> Terima kasih telah berbelanja di toko kami.</strong> <br> <br>
                        
                        <!-- button riwayat belanja -->
                        <a href="<?= htmlentities(base_url('/riwayat')) ;?>" class="btn btn-primary btn-lg">Riwayat Belanja</a>
                    </p>
                </div>

                <?php else : ?>

                <div class="alert alert-info">
                    <p>
                        <i class="fas fa-info-circle"></i>
                        <strong>Metode pembayaran : <?= $view_detail_pembelian->metode_pembayaran ;?></strong>
                        <br>
                        <br>
                        <!-- silahkan melakukan pembayaran  -->
                        <strong>Silahkan melakukan pembayaran ke rekening kami <br>
                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <img src="<?= base_url('/admin/dist/assets/images/logo_bank/bca.jpg') ;?>" class="img-fluid rounded-start" alt="logo-bca">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title"><strong>Bank BCA</strong></h5>
                                                <p class="card-text">No. Rekening : 088-8-8-8888-8888-8</p>
                                                <p class="card-text"><small class="text-muted">Atas Nama : PT. Toko Online</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <img src="<?= base_url('/admin/dist/assets/images/logo_bank/bri.jpg') ;?>" class="img-fluid rounded-start" alt="logo-bni">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title"><strong>Bank BRI</strong></h5>
                                                <p class="card-text">No. Rekening : 088-8-8-8888-8888-8</p>
                                                <p class="card-text"><small class="text-muted">Atas Nama : PT. Toko Online</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <img src="<?= base_url('/admin/dist/assets/images/logo_bank/mandiri.jpg') ;?>" class="img-fluid rounded-start" alt="logo-mandiri">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="card-title"><strong>Bank Mandiri</strong></h5>
                                                <p class="card-text">No. Rekening : 088-8-8-8888-8888-8</p>
                                                <p class="card-text"><small class="text-muted">Atas Nama : PT. Toko Online</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <hr>
                        <strong>Untuk melanjutkan pembayaran, silahkan klik tombol di bawah ini.</strong> <br>  
                        
                        <div class="row">
                            <div class="col-md-4">
                                <a href="<?= htmlentities(base_url('/')) ;?>" class="btn btn-primary btn-lg">Lanjutkan Belanja</a>
                                <a href="<?= htmlentities(base_url('/riwayat')) ;?>" class="btn btn-primary btn-lg">Riwayat Belanja</a>
                            </div>
                            <div class="col-md-2">
                                
                            </div>
                        </div>
                    </p>

                <?php endif ;?>
            </div>
        </div>

</section>

<!-- service section ends -->

<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
