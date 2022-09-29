<?= $this->extend('general-admin/default') ?>

<?= $this->section('content') ?>

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Master</h5>
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
                        <h5>Data Produk</h5>
                    </div>
                    <div class="card-body table-border-style table-responsive">
                        <?php if (session()->getFlashdata('pesan')) :?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan') ;?>
                            </div>
                        <?php endif ;?>
                        <?php if (session()->getFlashdata('error')) :?>
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif ;?>
                        <button type="button" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#exampleModalLivetambah">
                            <i class="feather icon-plus"></i> Tambah
                        </button>
                        <table class="table table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image produk</th>
                                    <th>Nama produk</th>
                                    <th>Kategori produk</th>
                                    <th>Tanggal Ditambahkan</th>
                                    <th>Harga produk</th>
                                    <th>Stok produk</th>
                                    <th>Aktif produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ;?>
                                <?php foreach ($view_produk as $vp) : ?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td>
                                        <img src="<?= base_url('/admin/dist/assets/images/produk/'. $vp->image_produk) ;?>" alt="" width="50">
                                    </td>
                                    <td><?= $vp->nama_produk ;?></td>
                                    <td><?= $vp->nama_kategori ;?></td>
                                    <td><?= $vp->created_at ;?></td>
                                    <td>Rp. <?= number_format($vp->harga_produk) ;?></td>
                                    <td><?= $vp->stok_produk ;?> <?= $vp->nama_satuan ;?></td>
                                    <td>
                                        <?php if ($vp->aktif_produk == 1):?>
                                                <span class="badge badge-success">Aktif</span>
                                           <?php else :?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <!-- <a style="cursor: pointer;" class="badge badge-info text-white" data-toggle="modal" data-target="#exampleModalLivedetail">Detail</a> -->
                                        <a data-toggle="modal" data-target="#exampleModalLivedetail<?= $vp->id_produk ;?>" class="badge badge-info text-white" style="cursor: pointer;" id="btn-edit"> <i class="feather icon-eye"></i> Detail</a>
                                        <a href="<?= base_url('/master/edit_produk/' . $vp->id_produk) ;?>" class="badge badge-success text-white" id="btn-edit"> <i class="feather icon-edit"></i> Ubah</a>
                                        <a data-toggle="modal" data-target="#exampleModalLivehapus<?= $vp->id_produk ;?>" class="badge badge-danger text-white" style="cursor: pointer;" id="btn-edit"> <i class="feather icon-trash"></i> Hapus</a>
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

<!-- modal tambah -->
<div id="exampleModalLivetambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLivetambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLivetambahLabel"> <i class="feather icon-plus"></i> Tambah produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('master/tambah_produk') ;?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ;?>
            <input type="hidden" name="_method" value="PUT" />

                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kategori">Kategori produk <span style="color: red;">*</span> </label>
                        <select class="form-select <?= ($validation->hasError('id_kategori')) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1" name="id_kategori">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($view_kategori_produk as $vkp) :?>
                            <option value="<?= $vkp->id_kategori ;?>"><?= $vkp->nama_kategori ;?></option>
                            <?php endforeach ;?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kategori'); ?>
                        </div>
                    </div>               
                    <div class="form-group">
                        <label for="id_sub_kategori">Sub Kategori produk <span style="color: red;">*</span> </label>
                        <select class="form-select <?= ($validation->hasError('id_sub_kategori')) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1" name="id_sub_kategori">
                            <option value="">Pilih Sub Kategori</option>
                            <?php foreach ($view_sub_kategori_produk as $vskp) :?>
                            <option value="<?= $vskp->id_sub_kategori ;?>"><?= $vskp->nama_sub_kategori ;?></option>
                            <?php endforeach ;?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_sub_kategori'); ?>
                        </div>
                    </div>
                    <!-- kategori pilihan -->
                    <div class="form-group">
                        <label for="id_kategori_pilihan">Kategori pilihan produk <span style="color: red;">*</span> </label>
                        <select class="form-select <?= ($validation->hasError('id_kategori_pilihan')) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1" name="id_kategori_pilihan">
                            <option value="">Pilih Kategori Pilihan</option>
                            <?php foreach ($view_kategori_pilihan as $vkp) :?>
                            <option value="<?= $vkp->id_kategori_pilihan ;?>"><?= $vkp->nama_kategori_pilihan ;?></option>
                            <?php endforeach ;?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kategori_pilihan'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_produk">Nama produk <span style="color: red;">*</span> </label>
                        <input type="text" name="nama_produk" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" placeholder="Nama produk">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga_produk">Harga produk (Rp.) <span style="color: red;">*</span> </label>
                        <input type="number" min="1" name="harga_produk" class="form-control <?= ($validation->hasError('harga_produk')) ? 'is-invalid' : ''; ?>" id="harga_produk" placeholder="0">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="berat_produk">Berat produk <span style="color: red;">*</span> </label>
                        <input type="number" min="1" name="berat_produk" class="form-control <?= ($validation->hasError('berat_produk')) ? 'is-invalid' : ''; ?>" id="berat_produk" placeholder="0">
                        <div class="invalid-feedback">
                            <?= $validation->getError('berat_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stok_produk">Stok produk <span style="color: red;">*</span> </label>
                        <input type="number" name="stok_produk" min="1" class="form-control <?= ($validation->hasError('stok_produk')) ? 'is-invalid' : ''; ?>" id="stok_produk" placeholder="0">
                        <div class="invalid-feedback">
                            <?= $validation->getError('stok_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_satuan">Satuan produk <span style="color: red;">*</span> </label>
                        <select class="form-select <?= ($validation->hasError('id_satuan')) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1" name="id_satuan" placeholder="0">
                            <option value="">Pilih Satuan</option>
                            <?php foreach ($view_satuan_produk as $vsp) :?>
                            <option value="<?= $vsp->id_satuan ;?>"><?= $vsp->nama_satuan ;?></option>
                            <?php endforeach ;?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_satuan'); ?>
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
                            <label class="custom-file-label" for="validatedCustomFile">Pilih gambar...</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('image_produk'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi produk</label>
                        <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"> <i class="feather icon-save"></i> Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php $no=0;
foreach ($view_produk as $vp) : $no++; ?>
<div id="exampleModalLivedetail<?= $vp->id_produk ;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLivedetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLivedetailLabel"> <i class="feather icon-eye"></i> Detail produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                 
                <!-- <div class="card mb-3" style="max-width: 540px;"> -->
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('/admin/dist/assets/images/produk/' . $vp->image_produk) ;?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title"><?= $vp->nama_produk ;?></h4>
                            <span>Kategori produk : <?= $vp->nama_kategori ;?></span><br>
                            <span>Sub kategori produk : <?= $vp->nama_sub_kategori ;?></span><br><br>
                            <span>Harga produk : Rp. <?= number_format($vp->harga_produk) ;?></span><br>
                            <span>Berat produk : <?= $vp->berat_produk ;?> Ons</span><br><br>
                            <span>Stok produk : <?= $vp->stok_produk ;?> <?= $vp->nama_satuan ;?> </span><br><br>
                            <p class="card-text">Deskripsi produk : <br> <?= $vp->deskripsi_produk ;?></p>
                            <p class="card-text"><small class="text-muted">Created at : <?= $vp->created_at ;?></small> <br> <small class="text-muted">Updated at : <?= $vp->updated_at ;?></small></p>
                        </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<?php endforeach ;?>

<!-- modal hapus -->
<?php $no=0;
foreach ($view_produk as $vp) : $no++; ?>
<div id="exampleModalLivehapus<?= $vp->id_produk ;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLivehapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLivehapusLabel"> <i class="feather icon-trash"></i> Hapus produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                 
                <p>Apakah anda yakin?, menghapus data produk <b><?= $vp->nama_produk ;?></b></p>
            </div>
            <div class="modal-footer">
                <form action="<?= base_url('/master/hapus_produk') ;?>" method="post">
                    <?= csrf_field() ;?>
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id_produk" id="id_produk" value="<?= $vp->id_produk ;?>">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ;?>

<?= $this->endSection() ?>