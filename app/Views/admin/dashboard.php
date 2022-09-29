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
                            <h5 class="m-b-10">Dashboard</h5>
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
            <!-- seo start -->
            <div class="col-xl-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3>Produk</h3>
                                <h6 class="text-muted m-b-0">
                                    <?php
                                    // db connection
                                    $db = \Config\Database::connect();
                                    $query = $db->query("SELECT * FROM produk");
                                    echo $query->getNumRows();
                                    ?> Item
                                    <i class="fa fa-caret-down text-c-red m-l-10"></i>
                                </h6>
                            </div>
                            <div class="col-6">
                                <div id="seo-chart1" class="d-flex align-items-end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3>Kategori Produk</h3>
                                <h6 class="text-muted m-b-0">
                                    <?php
                                    // db connection
                                    $db = \Config\Database::connect();
                                    $query = $db->query("SELECT * FROM kategori_produk");
                                    echo $query->getNumRows();
                                    ?> Kategori Produk
                                    <i class="fa fa-caret-up text-c-green m-l-10"></i>
                                </h6>
                            </div>
                            <div class="col-6">
                                <div id="seo-chart2" class="d-flex align-items-end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h3>Kategori Pilihan</h3>
                                <h6 class="text-muted m-b-0">
                                    <?php
                                    // db connection
                                    $db = \Config\Database::connect();
                                    $query = $db->query("SELECT * FROM kategori_pilihan");
                                    echo $query->getNumRows();
                                    ?> Kategori Pilihan
                                    <i class="fa fa-caret-down text-c-red m-l-10"></i>
                                </h6>
                            </div>
                            <div class="col-6">
                                <div id="seo-chart3" class="d-flex align-items-end"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- seo end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<?= $this->endSection() ?>