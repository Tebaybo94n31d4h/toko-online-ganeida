<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- kategori section starts  -->

<section class="kategori">

    <h1 class="heading"> Kategori <span>pilihan</span> </h1>

    <div class="box-container">

        <div class="owl-carousel owl-carousel-kategori owl-theme">
            <?php foreach ($view_kategori_produk as $vk) :?>
                <div class="item">
                    <div class="card">
                        <a href="<?= base_url('/kategori/' . $vk->id_kategori) ;?>" style="text-decoration: none;color: #2B1700;">
                            <div class="card-body">
                                <img src="<?= base_url('/admin/dist/assets/images/foto_kategori/' . $vk->image_kategori) ;?>" alt="">
                                <div class="card-text text-center">
                                    <h3><?= $vk->nama_kategori ;?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach ;?>
        </div>

    </div>

</section>

<!-- kategori section ends -->

<!-- products section starts  -->

<section class="products mt-3" id="products">

    <h1 class="heading"> Semua Kategori <span> Untuk <?= $view_kategori_by_id->nama_kategori ;?> </span> </h1>

    <div class="box-container">
        <?php if ($view_kategori) :?>
            <?php foreach ($view_kategori as $vk) :?>
                    <div class="box">
                        <!-- <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-share"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div> -->
                        <img src="<?= base_url('/admin/dist/assets/images/produk/' . $vk->image_produk) ;?>" alt="">
                        <div class="content">
                            <h3><?= $vk->nama_produk ;?></h3>
                            <div class="price">Rp. <?= number_format($vk->harga_produk) ;?></div>
                            <!-- <p style="font-size: 14px;margin-bottom: 10px;text-decoration: line-through;"> Rp. 200.000 </p> -->
                            <p style="font-size: 14px;margin-bottom: 10px;">Stok : <?= $vk->stok_produk ;?> <?= $vk->nama_satuan ;?> </p>
                            <!-- <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div> -->
                            <a href="<?= base_url('/home/beli/' . $vk->id_produk) ;?>" class="btn btn-primary btn-lg">
                                <i class="fa fa-shopping-cart"><sup>+</sup></i> Beli
                            </a>
                            <a href="<?= base_url('/home/detail_produk/' . $vk->id_produk) ;?>" class="btn btn-secondary btn-lg">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </div>
                    </div>
                <?php endforeach ;?>
            <?php else :?>
                <!-- tidak ada produk -->
                <div class="row m-auto">
                    <!-- alert info -->
                    <div class="col-md-12">
                        <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                            <strong>Maaf !</strong> Tidak ada produk untuk kategori <?= $view_kategori_by_id->nama_kategori ;?>.
                        </div>
                    </div>
                </div>
         <?php endif ;?>
        
    </div>

</section>

<!-- products section ends -->


<!-- products section starts  -->

<section class="products mt-5" id="products">

    <h1 class="heading"><span>Semua</span> Produk</h1>

    <div class="box-container">
        <?php foreach ($view_produk as $vp) :?>
        <div class="box">
            <!-- <div class="icons">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share"></a>
                <a href="#" class="fas fa-eye"></a>
            </div> -->
            <img src="<?= base_url('/admin/dist/assets/images/produk/' . $vp->image_produk) ;?>" alt="">
            <div class="content">
                <h3><?= $vp->nama_produk ;?></h3>
                <div class="price">Rp. <?= number_format($vp->harga_produk) ;?></div>
                <!-- <p style="font-size: 14px;margin-bottom: 10px;text-decoration: line-through;"> Rp. 200.000 </p> -->
                <p style="font-size: 14px;margin-bottom: 10px;">Stok : <?= $vp->stok_produk ;?> <?= $vp->nama_satuan ;?> </p>
                <!-- <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div> -->
                <a href="<?= base_url('/home/beli/' . $vp->id_produk) ;?>" class="btn btn-primary btn-lg">
                    <i class="fa fa-shopping-cart"><sup>+</sup></i> Beli
                </a>
                <a href="<?= base_url('/home/detail_produk/' . $vp->id_produk) ;?>" class="btn btn-secondary btn-lg">
                    <i class="fas fa-eye"></i> Detail
                </a>
            </div>
        </div>
        <?php endforeach ;?>
    </div>

</section>

<!-- products section ends -->


<?= $this->endSection() ?>