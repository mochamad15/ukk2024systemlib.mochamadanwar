<?php include '../app/views/templates/header.php';
$no = 1; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori</th>
                                <th>Sampul</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $buku) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $buku['NamaKategori']; ?></td>
                                    <td><img style="width: 150px; height: 200px;" src="<?= urlTo('./public/uploads/'.$buku['Sampul']); ?>"></td>
                                    <td><?= $buku['Judul']; ?></td>
                                    <td><?= $buku['Penulis']; ?></td>
                                    <td>
                                        
                                        <form action="<?= urlTo('/peminjaman/store') ?>" method="post" class="d-inline">
                                            <input type="hidden" name="BukuID" value="<?= $buku['BukuID']; ?>">
                                            <button class="btn btn-primary">
                                                Pinjam
                                            </button>
                                        </form>
                                        <form action="<?= urlTo('/koleksi/store') ?>" method="post" class="d-inline">
                                            <input type="hidden" name="BukuID" value="<?= $buku['BukuID']; ?>">
                                            <input type="hidden" name="UserID" value="<?= $_SESSION['UserID']; ?>">
                                            <button class="btn btn-success">
                                                Masukan ke koleksi pribadi
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach ?>
                        </tbody>

                        <tfoot>
                           
                        </tfoot>
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
<?php include '../app/views/templates/footer.php'; ?>