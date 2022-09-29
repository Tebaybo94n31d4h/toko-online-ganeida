<!DOCTYPE html>
<html lang="en">

<head>
    <title>GaneidaToko</title>
    <?= csrf_meta() ;?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url() ;?>/admin/dist/assets/images/favicon.ico" type="image/x-icon">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <!-- prism css -->
    <link rel="stylesheet" href="<?= base_url() ;?>/admin/dist/assets/css/plugins/prism-coy.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ;?>/admin/dist/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/admin/dist/assets/css/owl.carousel.min.css">
    
    

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <div id="pesan" data-pesan="<?= session()->getFlashdata('pesan');  ?>"></div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <?= $this->include('general-pengunjung/menu') ?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?= $this->include('general-pengunjung/header') ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <?= $this->renderSection('content') ?>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="<?= base_url() ;?>/admin/dist/assets/js/jquery.min.js"></script>
    <!-- <script src="<//?= base_url() ;?>/admin/dist/assets/js/owl.carousel.min.js"></script> -->
    <script src="<?= base_url() ;?>/admin/dist/assets/js/vendor-all.min.js"></script>
    <!-- <script src="<?= base_url() ;?>/admin/dist/assets/js/plugins/bootstrap.min.js"></script> -->
    <script src="<?= base_url() ;?>/admin/dist/assets/js/ripple.js"></script>
    <script src="<?= base_url() ;?>/admin/dist/assets/js/pcoded.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- <script src="sweetalert2.min.js"></script> -->

    <!-- prism Js -->
    <script src="<?= base_url() ;?>/admin/dist/assets/js/plugins/prism.js"></script>

    <script src="<?= base_url() ;?>/admin/dist/assets/js/horizontal-menu.js"></script>
    <script>
        (function() {
            if ($('#layout-sidenav').hasClass('sidenav-horizontal') || window.layoutHelpers.isSmallScreen()) {
                return;
            }
            try {
                window.layoutHelpers._getSetting("Rtl")
                window.layoutHelpers.setCollapsed(
                    localStorage.getItem('layoutCollapsed') === 'true',
                    false
                );
            } catch (e) {}
        })();
        $(function() {
            $('#layout-sidenav').each(function() {
                new SideNav(this, {
                    orientation: $(this).hasClass('sidenav-horizontal') ? 'horizontal' : 'vertical'
                });
            });
            $('body').on('click', '.layout-sidenav-toggle', function(e) {
                e.preventDefault();
                window.layoutHelpers.toggleCollapsed();
                if (!window.layoutHelpers.isSmallScreen()) {
                    try {
                        localStorage.setItem('layoutCollapsed', String(window.layoutHelpers.isCollapsed()));
                    } catch (e) {}
                }
            });
        });
        $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                themelayout: 'horizontal',
                MenuTrigger: 'hover',
                SubMenuTrigger: 'hover',
            });
        });
    </script>
    <script>
        function previewImage() {
            const image_produk = document.querySelector('#bukti_pembayaran');
            const image_produk_label = document.querySelector('.custom-file-label');
            const imagePreview = document.querySelector('.image-preview');

            image_produk_label.textContent = image_produk.files[0].name;

            const fileImage = new FileReader();
                    fileImage.readAsDataURL(image_produk.files[0]);

            fileImage.onload = function (e) {
                imagePreview.src = e.target.result;
            }
        }
    </script>
    
    <script src="<?= base_url() ;?>/admin/dist/assets/js/analytics.js"></script>

    <script>
    var  pesan = $('#pesan').data('pesan');
        if (pesan) {
            Swal.fire({
                position: 'top',
                icon: 'info',
                title: pesan,
                showConfirmButton: false,
                timer: 2000
            })
        }
</script>
    

</body>

</html>
