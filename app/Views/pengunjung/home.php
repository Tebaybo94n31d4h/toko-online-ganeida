<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="slide-container active">
        <div class="slide">
            <div class="content">
                <span>baju kemeja</span>
                <h3>kemeja cendrawasih</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maiores et eos eaque veritatis aut laboriosam earum dolorem iste atque.</p>
                <!-- <a href="#" class="btn">add to cart</a> -->
            </div>
            <div class="image">
                <img src="<?= base_url('/admin/dist/assets/images/slider/produk1.png') ;?>" class="shoe" alt="">
                <img src="<?= base_url('/admin/dist/assets/images/slider/home-text-1.png') ;?>" class="text" alt="">
            </div>
        </div>
    </div>

    <div class="slide-container">
        <div class="slide">
            <div class="content">
                <span>Sweeter</span>
                <h3>Sweeters</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maiores et eos eaque veritatis aut laboriosam earum dolorem iste atque.</p>
                <!-- <a href="#" class="btn">add to cart</a> -->
            </div>
            <div class="image">
                <img src="<?= base_url('/admin/dist/assets/images/slider/produk2.png') ;?>" class="shoe" alt="">
                <img src="<?= base_url('/admin/dist/assets/images/slider/home-text-2.png') ;?>" class="text" alt="">
            </div>
        </div>
    </div>

    <div class="slide-container">
        <div class="slide">
            <div class="content">
                <span>baju kemeja</span>
                <h3>kemeja motif</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat maiores et eos eaque veritatis aut laboriosam earum dolorem iste atque.</p>
                <!-- <a href="#" class="btn">add to cart</a> -->
            </div>
            <div class="image">
                <img src="<?= base_url('/admin/dist/assets/images/slider/produk3.png') ;?>" class="shoe" alt="">
                <img src="<?= base_url('/admin/dist/assets/images/slider/home-text-3.png') ;?>" class="text" alt="">
            </div>
        </div>
    </div>

    <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
    <div id="next" class="fas fa-chevron-right" onclick="next()"></div>

</section>

<!-- home section ends -->

<!-- service section starts  -->

<section class="service">

    <div class="box-container">

        <div class="box">
            <i class="fas fa-shipping-fast"></i>
            <h3>Pengiriman Cepat</h3>
            <!-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p> -->
        </div>

        <div class="box">
            <i class="fas fa-undo"></i>
            <h3>Penggantian 10 hari</h3>
            <!-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p> -->
        </div>

        <div class="box">
            <i class="fas fa-headset"></i>
            <h3>Dukungan 24 x 7</h3>
            <!-- <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, fugit.</p> -->
        </div>

    </div>

</section>

<!-- service section ends -->

<!-- kategori section starts  -->

<section class="kategori">

    <h1 class="heading"> Kategori <span>pilihan</span> </h1>

    <div class="box-container">

        <div class="owl-carousel owl-carousel-kategori owl-theme">
            <?php foreach ($view_kategori as $vk) :?>
                <div class="item">
                    <!-- card -->
                    <div class="card">
                        <a href="<?= base_url('/kategori/' . $vk->id_kategori) ;?>" style="text-decoration: none;color: #2B1700;">
                            <!-- card-bory -->
                            <img src="<?= base_url('/admin/dist/assets/images/foto_kategori/' . $vk->image_kategori) ;?>" class="card-img-top" alt="">
                            <div class="card-body">
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

<section class="products" id="products">

    <h1 class="heading"> Produk <span>Terbaru</span> </h1>

    <div class="box-container">
        <?php foreach ($view_produk_pilihan as $vpp) :?>
        <!-- jika $vpp->nama_kategori_pilihan = Produk Terbaru -->
        <?php if ($vpp->nama_kategori_pilihan == 'Produk Terbaru') :?>
            <div class="box">
                <!-- <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div> -->
                <img src="<?= base_url('/admin/dist/assets/images/produk/' . $vpp->image_produk) ;?>" alt="">
                <div class="content">
                    <h3><?= $vpp->nama_produk ;?></h3>
                    <div class="price">Rp. <?= number_format($vpp->harga_produk) ;?></div>
                    <!-- <p style="font-size: 14px;margin-bottom: 10px;text-decoration: line-through;"> Rp. 200.000 </p> -->
                    <p style="font-size: 14px;margin-bottom: 10px;">Stok : <?= $vpp->stok_produk ;?> <?= $vpp->nama_satuan ;?> </p>
                    <!-- <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div> -->
                    <a href="<?= base_url('/home/beli/' . $vpp->id_produk) ;?>" class="btn btn-primary btn-lg">
                        <i class="fa fa-shopping-cart"><sup>+</sup></i> Beli
                    </a>
                    <a href="<?= base_url('/home/detail_produk/' . $vpp->id_produk) ;?>" class="btn btn-secondary btn-lg">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                </div>
            </div>
        <?php endif ;?>
        <?php endforeach ;?>
    </div>

</section>

<!-- products section ends -->


<!-- service section starts  -->

<section class="service">

    <div class="box-container">

        <div class="owl-carousel owl-carousel-slider">
            <div> <img src="<?= base_url('/admin/dist/assets/images/slider/slider1.png') ;?>" alt=""> </div>
            <div> <img src="<?= base_url('/admin/dist/assets/images/slider/slider2.png') ;?>" alt=""> </div>
        </div>

    </div>

</section>

<!-- service section ends -->


<!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"> Produk <span>Pilihan</span> </h1>
    
    <?php foreach ($view_produk_pilihan as $vpil) :?>
        <!-- jika $vpil->nama_kategori_pilihan = Produk Terbaru -->
        <?php if ($vpil->nama_kategori_pilihan == 'Produk Pilihan') :?>
            <div class="row">
                <div class="image-container">
                    <div class="big-image">
                        <img src="<?= base_url('/admin/dist/assets/images/produk/' . $vpil->image_produk) ;?>" class="big-image-1" alt="">
                    </div>
                </div>
                <div class="content">
                    <h3><?= $vpil->nama_produk ;?></h3>
                    <!-- <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div> -->
                    <p><?= $vpil->deskripsi_produk ;?></p>
                    <div class="price">Rp. <?= number_format($vpil->harga_produk) ;?></div>
                    <p style="font-size: 14px;margin-bottom: 10px;">Stok : <?= $vpil->stok_produk ;?> <?= $vpil->nama_satuan ;?> </p>
                        <a href="<?= base_url('/home/beli/' . $vpil->id_produk) ;?>" class="btn btn-primary btn-lg">
                            <i class="fa fa-shopping-cart"><sup>+</sup></i> Beli
                        </a>
                        <a href="<?= base_url('/home/detail_produk/' . $vpil->id_produk) ;?>" class="btn btn-secondary btn-lg">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                </div>
            </div>
        <?php endif ;?>
    <?php endforeach ;?>
</section>

<!-- products section starts  -->

<section class="products" id="products">

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