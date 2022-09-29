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
                        <h5>Data Kategori Pilihan</h5>
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
                                    <th>Nama Kategori</th>
                                    <th>Aktif Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ;?>
                                <?php foreach ($kategori_pilihan as $vkp) : ?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td><?= $vkp->nama_kategori_pilihan ;?></td>
                                    <td>
                                        <?php if ($vkp->aktif_kategori_pilihan == 1):?>
                                                <span class="badge badge-success">Aktif</span>
                                           <?php else :?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                        <?php endif ;?>
                                    <td>
                                        <a data-toggle="modal" data-target="#exampleModalLiveUbah<?= $vkp->id_kategori_pilihan ;?>" class="badge badge-success text-white" style="cursor: pointer;" id="btn-edit"> <i class="feather icon-edit"></i> Ubah</a>
                                        <a data-toggle="modal" data-target="#exampleModalLivehapus<?= $vkp->id_kategori_pilihan ;?>" class="badge badge-danger text-white" style="cursor: pointer;" id="btn-edit"> <i class="feather icon-trash"></i> Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLivetambahLabel"> <i class="feather icon-plus"></i> Tambah kategori pilihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('master/tambah_kategori_pilihan') ;?>" method="POST">
            <?= csrf_field() ;?>
            <input type="hidden" name="_method" value="PUT" />

                <div class="modal-body">              
                    <div class="form-group">
                        <label for="nama_kategori_pilihan">Nama kategori Pilihan<span style="color: red;">*</span> </label>
                        <input type="text" name="nama_kategori_pilihan" class="form-control <?= ($validation->hasError('nama_kategori_pilihan')) ? 'is-invalid' : ''; ?>" id="nama_kategori_pilihan" placeholder="Nama kategori pilihan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_kategori_pilihan'); ?>
                        </div>
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

<!-- modal edit -->
<?php $no=0;
foreach ($kategori_pilihan as $vkp) : $no++; ?>
<div id="exampleModalLiveUbah<?= $vkp->id_kategori_pilihan ;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveUbahLabel"> <i class="feather icon-eye"></i> Ubah kategori Pilihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                 
                <form action="<?= base_url('master/proses_edit_kategori_pilihan') ;?>" method="POST">
                    <?= csrf_field() ;?>
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id_kategori_pilihan" value="<?= $vkp->id_kategori_pilihan ;?>">
                        <div class="form-group">
                            <label for="nama_kategori_pilihan">Nama kategori Pilihan <span style="color: red;">*</span> </label>
                            <input type="text" name="nama_kategori_pilihan" class="form-control <?= ($validation->hasError('nama_kategori_pilihan')) ? 'is-invalid' : ''; ?>" id="nama_kategori_pilihan" placeholder="Nama kategori pilihan" value="<?= $vkp->nama_kategori_pilihan ;?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_kategori_pilihan'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"> <i class="feather icon-save"></i> Ubah</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ;?>

<!-- modal hapus -->
<?php $no=0;
foreach ($kategori_pilihan as $vkp) : $no++; ?>
<div id="exampleModalLivehapus<?= $vkp->id_kategori_pilihan ;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLivehapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLivehapusLabel"> <i class="feather icon-trash"></i> Hapus kategori Pilihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                 
                <p>Apakah anda yakin?, menghapus data kategori pilihan <b><?= $vkp->nama_kategori_pilihan ;?></b></p>
            </div>
            <div class="modal-footer">
                <form action="<?= base_url('/master/hapus_kategori_pilihan') ;?>" method="post">
                    <?= csrf_field() ;?>
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id_kategori_pilihan" id="id_kategori_pilihan" value="<?= $vkp->id_kategori_pilihan ;?>">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ;?>


<?= $this->endSection() ?>