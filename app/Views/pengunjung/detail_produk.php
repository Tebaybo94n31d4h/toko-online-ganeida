<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- [ Main Content ] start -->

<!-- featured section starts  -->

<section class="featured" id="featured">

    <h1 class="heading"><i class="fa fa-eye"></i> <span>Detail</span> Produk </h1>

    <div class="row">
        <div class="image-container">
            <div class="big-image">
                <img src="<?= base_url('/admin/dist/assets/images/produk/' . $view_produk->image_produk) ;?>" width="50px" class="big-image-1" alt="">
            </div>
        </div>
        <div class="content">
            <h3><?= $view_produk->nama_produk ;?></h3>
            <!-- <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div> -->
            <p><?= $view_produk->deskripsi_produk ;?></p>
            <div class="price">Rp. <?= number_format($view_produk->harga_produk) ;?></div>
            <p>Stok : <?= $view_produk->stok_produk ;?></p>
            <form action="<?= base_url('home/detail_produk_beli/' . $view_produk->id_produk) ;?>" method="post">
                <?= csrf_field() ;?>
                <div class="input-group mb-3">
                    <input style="font-size: 16px;" type="number" value="1" min="1" max="<?= $view_produk->stok_produk ;?>" name="jumlah_produk" id="jumlah_produk" class="form-control <?= ($validation->hasError('jumlah_produk')) ? 'is-invalid' : ''; ?>" placeholder="Jumlah produk">
                    <button class="btn btn-primary btn-lg" type="submit" id="button-addon2">
                        <i class="fa fa-shopping-cart"><sup>+</sup></i>
                        Beli
                    </button>
                    <!-- <input type="submit" value="Beli" class="btn btn-primary" id="input-dtl-beli"> -->
                    <div class="invalid-feedback" style="color: red; font-size: 12px;padding-top: 5px;padding-left: 10px;">
                        <?= $validation->getError('jumlah_produk'); ?>
                    </div>
                    <!-- <div class="form-jp">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"><sup>+</sup></i> Beli</button>
                    </div> -->
                </div>
            </form>
        </div>
    </div>

</section>

<!-- featured section ends -->


<!-- products section starts  -->

<section class="products" id="products">

    <h1 class="heading"><span>Semua</span> Produk</h1>

    <div class="box-container">
        <?php foreach ($view_produk_all as $vp) :?>
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

<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
