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
                        <h5>Edit Produk</h5>
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

                        <form action="<?= base_url('/master/proses_ubah_produk') ;?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ;?>
                            <input type="hidden" name="_method" value="PUT" />
                            
                            <input type="hidden" name="id_produk" id="id_produk" value="<?= $detail_produk->id_produk ;?>">

                            <input type="hidden" name="image_produk_lama" id="image_produk_lama" value="<?= $detail_produk->image_produk ;?>">

                            <div class="form-group">
                                <label for="id_kategori">Kategori produk <span style="color: red;">*</span> </label>
                                <select class="form-select <?= ($validation->hasError('id_karegori')) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1" name="id_kategori">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($view_kategori_produk as $vkp) :?>
                                        <?php if ($vkp->id_kategori == $detail_produk->id_kategori) : ?>
                                                <option value="<?= $vkp->id_kategori ;?>" selected><?= $vkp->nama_kategori ;?></option>
                                            <?php else :?>
                                                <option value="<?= $vkp->id_kategori ;?>"><?= $vkp->nama_kategori ;?></option>
                                        <?php endif ;?>
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
                                        <?php if ($vskp->id_sub_kategori == $detail_produk->id_sub_kategori) : ?>
                                                <option value="<?= $vskp->id_sub_kategori ;?>" selected><?= $vskp->nama_sub_kategori ;?></option>
                                            <?php else :?>
                                                <option value="<?= $vskp->id_sub_kategori ;?>"><?= $vskp->nama_sub_kategori ;?></option>
                                        <?php endif ;?>
                                    <?php endforeach ;?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_sub_kategori'); ?>
                                </div>
                            </div>
                            <!-- kategori pilihan -->
                            <div class="form-group">
                                <label for="id_kategori_pilihan">Kategori Pilihan <span style="color: red;">*</span> </label>
                                <select class="form-select <?= ($validation->hasError('id_kategori_pilihan')) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1" name="id_kategori_pilihan">
                                    <option value="">Pilih Kategori Pilihan</option>
                                    <?php foreach ($view_kategori_pilihan as $vkp) :?>
                                        <?php if ($vkp->id_kategori_pilihan == $detail_produk->id_kategori_pilihan) : ?>
                                                <option value="<?= $vkp->id_kategori_pilihan ;?>" selected><?= $vkp->nama_kategori_pilihan ;?></option>
                                            <?php else :?>
                                                <option value="<?= $vkp->id_kategori_pilihan ;?>"><?= $vkp->nama_kategori_pilihan ;?></option>
                                        <?php endif ;?>
                                    <?php endforeach ;?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('id_kategori_pilihan'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_produk">Nama produk <span style="color: red;">*</span> </label>
                                <input type="text" name="nama_produk" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" id="nama_produk" value="<?= $detail_produk->nama_produk ;?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_produk'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="harga_produk">Harga produk (Rp.) <span style="color: red;">*</span> </label>
                                <input type="number" name="harga_produk" class="form-control <?= ($validation->hasError('harga_produk')) ? 'is-invalid' : ''; ?>" id="harga_produk" value="<?= $detail_produk->harga_produk ;?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga_produk'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="berat_produk">Berat produk <span style="color: red;">*</span> </label>
                                <input type="number" name="berat_produk" class="form-control <?= ($validation->hasError('berat_produk')) ? 'is-invalid' : ''; ?>" id="berat_produk" value="<?= $detail_produk->berat_produk ;?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('berat_produk'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stok_produk">Stok produk <span style="color: red;">*</span> </label>
                                <input type="number" name="stok_produk" class="form-control <?= ($validation->hasError('stok_produk')) ? 'is-invalid' : ''; ?>" id="stok_produk" value="<?= $detail_produk->stok_produk ;?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stok_produk'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="id_satuan">Satuan produk <span style="color: red;">*</span> </label>
                                <select class="form-select <?= ($validation->hasError('id_satuan')) ? 'is-invalid' : ''; ?>" id="exampleFormControlSelect1" name="id_satuan">
                                    <option value="">Pilih Satuan</option>
                                    <?php foreach ($view_satuan_produk as $vsp) :?>
                                        <?php if ($vsp->id_satuan == $detail_produk->id_satuan) : ?>
                                                <option value="<?= $vsp->id_satuan ;?>" selected><?= $vsp->nama_satuan ;?></option>
                                            <?php else :?>
                                                <option value="<?= $vsp->id_satuan ;?>"><?= $vsp->nama_satuan ;?></option>
                                        <?php endif ;?>
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
                                <img width="100" src="<?= base_url('admin/dist/assets/images/produk/' . $detail_produk->image_produk) ;?>" alt="" class="image-preview">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('image_produk')) ? 'is-invalid' : ''; ?>" id="image_produk" name="image_produk" onchange="previewImage()">
                                    <label class="custom-file-label" for="validatedCustomFile"><?= $detail_produk->image_produk ;?></label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image_produk'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_produk">Deskripsi produk</label>
                                <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk" rows="3"><?= $detail_produk->deskripsi_produk ;?></textarea>
                            </div>
                            <a href="<?= base_url('/produk') ;?>" class="btn btn-danger"> Batal</a>
                            <button type="submit" class="btn btn-success"> <i class="feather icon-save"></i> Ubah</button>
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