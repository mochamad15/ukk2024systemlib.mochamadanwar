<?php include '../app/views/templates/header.php';
$no = 1; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= urlTo('/peminjam/cetaklaporan'); ?>" class="btn btn-success float-left mt-2">Cetak Laporan</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Peminjam</th>
                                <th>Alamat Peminjam</th>
                                <th>Buku Yang di Pinjam</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal di Kembalikan</th>
                                <th>Status</th>
                                <?php if ($_SESSION['role'] == 'Petugas') : ?>
                                    <th>Tindakan</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $k) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $k['NamaLengkap']; ?></td>
                                    <td><?= $k['Alamat']; ?></td>
                                    <td><?= $k['Judul']; ?></td>
                                    <td><?= $k['TanggalPeminjaman']; ?></td>
                                    <td><?= $k['TanggalPengembalian']; ?></td>
                                    <td><?= $k['StatusPeminjaman']; ?></td>
                                    <td>
                                        <?php if ($_SESSION['role'] == 'Petugas' && $k['StatusPeminjaman'] === 'Belum di Kembalikan') : ?>
                                            <form action="<?= urlTo('/peminjaman/' . $k['PeminjamanID'] . '/kembalikan') ?>" method="post">
                                                <input type="hidden" name="TanggalPengembalian" value="<?= date('Y-m-d'); ?>">
                                                <input type="hidden" name="StatusPeminjaman" value="Sudah di Kembalikan">
                                                <button class="btn btn-info ">Kembalikan</button>
                                            </form>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<?php include '../app/views/templates/footer.php';
