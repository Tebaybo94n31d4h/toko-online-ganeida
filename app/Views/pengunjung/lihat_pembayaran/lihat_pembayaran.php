<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- [ Main Content ] start -->

<!-- service section starts  -->

<section class="service">
    <h1 class="heading"><i class="fa fa-newspaper"></i> <span>Lihat</span> Pembayaran </h1>
    <style>
        .card {
            font-size: 14px
        }
        .card-header {
            font-size: 16px;
        }
        .card-title {
            font-size: 16px;
            font-weight: bold;
        }
        .card-body input {
            font-size: 14px;
        }
    </style>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
            <div class="card text-center">
                <div class="card-header">
                    Profile
                </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <img class="img-fluid img-thumbnail" style="border-radius: 50%;margin-bottom: 10px;" width="150" src="<?= base_url('/admin/dist/assets/images/user/' . $datapembelian->image_pelanggan) ;?>" alt="">
                        </h5>
                    <h3 class="card-title"><?= $datapembelian->nama_pelanggan ;?></h5>
                    <p class="card-text"><?= $datapembelian->email_pelanggan ;?></p>
                    <p class="card-text"><?= $datapembelian->alamat_pelanggan ;?></p>
                    <p class="card-text"><?= $datapembelian->telepon_pelanggan ;?></p>
                    <img class="back-img" width="250" src="<?= base_url('/admin/dist/assets/images/browser/pay1.png') ;?>" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-8">
            <div class="card">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="card-header">
                            Bukti Pembayaran Anda
                        </div>
                        <div class="card-body"
                            <p class="card-text">
                                <?= $datapembayaran->nama_lengkap ;?>
                            </p>
                            <p class="card-text">
                                <?= $datapembayaran->bank ;?>
                            </p>
                            <p class="card-text">
                                Rp. <?= number_format($datapembayaran->jumlah) ;?>
                            </p>
                            <p class="card-text">
                                <?= $datapembayaran->tanggal_pembayaran ;?>
                            </p>
                            <p class="card-text badge badge-success text-dark">
                                <!-- icon check -->
                                <i class="fa fa-check"></i>
                                <?= $datapembayaran->status_pembelian ;?>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="card-header">
                            Foto Bukti Pembayaran Anda
                        </div>
                         <div class="card-body">
                            <!-- foto bukti -->
                            <img class="img-fluid img-thumbnail" width="350" src="<?= base_url('/admin/dist/assets/images/bukti_pembayaran/' . $datapembayaran->bukti_pembayaran) ;?>" alt="">
                         </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>

</section>

<!-- service section ends -->

<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
