<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daftar Toko Online</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>

        <!-- form daftar -->

        <div class="container">
			<div class="row align-items-center">
				<!-- bagi dua untuk gambar dan form -->
				<div class="col-md-6">
					<img src="<?= base_url('/admin/dist/assets/images/auth/toko.png') ?>" class="img-fluid" alt="Responsive image">
				</div>
				<div class="col-md-4 m-auto mt-4">
					<div class="card" style="border-style: none;">
						<div class="card-header" style="background: none;">
							<h3 class="card-title text-center">Toko Ganeida</h3>
						</div>
						<div class="card-body">
							<form action="<?= base_url('/auth/proses_register') ;?>" method="post">

                                <?= csrf_field() ;?>
                                <input type="hidden" name="_method" value="PUT" />

                                <div class="form-group mb-2">
                                    <label class="floating-label" for="nama_pelanggan">Nama lengkap</label>
                                    <input type="text" name="nama_pelanggan" class="form-control <?= ($validation->hasError('nama_pelanggan')) ? 'is-invalid' : ''; ?>" id="nama_pelanggan" value="<?= old('nama_pelanggan') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_pelanggan'); ?>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="floating-label" for="email_pelanggan">Email</label>
                                    <input type="email" name="email_pelanggan" class="form-control <?= ($validation->hasError('email_pelanggan')) ? 'is-invalid' : ''; ?>" id="email_pelanggan" value="<?= old('email_pelanggan') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email_pelanggan'); ?>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="floating-label" for="alamat_pelanggan">Alamat</label>
                                    <input type="text" name="alamat_pelanggan" class="form-control <?= ($validation->hasError('alamat_pelanggan')) ? 'is-invalid' : ''; ?>" id="alamat_pelanggan" value="<?= old('alamat_pelanggan') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_pelanggan'); ?>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="floating-label" for="telepon_pelanggan">Telp/Hp +62</label>
                                    <input type="text" name="telepon_pelanggan" class="form-control <?= ($validation->hasError('telepon_pelanggan')) ? 'is-invalid' : ''; ?>" id="telepon_pelanggan" value="<?= old('telepon_pelanggan') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telepon_pelanggan'); ?>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="floating-label" for="password_pelanggan">Kata sandi</label>
                                    <input type="password" name="password_pelanggan" class="form-control <?= ($validation->hasError('password_pelanggan')) ? 'is-invalid' : ''; ?>" id="password_pelanggan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password_pelanggan'); ?>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="floating-label" for="password2_pelanggan">Konfirmasi kata sandi</label>
                                    <input type="password" name="password2_pelanggan" class="form-control <?= ($validation->hasError('password2_pelanggan')) ? 'is-invalid' : ''; ?>" id="password2_pelanggan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password2_pelanggan'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-block mb-4">Daftar</button>
                                </div>
                                <div class="row text-center">
									<a href="<?= base_url('/') ;?>">Kembali ke halaman utama</a>
									<p>Sudah punya akun? <a href="/auth">Masuk</a> </p>
								</div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>

        <!-- akhir form daftar -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>
