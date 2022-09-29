<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Ganeida Online</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?= base_url('/admin/dist/assets/css/style2.css') ;?>">
    <link rel="stylesheet" href="<?= base_url('/admin/dist/assets/css/style1.css') ;?>">
    <link rel="stylesheet" href="<?= base_url('/admin/dist/assets/owlcarousel/dist/assets/owl.carousel.min.css') ;?>">
    <link rel="stylesheet" href="<?= base_url('/admin/dist/assets/owlcarousel/dist/assets/owl.theme.default.min.css') ;?>">

    <!-- animasi style sweet alert -->
    <link rel="stylesheet" href="<?= htmlentities(base_url('/switalert/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?= htmlentities(base_url('/switalert/sweetalert2.min.css')); ?>">

</head>
<body>

    <div id="pesan" data-pesan="<?= session()->getFlashdata('pesan');  ?>"></div>
<!-- header section starts  -->

<?= $this->include('pengunjung/template/header') ?>

<!-- header section ends -->

<!-- Content section starts -->

 <?= $this->renderSection('content') ?>

<!-- Content section ends -->

<!-- footer section  -->

<?= $this->include('pengunjung/template/footer') ?>

<!-- footer section ends  -->

<!-- modal user-profile -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Profile</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <style>
          .modal-body{
              font-size: 14px;
          }
          .modal-body input {
                width: 100%;
                height: 40px;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding-left: 10px;
                font-size: 14px;
          }
          .modal-body h5 {
                font-size: 18px;
                font-weight: bold;
          }
      </style>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="user-profile">
                                <div class="user-image">
                                    <img class="img-thumbnail" style="border-radius: 50%;" width="100px" src="<?= base_url('/admin/dist/assets/images/user_pelanggan/' . session()->image_pelanggan) ;?>" alt="User Image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 m-auto">
                            <div class="user-details text-center">
                                <h5><?= session()->nama_pelanggan ;?></h5>
                                <p><?= session()->email_pelanggan ;?></p>
                                <p><?= session()->alamat_pelanggan ;?></p>
                                <p><?= session()->telepon_pelanggan ;?></p>
                            </div>
                            <!-- tombol logout -->
                            <div class="text-center m-3">
                                <a href="<?= base_url('/logout') ;?>" class="btn btn-danger btn-lg">
                                    <!-- icon logout -->
                                    <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- custom js file link  -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="<?= base_url('/admin/dist/assets/js/script1.js') ;?>"></script>
<script src="<?= base_url('/admin/dist/assets/js/script.js') ;?>"></script>
<script src="<?= base_url('/admin/dist/assets/js/jquery.min.js') ;?>"></script>
<script src="<?= base_url('/admin/dist/assets/owlcarousel/dist/owl.carousel.min.js') ;?>"></script>

<!-- animasi sweet alert -->
<script src="<?= htmlentities(base_url('/switalert/sweetalert2.min.js')); ?>"></script>

<script>
    $('.owl-carousel-kategori').owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        nav:true,
        dots:false, 
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },            
            960:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });
    var owl = $('.owl-carousel-kategori');
    owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
</script>
<script>
    $('.owl-carousel-slider').owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        nav:false,
        dots:false, 
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
    var owl = $('.owl-carousel-slider');
    owl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
</script>
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
<script>
    $(document).ready(function(){
        $('.ongkos_kirim').change(function(){
            var id_ongkir = $(this).val();
            console.log(id_ongkir);
            $.ajax({
                url: "<?= base_url('/checkout/get_ongkir') ;?>",
                method: "POST",
                data: {id_ongkir:id_ongkir},
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    const rupiah = (number)=>{
                            return new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                            }).format(number);
                        }

                    // ambil total_belanja dari form checkout 
                    var total_belanja = $('.total_belanjaan').val();
                    console.log(total_belanja);
                    var biaya_ongkir = $('#biaya_ongkir').html(rupiah(data.biaya_ongkir));
                    // jumlahkan total_belanja dan biaya_ongkir 
                    var total_bayar = parseFloat(total_belanja) + parseFloat(data.biaya_ongkir);
                    $('.total_bayar').html(rupiah(total_bayar));
                }
            });
        });
    });
</script>
<script>
    // jika tombol user-profile di klik maka akan menampilkan modal profile user 
    $('.user-profile').on('click', function() {
        $('#modal-user-profile').modal('show');
    });
</script>
<script>
    function previewImage() {
        const image_produk = document.querySelector('.custom-file-input');
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
    
</body>
</html>