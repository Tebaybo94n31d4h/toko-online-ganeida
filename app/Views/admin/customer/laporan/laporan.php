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

                    <?php 
                        $laporan = array();
                        $tanggal_mulai = '-';
                        $tanggal_akhir = '-';
                        // jika ada tombol kirim di klik maka akan menjalankan perintah dibawah ini 
                        if (isset($_POST['kirim'])) {
                            // tanggal mulai
                            $tanggal_mulai = $_POST['tanggal_mulai'];
                            // tanggal akhir
                            $tanggal_akhir = $_POST['tanggal_akhir'];

                            // dn connection
                            $db = \Config\Database::connect();
                            $ambil = $db->query("SELECT * FROM pembelian
                                                    INNER JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan  
                                                    WHERE tanggal_pembelian 
                                                    BETWEEN '$tanggal_mulai' 
                                                    AND '$tanggal_akhir'");
                            $pecah = $ambil->getResultArray();
                            $laporan[] = $pecah;

                            
                        }
                    
                    ;?>

                    <div class="card-header">
                        <h5>Laporan Pembelian Tanggal <?= $tanggal_mulai ;?> Sampai <?= $tanggal_akhir ;?> </h5>
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                    <!-- tanggal mulai -->
                                    <div class="form-group">
                                        <label for="tanggal_mulai">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                                    <!-- tanggal akhir -->
                                    <div class="form-group">
                                        <label for="tanggal_akhir">Tanggal Akhir</label>
                                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Tanggal Akhir">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                                    <!-- button Lihat -->
                                    <div class="form-group">
                                        <label for="">&nbsp;</label> <br>
                                        <button type="submit" class="btn btn-sm btn-primary" name="kirim">
                                            <i class="feather icon-search"></i>
                                            Lihat
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    
                                    <!-- table -->
                                    <!-- jika $laporan tidak = kosong -->
                                    <?php if ($laporan != null) : ?>
                                        <?php
                                    
                                            // jika data kosong maka akan menampilkan pesan ini  
                                            if (empty($pecah)) {
                                                echo "<div class='alert alert-danger'>
                                                        <i class='feather icon-alert-circle'></i>
                                                        Data tidak ditemukan
                                                    </div>";
                                            } else {
                                                // jika data tidak kosong maka akan menampilkan data dibawah ini
                                                echo "<div class='alert alert-success'>
                                                        <i class='feather icon-check'></i>
                                                        <strong>".count($pecah)."</strong> data ditemukan
                                                    </div>";
                                            }
                                    
                                        ;?>
                                        <!-- tombol print -->
                                        <div class="form-group">
                                            <label for="">&nbsp;</label> <br>
                                            <a href="<?= base_url('/laporan/print/' . $tanggal_mulai . '/' . $tanggal_akhir) ?>" class="btn btn-sm btn-primary">
                                                <i class="feather icon-printer"></i>
                                                Print
                                            </a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Pelanggan</th>
                                                        <th>Jumlah</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0 ;?>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($laporan as $laporan) : ?>
                                                        <?php foreach ($laporan as $laporan => $jumlah) : ?>
                                                            <?php $total+=$jumlah['total_pembelian'] ;?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td>
                                                                    <!-- tampilkan tanggal saja -->
                                                                    <?php $tanggal = $jumlah['tanggal_pembelian']; ?>
                                                                    <?php $tanggal_pembelian = date('d-m-Y', strtotime($tanggal)); ?>
                                                                    <?= $tanggal_pembelian ?>

                                                                </td>
                                                                <td><?= $jumlah['nama_pelanggan'] ?></td> 
                                                                <td>Rp. <?= number_format($jumlah['total_pembelian']) ?></td>
                                                                <td><?= $jumlah['status_pembelian'] ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3"><strong>Total</strong></td>
                                                        <td><strong>Rp. <?= number_format($total) ?></strong></td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-info" role="alert">
                                            <h4 class="alert-heading">Data Laporan</h4>
                                            <p>Pilih tanggal mulai dan tanggal akhir untuk melihat data </p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<!-- modal tambah -->
<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel"> <i class="feather icon-plus"></i> Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('master/tambah_produk') ;?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ;?>
                <div class="modal-body">
                    
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
                    
                    <div class="form-group">
                        <label for="nama_produk">Nama produk</label>
                        <input type="text" name="nama_produk" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" placeholder="Nama produk">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_produk">Harga produk</label>
                        <input type="number" name="harga_produk" class="form-control <?= ($validation->hasError('harga_produk')) ? 'is-invalid' : ''; ?>" id="harga_produk" placeholder="0">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="berat_produk">Berat produk</label>
                        <input type="number" name="berat_produk" class="form-control <?= ($validation->hasError('berat_produk')) ? 'is-invalid' : ''; ?>" id="berat_produk" placeholder="0">
                        <div class="invalid-feedback">
                            <?= $validation->getError('berat_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Image produk</label>
                    </div>
                    <div class="form-group">
                        <img width="100" src="<?= base_url('admin/dist/assets/images/produk/default.jpg') ;?>" alt="" class="image-preview">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('image_produk')) ? 'is-invalid' : ''; ?>" id="image_produk" name="image_produk" onchange="previewImage()">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('image_produk'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi produk</label>
                        <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" rows="3"></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">Check me out</label>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"> <i class="feather icon-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>