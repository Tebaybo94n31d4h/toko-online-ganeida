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
                        <h5>Data Pembelian</h5>
                        <!-- <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn  btn-icon btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModalLive">
                                    <i class="feather icon-plus"></i>
                                </button>
                            </div>
                        </div> -->
                    </div>
                    <div class="card-body table-border-style table-responsive">
                        <?php if (session()->getFlashdata('pesan')) :?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan') ;?>
                            </div>
                        <?php endif ;?>
                        <?php if (session()->getFlashdata('error')) :?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('error') ;?>
                            </div>
                        <?php endif ;?>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama pelanggan</th>
                                    <th>Tanggal pembelian</th>
                                    <th>Status pembelian</th>
                                    <th>Total pembelian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ;?>
                                <?php foreach ($view_pembelian as $vp) : ?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td><?= $vp['nama_pelanggan'] ;?></td>
                                    <td><?= $vp['tanggal_pembelian'] ;?></td>
                                    <td>
                                        <!-- jika status pembelian = pending -->
                                        <?php if ($vp['status_pembelian'] == 'Pending') : ?>
                                            <span class="badge badge-warning">Pending</span>
                                        <?php elseif ($vp['status_pembelian'] == 'Lunas') : ?>
                                            <span class="badge badge-success">Lunas</span>
                                        <?php elseif ($vp['status_pembelian'] == 'Barang Dikirim') : ?>
                                            <span class="badge badge-primary">Barang Dikirim</span>
                                        <?php elseif ($vp['status_pembelian'] == 'Barang Diterima') : ?>
                                            <span class="badge badge-success">Barang Diterima</span>
                                        <?php elseif ($vp['status_pembelian'] == 'Sudah kirim pembayaran') : ?>
                                            <span class="badge badge-info">Sudah kirim pembayaran</span>
                                        <?php elseif ($vp['status_pembelian'] == 'Batal') : ?>
                                            <span class="badge badge-danger">Batal</span>
                                        <?php endif ;?>
                                    <td>Rp. <?= number_format($vp['total_pembelian']) ;?></td>
                                    <td>
                                        <!-- jika status_pembayaran tidak = pending -->
                                        <?php if ($vp['status_pembelian'] != 'Pending') : ?>
                                            <!-- ubah status -->
                                            <a href="#" data-toggle="modal" data-target="#exampleModalLiveUbahStatus<?= $vp['id_pembelian'] ;?>" class="badge badge-warning">Ubah status</a>
                                        <?php endif ;?>
                                        <a href="<?= htmlentities(base_url('/detail_pembelian/' . $vp['id_pembelian'])) ;?>" class="badge badge-info text-white" style="cursor: pointer;">Detail</a>
                                        <?php if ($vp['status_pembelian'] != 'Pending') : ?>
                                            <!-- link lihat pembayaran -->
                                            <a href="<?= htmlentities(base_url('/lihat_pembayaran/' . $vp['id_pembelian'])) ;?>" class="badge badge-primary text-white" style="cursor: pointer;">Lihat pembayaran</a>
                                        <?php endif ;?>
                                    </td>
                                </tr>
                                <?php $no ++ ;?>
                                <?php endforeach ;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<?php $no=0;
foreach ($view_pembelian as $vkp) : $no++; ?>
<div id="exampleModalLiveUbahStatus<?= $vkp['id_pembelian'] ;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveUbahStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveUbahStatusLabel"> <i class="feather icon-trash"></i> Ubah Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= htmlentities(base_url('customer/ubah_status_pembelian')) ;?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status_pembelian">Status pembelian</label>
                        <select name="status_pembelian" id="status_pembelian" class="form-select<?= ($validation->hasError('status_pembelian')) ? 'is-invalid' : ''; ?>">
                            <option value="">Pilih status pembelian</option>
                            <!-- jika $vkp['status_pembelian'] -->
                            <?php if ($vkp['status_pembelian'] == 'Pending') : ?>
                                <option value="Pending" selected>Pending</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Barang Dikirim">Barang Dikirim</option>
                                <option value="Barang Diterima">Barang Diterima</option>
                                <option value="Sudah kirim pembayaran">Sudah kirim pembayaran</option>
                                <option value="Batal">Batal</option>
                            <?php elseif ($vkp['status_pembelian'] == 'Lunas') : ?>
                                <option value="Pending">Pending</option>
                                <option value="Lunas" selected>Lunas</option>
                                <option value="Barang Dikirim">Barang Dikirim</option>
                                <option value="Barang Diterima">Barang Diterima</option>
                                <option value="Sudah kirim pembayaran">Sudah kirim pembayaran</option>
                                <option value="Batal">Batal</option>
                            <?php elseif ($vkp['status_pembelian'] == 'Barang Dikirim') : ?>
                                <option value="Pending">Pending</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Barang Dikirim" selected>Barang Dikirim</option>
                                <option value="Barang Diterima">Barang Diterima</option>
                                <option value="Sudah kirim pembayaran">Sudah kirim pembayaran</option>
                                <option value="Batal">Batal</option>
                            <?php elseif ($vkp['status_pembelian'] == 'Barang Diterima') : ?>
                                <option value="Pending">Pending</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Barang Dikirim">Barang Dikirim</option>
                                <option value="Barang Diterima" selected>Barang Diterima</option>
                                <option value="Sudah kirim pembayaran">Sudah kirim pembayaran</option>
                                <option value="Batal">Batal</option>
                            <?php elseif ($vkp['status_pembelian'] == 'Sudah kirim pembayaran') : ?>
                                <option value="Pending">Pending</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Barang Dikirim">Barang Dikirim</option>
                                <option value="Barang Diterima">Barang Diterima</option>
                                <option value="Sudah kirim pembayaran" selected>Sudah kirim pembayaran</option>
                                <option value="Batal">Batal</option>
                            <?php elseif ($vkp['status_pembelian'] == 'Batal') : ?>
                                <option value="Pending">Pending</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Barang Dikirim">Barang Dikirim</option>
                                <option value="Barang Diterima">Barang Diterima</option>
                                <option value="Sudah kirim pembayaran">Sudah kirim pembayaran</option>
                                <option value="Batal" selected>Batal</option>
                            <?php endif ;?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('status_pembelian'); ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_pembelian" value="<?= $vkp['id_pembelian'] ;?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ;?>

<?= $this->endSection() ?>