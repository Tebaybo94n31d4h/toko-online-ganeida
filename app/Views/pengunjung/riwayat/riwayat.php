<?= $this->extend('pengunjung/template/default') ?>

<?= $this->section('content') ?>

<!-- [ Main Content ] start -->

<!-- service section starts  -->

<section class="service">
    <h1 class="heading"><i class="fa fa-newspaper"></i> <span>Riwayat</span> Belanja <?= $view_detail_pembelian->nama_pelanggan ;?> </h1>
    <div class="box-container">
    
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ;?>
                <?php foreach ($view_pembelian as $vp) : ?>
                <tr>
                    <td data-label="No"><?= $no ;?></td>
                    <td data-label="Tanggal"><?= date('d-m-Y', strtotime($vp->tanggal_pembelian)) ;?></td>
                    <td data-label="Status">
                        <?php if ($vp->status_pembelian == 'Pending') : ?>
                            <span class="badge text-bg-warning"><?= $vp->status_pembelian ;?></span>
                        <?php elseif ($vp->status_pembelian == 'Lunas') :?>
                            <span class="badge text-bg-secondary"><?= $vp->status_pembelian ;?></span>
                        <?php elseif ($vp->status_pembelian == 'Barang Dikirim') :?>
                            <span class="badge text-bg-info"><?= $vp->status_pembelian ;?></span>
                        <?php elseif ($vp->status_pembelian == 'Barang Diterima') :?>
                            <span class="badge text-bg-success"><?= $vp->status_pembelian ;?></span>
                        <?php elseif ($vp->status_pembelian == 'Sudah kirim pembayaran') :?>
                            <span class="badge text-bg-secondary"><?= $vp->status_pembelian ;?></span>
                        <?php elseif ($vp->status_pembelian == 'Batal') :?>
                            <span class="badge-danger"><?= $vp->status_pembelian ;?></span>
                        <?php endif ;?>
                        <br> <br>
                        <!-- jika resi_pengiriman tidak kosong -->
                        <?php if ($vp->resi_pengiriman != '') : ?>
                            <span class="badge-info">Resi : <?= $vp->resi_pengiriman ;?></span>
                        <?php endif ;?>
                    </td>
                    <td data-label="Total">Rp. <?= number_format($vp->total_pembelian) ;?></td>
                    <td data-label="Aksi">
                        <a href="<?= htmlentities(base_url('/nota/' . $vp->id_pembelian)) ;?>" class="btn btn-primary btn-lg">Nota</a>

                        <!-- jika status_pembelian = pending -->
                        <?php if ($vp->status_pembelian == 'Pending') : ?>
                            <a href="<?= htmlentities(base_url('/pembayaran/' . $vp->id_pembelian)) ;?>" class="btn btn-secondary btn-lg">Konfirmasi Pembayaran</a>
                            <!-- selain dari itu lihat pembayaran -->
                        <?php else : ?>
                            <a href="<?= htmlentities(base_url('/lihatpembayaran/' . $vp->id_pembelian)) ;?>" class="btn btn-info btn-lg">Lihat Pembayaran</a>
                        <?php endif ;?>
                        
                    </td>
                </tr>
                <?php $no++ ;?>
                <?php endforeach ;?>
            </tbody>
        </table>

    </div>

</section>

<!-- service section ends -->

<!-- [ Main Content ] end -->

<?= $this->endSection() ?>
