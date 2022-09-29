<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Additional Routing untuk Administrator
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Home::index');

// routing Administrator daftar
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/proses_register', 'Auth::proses_register');
// akhir routing Administrator daftar

// routing Administrator login
$routes->get('auth', 'Auth::index');
$routes->post('auth/proses_login', 'Auth::proses_login');
// akhir routing Administrator login

// routing Administrator logout
$routes->get('/logout', 'Auth::logout', ['filter' => 'filterauth']);
// akhir routing Administrator logout

// routing Administrator dashboard
$routes->get('/dashboard', 'Administrator::index', ['filter' => 'filterauth']);
// akhir routing Administrator dashboard

// profile
$routes->get('/profile', 'Profile::index', ['filter' => 'filterauth']);
$routes->put('/proses_ubah_profile', 'Profile::proses_ubah_profile', ['filter' => 'filterauth']);

// routing Administrator produk
$routes->get('/produk', 'Master::produk', ['filter' => 'filterauth']);
$routes->post('master/tambah_produk', 'Master::tambah_produk', ['filter' => 'filterauth']);
$routes->get('/edit_produk/(:num)', 'Master::edit_produk/$1', ['filter' => 'filterauth']);
$routes->get('/detail_produk/(:num)', 'Master::detail_produk/$1', ['filter' => 'filterauth']);
$routes->put('master/proses_ubah_produk', 'Master::proses_ubah_produk', ['filter' => 'filterauth']);
$routes->delete('master/hapus_produk', 'Master::hapus_produk', ['filter' => 'filterauth']);
// akhir routing Administrator produk

// routing Administrator kategori
$routes->get('/kategori', 'Master::kategori', ['filter' => 'filterauth']);
$routes->post('master/tambah_kategori', 'Master::tambah_kategori', ['filter' => 'filterauth']);
$routes->get('/edit_kategori/(:num)', 'Master::edit_kategori/$1', ['filter' => 'filterauth']);
$routes->put('master/proses_ubah_kategori', 'Master::proses_ubah_kategori', ['filter' => 'filterauth']);
$routes->delete('master/hapus_kategori', 'Master::hapus_kategori', ['filter' => 'filterauth']);
// akhir routing Administrator kategori

// routing Administrator kategori_pilihan
$routes->get('/kategori_pilihan', 'Master::kategori_pilihan', ['filter' => 'filterauth']);
$routes->post('master/tambah_kategori_pilihan', 'Master::tambah_kategori_pilihan', ['filter' => 'filterauth']);
$routes->put('master/proses_edit_kategori_pilihan', 'Master::proses_edit_kategori_pilihan', ['filter' => 'filterauth']);
$routes->delete('master/hapus_kategori_pilihan', 'Master::hapus_kategori_pilihan', ['filter' => 'filterauth']);
// akhir routing Administrator kategori

// routing Administrator sub kategori
$routes->get('master/sub_kategori/(:num)', 'Master::sub_kategori/$1', ['filter' => 'filterauth']);
$routes->post('master/tambah_sub_kategori', 'Master::tambah_sub_kategori', ['filter' => 'filterauth']);
$routes->put('master/proses_ubah_sub_kategori', 'Master::proses_ubah_sub_kategori', ['filter' => 'filterauth']);
$routes->delete('master/hapus_sub_kategori', 'Master::hapus_sub_kategori', ['filter' => 'filterauth']);
// akhir routing Administrator sub kategori

// routing Administrator pembelian
$routes->get('/pembelian', 'Customer::pembelian', ['filter' => 'filterauth']);
$routes->get('/detail_pembelian/(:num)', 'Customer::detail_pembelian/$1', ['filter' => 'filterauth']);
$routes->put('/ubah_status_pembelian', 'Customer::ubah_status_pembelian', ['filter' => 'filterauth']);
// akhir routing Administrator pembelian
$routes->get('/lihat_pembayaran/(:num)', 'Customer::lihat_pembayaran/$1', ['filter' => 'filterauth']);
$routes->post('customer/proses_lihat_pembayaran/(:num)', 'Customer::proses_lihat_pembayaran/$1', ['filter' => 'filterauth']);

// routing Administrator pelanggan
$routes->get('/pelanggan', 'Customer::pelanggan', ['filter' => 'filterauth']);
$routes->delete('/hapus_pelanggan', 'Customer::hapus_pelanggan', ['filter' => 'filterauth']);
// akhir routing Administrator pelanggan
$routes->get('/laporan', 'Laporan::index', ['filter' => 'filterauth']);


/*
 * --------------------------------------------------------------------
 * Additional Routing untuk Pengunjung
 * --------------------------------------------------------------------
*/

$routes->get('home/detail_produk/(:num)', 'Home::detail_produk/$1');
$routes->post('home/detail_produk_beli/(:num)', 'Home::detail_produk_beli/$1');

// routing pengunjung lihat kategori
$routes->get('/kategori/(:num)', 'Kategori::index/$1');
// akhir routing pengunjung lihat kategori

// routing pengunjung beli produk
$routes->Post('/beli/(:num)', 'Home::beli/$1');
// akhir routing pengunjung beli produk

// routing pengunjung beli produk masuk keranjang
$routes->get('/keranjang/(:num)', 'Keranjang::index');
$routes->delete('keranjang/hapus_produk_keranjang/(:num)', 'Keranjang::hapus_produk_keranjang');
// akhir routing pengunjung beli produk masuk keranjang
$routes->get('/pembayaran/(:num)', 'Pembayaran::index/$1', ['filter' => 'filterauth']);
$routes->post('pembayaran/proses_pembayaran', 'Pembayaran::proses_pembayaran');

// lihat pembayaran
$routes->get('/lihatpembayaran/(:num)', 'LihatPembayaran::index/$1');

// routing pengunjung beli produk masuk keranjang
$routes->get('/checkout', 'Checkout::index', ['filter' => 'filterauth']);
$routes->post('checkout/proses_checkout', 'Checkout::proses_checkout', ['filter' => 'filterauth']);
// akhir routing pengunjung beli produk masuk keranjang
$routes->get('/nota/(:num)', 'Nota::index/$1', ['filter' => 'filterauth']);

$routes->get('/riwayat', 'Riwayat::index', ['filter' => 'filterauth']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
