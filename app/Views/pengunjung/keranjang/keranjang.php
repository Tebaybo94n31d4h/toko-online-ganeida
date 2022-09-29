<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- [ Main Content ] start -->

<!-- service section starts  -->

<section class="service">
    <h1 class="heading"><i class="fa fa-shopping-cart"></i> <span>Keranjang</span> Produk </h1>
    <div class="box-container-keranjang">
        
        <div class="row">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                <div class="row">
                    <?php $no = 1 ;?>
                    <?php $totalbelanja = 0 ;?>
                    <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :?>
                    <?php 
                        $db      = \Config\Database::connect();
                        $builder = $db->table('produk');
                        $builder->select('produk.*, satuan.nama_satuan, kategori_produk.nama_kategori, sub_kategori.nama_sub_kategori');
                        $builder->join('satuan', 'produk.id_satuan = satuan.id_satuan');
                        $builder->join('kategori_produk', 'produk.id_kategori = kategori_produk.id_kategori');
                        $builder->join('sub_kategori', 'produk.id_sub_kategori = sub_kategori.id_sub_kategori');
                        $builder->where('id_produk', $id_produk);
                        $query = $builder->get(); 
                        $pecah = $query->getRow();
                        $subharga = $pecah->harga_produk*$jumlah;
                        // echo "<pre>";
                        // print_r($pecah);
                        // echo "</pre>";
                    ;?>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="row p-3">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                    <img style="border-style: none;" class="img-thumbnail" src="<?= base_url('/admin/dist/assets/images/produk/' . $pecah->image_produk) ;?>" alt="">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                   <div class="card-body">
                                        <h3 class="judul-nama-produk"><strong><?= htmlentities($pecah->nama_produk) ;?></strong></h3>
                                        <p class="text-nama-produk"><?= htmlentities($pecah->nama_kategori) ;?></p>
                                        <p class="text-nama-produk">Rp. <?= number_format(htmlentities($pecah->harga_produk)) ;?> / <?= htmlentities($pecah->nama_satuan) ;?></p>
                                        <p class="text-nama-produk"><?= htmlentities($jumlah) ;?> <?= htmlentities($pecah->nama_satuan) ;?></p>
                                        <!-- <div class="stars text-nama-produk">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div> -->
                                   </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                        <!-- <div class="card-body"> -->
                                            <a href="<?= base_url('keranjang/hapus_produk_keranjang/' . htmlentities($id_produk)) ;?>" class="btn btn-outline-danger btn-lg"> <i class="fas fa-trash"></i> </a>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="card-body">
                                            <h3 class="text-nama-produk"><strong>
                                                Total :
                                                Rp. <?= number_format(htmlentities($pecah->harga_produk*$jumlah)) ;?>
                                            </strong></h3>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php $totalbelanja+=$subharga ;?>
                    <?php endforeach ;?>
                </div>
            </div>
            
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 mt-3">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fs-3" style="color: #2B1700;font-weight: bold;">Keranjang Anda</span>
                    <span class="badge bg-primary rounded-pill">
                        <!-- jika session keranjang ada tampilkan, jika tidak ada isi dengan 0 -->
                        <?php if (isset($_SESSION['keranjang'])) : ?>
                            <?php echo count($_SESSION['keranjang']) ;?> Item
                        <?php else : ?>
                            0
                        <?php endif ;?>
                    </span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Belanja (ID)</span>
                        <strong><strong>Rp. <?= number_format(htmlentities($totalbelanja)) ;?></strong></strong>
                    </li>
                </ul>
                <?php if(count($_SESSION['keranjang']) > 0) :?>
                    <a href="<?= base_url('/checkout') ;?>" class="btn btn-lg btn-block btn-outline-primary">Checkout</a>
                    <a href="<?= base_url('/') ;?>" class="btn btn-lg btn-block btn-outline-secondary">Lanjut Belanja</a>
                <?php else :?>
                    <a href="<?= base_url('/') ;?>" class="btn btn-lg btn-block btn-outline-secondary">Lanjut Belanja</a>
                <?php endif ;?>
            </div>
        </div>

    </div>

</section>

<!-- service section ends -->

<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
