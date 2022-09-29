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
                        <h5>Edit Kategori</h5>
                    </div>
                    <div class="card-body">
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

                        <form action="<?= base_url('/master/proses_ubah_kategori') ;?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ;?>
                            <input type="hidden" name="_method" value="PUT" />
                            
                            <input type="hidden" name="id_kategori" id="id_kategori" value="<?= $kategori_produk->id_kategori ;?>">

                            <input type="hidden" name="image_kategori_lama" id="image_kategori_lama" value="<?= $kategori_produk->image_kategori ;?>">

                            <div class="form-group">
                                <label for="nama_kategori">Nama kategori <span style="color: red;">*</span> </label>
                                <input type="text" name="nama_kategori" class="form-control <?= ($validation->hasError('nama_kategori')) ? 'is-invalid' : ''; ?>" id="nama_kategori" value="<?= $kategori_produk->nama_kategori ;?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_kategori'); ?>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label for="inputAddress2">Image kategori</label>
                            </div>
                            <div class="form-group">
                                <img width="100" src="<?= base_url('admin/dist/assets/images/foto_kategori/' . $kategori_produk->image_kategori) ;?>" alt="" class="image-preview-kategori">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('image_kategori')) ? 'is-invalid' : ''; ?>" id="image_kategori" name="image_kategori" onchange="previewImageKategori()">
                                    <label class="custom-file-label" for="validatedCustomFile"><?= $kategori_produk->image_kategori ;?></label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image_kategori'); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"> <i class="feather icon-save"></i> Ubah</button>
                            <a href="<?= base_url('/kategori') ;?>" class="btn btn-danger"> Batal</a>
                        </form>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<?= $this->endSection() ?>