<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Masuk Toko Online</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	</head>
	<body>

		<!-- form login -->
		<div class="container">
			<div class="row align-items-center">
				<!-- bagi dua untuk gambar dan form -->
				<div class="col-md-6">
					<img src="<?= base_url('/admin/dist/assets/images/auth/toko.png') ?>" class="img-fluid" alt="Responsive image">
				</div>
				<div class="col-md-4 m-auto">
					<div class="card" style="border-style: none;">
						<div class="card-header" style="background: none;">
							<h3 class="card-title text-center">Toko Ganeida</h3>
						</div>
						<div class="card-body">
							<form action="<?= base_url('auth/proses_login') ;?>" method="post">
                            <?= csrf_field() ?>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="floatingInputInvalid" placeholder="name@example.com">
                                    <label for="floatingInputInvalid">Email</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="floatingInputInvalid" placeholder="Password">
                                    <label for="floatingInputInvalid">Password</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg mb-4">Masuk</button>
                                </div>
								<div class="row text-center">
									<a href="<?= base_url('/') ;?>">Kembali ke halaman utama</a>
									<p>Belum punya akun? <a href="auth/register">Daftar disini</a> </p>
								</div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end form login -->

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	</body>
</html>