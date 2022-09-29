<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- [ Main Content ] start -->

<!-- service section starts  -->

<section class="service">
    <h1 class="heading"><i class="fa fa-shopping-bag"></i> <span>Checkout</span> Produk </h1>
    <div class="box-container-keranjang">

        <style>
            .card-body {
                font-size: 14px;
            }
            .card-body input {
                font-size: 14px;
            }
            .card-body h4 {
                font-size: 18px;
            }
            .card-body select {
                font-size: 14px;
            }
            .card-body textarea {
                font-size: 14px;
            }
        </style>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Informasi Tagihan</h4>
                        <div class="col-md-7 col-lg-12">
                            <form action="<?= base_url('/checkout/proses_checkout') ;?>" method="post">
                                <?= csrf_field() ;?>
                                <input type="hidden" name="_method" value="PUT" />
                                <p class="card-text mt-5">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan</label>
                                                <input value="<?= session()->nama_pelanggan ;?>" name="nama_pelanggan" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">No. Telp</label>
                                                <input value="<?= session()->telepon_pelanggan ;?>" name="nama_pelanggan" type="text" class="form-control" id="exampleFormControlInput1" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Kota/Kabupaten</label>
                                        <select class="form-select p-2 ongkos_kirim <?= ($validation->hasError('id_ongkir')) ? 'is-invalid' : ''; ?>" name="id_ongkir" id="form-input">
                                            <option value="">Pilih Kota/Kabupaten</option>
                                            <?php foreach ($view_ongkir as $vo) :?>
                                            <option value="<?= $vo->id_ongkir ;?>"><?= $vo->nama_kabupaten ;?></option>
                                            <?php endforeach ;?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('id_ongkir'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap Pengiriman</label>
                                        <textarea class="form-control <?= ($validation->hasError('alamat_pengiriman')) ? 'is-invalid' : ''; ?>" name="alamat_pengiriman" placeholder="Alamat Pengiriman" id="exampleFormControlTextarea1" rows="3"><?= old('alamat_pengiriman') ;?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat_pengiriman'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                        <select class="form-select p-2 <?= ($validation->hasError('metode_pembayaran')) ? 'is-invalid' : ''; ?>" name="metode_pembayaran" id="metode_pembayaran">
                                            <option value="">Pilih Metode Pembayaran</option>
                                            <option value="Transfer Bank">Transfer Bank</option>
                                            <option value="COD">COD</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('metode_pembayaran'); ?>
                                        </div>
                                    </div>
                                        <?php $no = 1 ;?>
                                        <?php $totalbelanja = 0 ;?>
                                        <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :?>
                                        <?php 
                                            $db      = \Config\Database::connect();
                                            $builder = $db->table('produk');
                                            $builder->where('id_produk', $id_produk);
                                            $query = $builder->get(); 
                                            $pecah = $query->getRow();

                                            $subharga = $pecah->harga_produk*$jumlah;
                                            $totalbelanja+=$subharga ;
                                            // echo "<pre>";
                                            // print_r($pecah);
                                            // echo "</pre>";
                                        ;?>
                                        <?php endforeach ;?>
                                        <input value="<?= $totalbelanja ;?>" name="total_belanja" type="hidden" class="form-control" id="exampleFormControlInput1" readonly>
                                    <div class="mb-3">
                                        <a href="<?= base_url('/') ;?>" class="btn btn-outline-secondary btn-lg"> <i class="fas fa-arrow-left"></i> Lanjut Belanja</a>
                                        <button type="submit" class="btn btn-outline-primary btn-lg"> <i class="fas fa-shopping-cart"></i> Proses Checkout</button>
                                    </div>
                                </p>
                            </form>
                        </div>
                        <div class="col-md-7 col-lg-4"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-4 order-md-last mt-3">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fs-3" style="color: #2B1700;font-weight: bold;">Ringkasan Belanja</span>
                    <span class="badge bg-primary rounded-pill">
                        <?php if (isset($_SESSION['keranjang'])) : ?>
                            <?php echo count($_SESSION['keranjang']) ;?> Item
                        <?php else : ?>
                            0
                        <?php endif ;?>
                    </span>
                </h4>

                
                <ul class="list-group mb-3">

                    <?php $no = 1 ;?>
                    <?php $totalbelanja = 0 ;?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :?>
                    <?php 
                        $db      = \Config\Database::connect();
                        $builder = $db->table('produk');
                        $builder->where('id_produk', $id_produk);
                        $query = $builder->get(); 
                        $pecah = $query->getRow();

                        $subharga = $pecah->harga_produk*$jumlah;
                        // echo "<pre>";
                        // print_r($pecah);
                        // echo "</pre>";
                    ;?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <!-- image_produk -->
                        <div>
                            <!-- image_produk -->
                            <img src="<?= base_url('/admin/dist/assets/images/produk/' . $pecah->image_produk) ;?>" alt="" width="80px" height="80px">
                        </div>
                        <div>
                            <h3 class="my-0"><?= $pecah->nama_produk ;?></h3>
                            <small class="text-muted fs-6">Jumlah : <?= $jumlah ;?></small>
                            <!-- harga produk --> <small class="text-muted fs-6">x</small>
                            <small class="text-muted fs-6">Rp. <?= number_format($pecah->harga_produk) ;?></small>
                        </div>
                        <span class="text-muted">Rp. <?= number_format($subharga,0,',','.') ;?></span>
                    </li>
                    <?php $totalbelanja += $subharga ;?>
                    <?php $no++ ;?>
                    <?php endforeach ;?>

                    <li class="list-group-item d-flex justify-content-between">
                        <!-- ongkos kirim -->
                        <span>Ongkos Kirim</span>
                        <span class="text-muted" id="biaya_ongkir"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (IDR)</span>
                        <strong class="total_bayar">Rp. <?= number_format($totalbelanja,0,',','.') ;?></strong>
                        <input type="hidden" value="<?= $totalbelanja ;?>" id="form-input" class="form-control total_belanjaan" readonly>
                    </li>
                </ul>
            </div>
        </div>
            
    </div>
            

</section>

<!-- service section ends -->



<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
