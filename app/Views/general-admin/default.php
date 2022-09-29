<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrator - GaneidaToko</title>
    <?= csrf_meta() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= base_url() ;?>/admin/dist/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ;?>/admin/dist/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/fc-4.0.1/fh-3.2.1/r-2.2.9/sb-1.3.0/datatables.min.css"/>

    <!-- vendor css -->
    <link rel="stylesheet" href="<?= base_url() ;?>/admin/dist/assets/css/style.css">
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<?= $this->include('general-admin/menu') ?>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<?= $this->include('general-admin/header') ?>
	<!-- [ Header ] end -->
	
	

    <!-- [ Main Content ] start -->
    <?= $this->renderSection('content') ?>
    <!-- [ Main Content ] end -->


    <!-- Required Js -->
    
    <script src="<?= base_url() ;?>/admin/dist/assets/js/jquery.min.js"></script>
    <!-- <script src="<//?= base_url() ;?>/admin/dist/assets/js/myscript.js"></script> -->
    <script src="<?= base_url() ;?>/admin/dist/assets/js/vendor-all.min.js"></script>
    <script src="<?= base_url() ;?>/admin/dist/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url() ;?>/admin/dist/assets/js/ripple.js"></script>
    <script src="<?= base_url() ;?>/admin/dist/assets/js/pcoded.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/fc-4.0.1/fh-3.2.1/r-2.2.9/sb-1.3.0/datatables.min.js"></script>

    <script>
        $('#myTable').DataTable( {
            responsive: true
        });
    </script>
    <script>
        function previewImage() {
            const image_produk = document.querySelector('#image_produk');
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
    <script>
        function previewImageUbah() {
            const image_produk = document.querySelector('#image_produkk');
            const image_produk_label_ubah = document.querySelector('#custom-file-label-ubah');
            const imagePreview = document.querySelector('.image-preview-ubah');

            image_produk_label_ubah.textContent = image_produk.files[0].name;

            const fileImage = new FileReader();
                    fileImage.readAsDataURL(image_produk.files[0]);

            fileImage.onload = function (e) {
                imagePreview.src = e.target.result;
            }
        }
    </script>

    <script>
        function previewImageKategori() {
            const image_kategori = document.querySelector('#image_kategori');
            const image_kategori_label = document.querySelector('.custom-file-label');
            const imagePreview = document.querySelector('.image-preview-kategori');

            image_kategori_label.textContent = image_kategori.files[0].name;

            const fileImage = new FileReader();
                    fileImage.readAsDataURL(image_kategori.files[0]);

            fileImage.onload = function (e) {
                imagePreview.src = e.target.result;
            }
        }
    </script>

    <script>
        function previewImageAdmin() {
            const image = document.querySelector('#image');
            const image_label = document.querySelector('.custom-file-label');
            const imagePreview = document.querySelector('.image-preview-profile-admin');

            image_label.textContent = image.files[0].name;

            const fileImage = new FileReader();
                    fileImage.readAsDataURL(image.files[0]);

            fileImage.onload = function (e) {
                imagePreview.src = e.target.result;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            // disable
            $('#nama_lengkap').attr('readonly', true);
            $('#email').attr('readonly', true);
            $('#password').attr('readonly', true);
            $('#image-admin').attr('readonly', true);
            // disable button
            $('#simpan-profile').attr('disabled', true);
            $('#batal-profile').attr('disabled', true);

            // jika button ubah-profile di klik maka akan mengaktifkan inputan dan button simpan profil 
            $('#ubah-profile').click(function() {
                $('#nama_lengkap').attr('readonly', false);
                $('#email').attr('readonly', false);
                $('#password').attr('readonly', false);
                $('#image-admin').attr('readonly', false);
                $('#simpan-profile').attr('disabled', false);
                $('#batal-profile').attr('disabled', false);
            });

            // jika button batal-profile di klik maka akan mengaktifkan inputan dan button simpan profil
            $('#batal-profile').click(function() {
                $('#nama_lengkap').attr('readonly', true);
                $('#email').attr('readonly', true);
                $('#password').attr('readonly', true);
                $('#image-admin').attr('readonly', true);
                $('#simpan-profile').attr('disabled', true);
                $('#batal-profile').attr('disabled', true);
            });
        });
    </script>
    

</body>

</html>
