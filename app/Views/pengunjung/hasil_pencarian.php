<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- kategori section starts  -->

<section class="kategori">

    <h1 class="heading"> Kategori <span>pilihan</span> </h1>

    <div class="box-container">

        

    </div>

</section>

<!-- kategori section ends -->

<!-- products section starts  -->

<section class="products mt-3" id="products">

    <h1 class="heading"> Hasil Pencarian <span> Untuk <?= $search_produk ;?> </span> </h1>

    <!-- jika view_produk != kosong -->
    <?php if ($view_produk != null) : ?>
        <div class="box-container">
            <?php foreach ($view_produk as $vpp) :?>
            <!-- jika $vpp->nama_kategori_pilihan = Produk Terbaru -->
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
            <?php endforeach ;?>
        </div>
    <?php else : ?>
        <!-- alert info -->
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

        <div class="alert alert-primary d-flex align-items-center fs-3" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
            <div>
                <strong>Maaf,</strong> hasil pencarian untuk <?= $search_produk ;?> tidak ditemukan.
            </div>
        </div>


    <?php endif ;?>
    

</section>

<!-- products section ends -->


<?= $this->endSection() ?>