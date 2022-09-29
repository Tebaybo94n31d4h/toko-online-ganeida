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
                        <h5>Profile</h5>
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
                    </div>

                    <!-- profile -->
                    <div class="row">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <div class="card-body text-center">
                                <img style="border-radius: 50%;" width="100px" src="<?= base_url('/admin/dist/assets/images/user/'. $profile->image) ;?>" alt="">
                            </div>
                            <div class="card-body text-center">
                                <h4 class="card-title" style="font-size: 14px;"><?= $profile->nama_lengkap ;?></h4>
                                <p class="card-text"><?= $profile->email ;?></p>
                            </div>
                            <!-- button edit -->
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-sm btn-primary" id="ubah-profile">Edit</button>
                            </div>
                        </div>
                        <!-- edit profile -->
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 m-auto">
                            <div class="card-body">
                                <form action="<?= base_url('/profile/proses_ubah_profile') ;?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ;?>
                                    <input type="hidden" name="id_admin" id="id_admin" value="<?= $profile->id ;?>">
                                    <input type="hidden" name="image_lama" id="image_lama" value="<?= $profile->image ;?>">
                                    <input type="hidden" name="password_lama" id="password_lama" value="<?= $profile->password ;?>">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap</label>
                                        <input type="text" class="form-control<?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" name="nama_lengkap" value="<?= $profile->nama_lengkap ;?>" readonly>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_lengkap') ;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control<?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= $profile->email ;?>" readonly>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email') ;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control<?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" readonly>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password') ;?>
                                        </div>
                                    </div>
                                    <div class="row" id="image-admin">
                                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                            <!-- image -->
                                            <div class="form-group">
                                                <img width="100" src="<?= base_url('/admin/dist/assets/images/user/'. $profile->image) ;?>" alt="" class="image-preview-profile-admin">
                                            </div>
                                        </div>
                                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-9">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImageAdmin()">
                                                    <label class="custom-file-label" for="validatedCustomFile">Pilih gambar...</label>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('image'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- button simpan -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary" id="simpan-profile">Edit Profile</button>
                                        <button type="button" class="btn btn-sm btn-danger" id="batal-profile">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end profile -->

                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


<?= $this->endSection() ?>