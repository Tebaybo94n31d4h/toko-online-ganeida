<?= $this->extend('general-admin/default') ?>

<?= $this->section('content') ?>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-left">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Customer</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ;?>"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ;?>">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Data Detail Pembelian</h5>
                    </div>
                    <div class="card-body table-border-style table-responsive">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?= base_url('/admin/dist/assets/images/bukti_pembayaran/' . $view_pembayaran->bukti_pembayaran) ;?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Nama Lengkap : <?= $view_pembayaran->nama_lengkap ;?></h5>
                                        <p class="card-text">Nama Bank : <?= $view_pembayaran->bank ;?></p>
                                        <p class="card-text">Jumlah : Rp. <?= number_format($view_pembayaran->jumlah) ;?></p>
                                        <p class="card-text"><small class="text-muted">Tanggal Pembayaran : <?= $view_pembayaran->tanggal_pembayaran ;?></small></p>
                                    </div>
                                    <div class="card-body">
                                        <!-- form nomor resi dan status -->
                                        <form action="<?= base_url('/customer/proses_lihat_pembayaran/' . $view_pembayaran->id_pembelian) ;?>" method="post">
                                        <?= csrf_field() ;?>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nomor Resi</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('nomor_resi')) ? 'is-invalid' : ''; ?>" name="nomor_resi" id="exampleFormControlInput1" placeholder="Masukkan nomor resi">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nomor_resi'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Status</label>
                                                <select class="form-select <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" name="status" id="exampleFormControlSelect1">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Lunas">Lunas</option>
                                                    <option value="Barang Dikirim">Barang Dikirim</option>
                                                    <option value="Barang Diterima">Barang Diterima</option>
                                                    <option value="Batal">Batal</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('status'); ?>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
    
<?= $this->endSection() ?>