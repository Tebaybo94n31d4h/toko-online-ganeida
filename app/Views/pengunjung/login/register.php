<!DOCTYPE html>
<html lang="en">

<head>

	<title>Daftar</title>
    <?= csrf_meta() ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="GaneidaToko" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?= base_url() ;?>/admin/dist/assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?= base_url() ;?>/admin/dist/assets/css/style.css">
</head>

<body>

<!-- [ auth-signup ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<h2 class="mb-4">Toko<span style="color: blueviolet;"><b>Ganeida</b></span> </h2>
						<h4 class="mb-3 f-w-400">Daftar</h4>
                        <form action="<?= base_url('auth/proses_register') ;?>" method="post">
                            <?= csrf_field() ?>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="nama_lengkap">Nama lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" value="<?= old('nama_lengkap') ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_lengkap'); ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="email">Alamat email</label>
                                <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= old('email') ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email'); ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="floating-label" for="password">Kata sandi</label>
                                <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="password2">Konfirmasi kata sandi</label>
                                <input type="password" name="password2" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" id="password2">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password2'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Daftar</button>
                        </form>
						<p class="mb-2">Sudah memiliki akun? <a href="<?= base_url('/login') ;?>" class="f-w-400">Masuk</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signup ] end -->

<!-- Required Js -->
<script src="<?= base_url() ;?>/admin/dist/assets/js/vendor-all.min.js"></script>
<script src="<?= base_url() ;?>/admin/dist/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= base_url() ;?>/admin/dist/assets/js/ripple.js"></script>
<script src="<?= base_url() ;?>/admin/dist/assets/js/pcoded.min.js"></script>



</body>

</html>
