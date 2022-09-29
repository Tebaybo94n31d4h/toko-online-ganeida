<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- [ Main Content ] start -->

<!-- service section starts  -->

<section class="service">
    <h1 class="heading"><i class="fa fa-newspaper"></i> <span>Konfirmasi</span> Pembayaran </h1>
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
                <div class="card-header">
                    Kirim Bukti Pembayaran Anda Disini
                </div>
                <div class="card-body">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                        <div>
                            <span>Total Tagihan Anda <strong>Rp. <?= number_format($datapembelian->total_pembelian) ;?></strong> </span>
                        </div>
                    </div>

                    <form action="<?= base_url('pembayaran/proses_pembayaran') ;?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ;?>
                        <input type="hidden" name="_method" value="PUT" />

                        <div class="mb-3">
                            <input type="hidden" name="id_pembelian" value="<?= $datapembelian->id_pembelian ;?>">
                            <label for="nama_lengkap" class="form-label">Nama Penyetor</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" placeholder="Nama penyetor" aria-describedby="helpId">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_lengkap'); ?>
                            </div>
                        </div>  
                        <div class="mb-3">
                            <label for="bank" class="form-label">Bank</label>
                            <input type="text" name="bank" id="bank" class="form-control <?= ($validation->hasError('bank')) ? 'is-invalid' : ''; ?>" placeholder="Nama Bank Ex: Bank Papua" aria-describedby="helpId">
                            <div class="invalid-feedback">
                                <?= $validation->getError('bank'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" placeholder="Jumlah setoran Ex: 1500000" aria-describedby="helpId">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-5 text-center">
                                <div class="form-group">
                                    <img src="<?= htmlentities(base_url('admin/dist/assets/images/produk/default.jpg')) ;?>" width="200" alt="" class="image-preview">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-7 mt-3">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control custom-file-input <?= ($validation->hasError('bukti_pembayaran')) ? 'is-invalid' : ''; ?>" id="bukti_pembayaran" name="bukti_pembayaran" onchange="previewImage()">
                                        <br>
                                        <label class="custom-file-label" for="validatedCustomFile">Pilih gambar bukti pembayaran...</label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bukti_pembayaran'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-lg btn-primary"> Kirim Bukti Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- service section ends -->

<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
