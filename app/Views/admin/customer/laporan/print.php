<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Toko Ganeida Online</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>

        <!-- print -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-center">LAPORAN PEMBELIAN <br> Tanggal <?= date('d-m-Y', strtotime($tanggal_mulai)) ?> Sampai <?= date('d-m-Y', strtotime($tanggal_akhir)) ?></h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0 ;?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($print as $p => $jumlah) : ?>
                                        <?php $total+=$jumlah['total_pembelian'] ;?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?= date('d-m-Y', strtotime($jumlah['tanggal_pembelian'])) ?>

                                            </td>
                                            <td><?= $jumlah['nama_pelanggan'] ?></td>
                                            <td>Rp. <?= number_format($jumlah['total_pembelian']) ?></td>
                                            <td><?= $jumlah['status_pembelian'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><strong>Total</strong></td>
                                        <td><strong>Rp. <?= number_format($total) ?></strong></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end print -->

        <!-- window print -->
        <script>
            window.print();
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </body>
</html>