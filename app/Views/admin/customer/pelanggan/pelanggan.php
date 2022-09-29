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
                        <h5>Data Pelanggan</h5>
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
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image Pelanggan</th>
                                    <th>Nama pelanggan</th>
                                    <th>Email pelanggan</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ;?>
                                <?php foreach ($view_pelanggan as $vp) : ?>
                                <tr>
                                    <td><?= $no ;?></td>
                                    <td>
                                        <img width="50" class="img-radius align-top m-r-15" src="<?= base_url('/admin/dist/assets/images/user_pelanggan/' . $vp->image_pelanggan) ;?>" alt="">
                                    </td>
                                    <td><?= $vp->nama_pelanggan ;?></td>
                                    <td><?= $vp->email_pelanggan ;?></td>
                                    <td>
                                        <?php if ($vp->aktif_pelanggan == 1) :?>
                                            <span class="badge badge-light-primary">Aktif</span>
                                        <?php else :?>
                                            <span class="badge badge-light-danger">Tidak aktif</span>
                                        <?php endif ;?>
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#exampleModalLivedetail<?= $vp->id_pelanggan ;?>" class="badge badge-info text-white" style="cursor: pointer;" id="btn-edit"> <i class="feather icon-eye"></i> Detail</a>
                                        <a data-toggle="modal" data-target="#exampleModalLivehapus<?= $vp->id_pelanggan ;?>" class="badge badge-danger text-white" style="cursor: pointer;" id="btn-edit"> <i class="feather icon-trash"></i> Hapus</a>
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


<!-- modal detail -->
<?php $no=0;
foreach ($view_pelanggan as $vp) : $no++; ?>
<div id="exampleModalLivedetail<?= $vp->id_pelanggan ;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLivedetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLivedetailLabel"> <i class="feather icon-eye"></i> Detail pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                 
                <!-- <div class="card mb-3" style="max-width: 540px;"> -->
                <div class="col-xl-12 col-md-12">
                    <!-- <div class="card user-card user-card-1"> -->
                        <div class="card-body pt-0">
                            <div class="user-about-block text-center">
                                <div class="row align-items-end">
                                    <div class="col"></div>
                                    <div class="col"><img class="img-radius img-fluid wid-80" src="<?= base_url('/admin/dist/assets/images/user_pelanggan/' . $vp->image_pelanggan ) ;?>" alt="User image"></div>
                                    <div class="col"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h6 class="mb-1 mt-3"><?= $vp->nama_pelanggan ;?></h6>
                                <p class="mb-3 text-muted"><?= $vp->email_pelanggan ;?></p>
                                <p class="mb-1"><?= $vp->telepon_pelanggan ;?></p>
                                <p class="mb-0"><?= $vp->alamat_pelanggan ;?></p>
                            </div>
                            <hr class="wid-80 b-wid-3 my-4">
                            <div class="row text-center">
                                <div class="col">
                                    <h6 class="mb-1">37</h6>
                                    <p class="mb-0">Mails</p>
                                </div>
                                <div class="col">
                                    <h6 class="mb-1">2749</h6>
                                    <p class="mb-0">Followers</p>
                                </div>
                                <div class="col">
                                    <h6 class="mb-1">678</h6>
                                    <p class="mb-0">Following</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col">
                                    <h6 class="mb-1 text-muted"><?= $vp->created_at ;?></h6>
                                    <p class="mb-0">Created at</p>
                                </div>
                                <div class="col">
                                    <h6 class="mb-1 text-muted"><?= $vp->updated_at ;?></h6>
                                    <p class="mb-0">Updated at</p>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ;?>

<!-- modal hapus -->
<?php $no=0;
foreach ($view_pelanggan as $vp) : $no++; ?>
<div id="exampleModalLivehapus<?= $vp->id_pelanggan ;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLivehapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLivehapusLabel"> <i class="feather icon-trash"></i> Hapus pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">                 
                <p>Apakah anda yakin?, menghapus data pelanggan <b><?= $vp->nama_pelanggan ;?></b></p>
            </div>
            <div class="modal-footer">
                <form action="<?= base_url('/customer/hapus_pelanggan') ;?>" method="post">
                    <?= csrf_field() ;?>
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?= $vp->id_pelanggan ;?>">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ;?>

<?= $this->endSection() ?>