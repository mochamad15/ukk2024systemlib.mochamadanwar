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
                <th>Sampul</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal di Kembalikan</th>
                <th>Status</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $buku) : ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><img style="width: 150px; height: 200px;" src="<?= urlTo('./public/uploads/' . $buku['Sampul']); ?>"></td>
                  <td><?= $buku['Judul']; ?></td>
                  <td><?= $buku['TanggalPeminjaman']; ?></td>
                  <td><?= $buku['TanggalPengembalian']; ?></td>
                  <td><?= $buku['StatusPeminjaman']; ?></td>
                  <td><a href="<?= urlTo('/perpustakaan/' . $buku['BukuID'] . '/detailbuku') ?>" class="btn btn-info">
                    Detail
                  </a></td>
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