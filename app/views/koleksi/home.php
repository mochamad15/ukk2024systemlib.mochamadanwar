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
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $k) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><img style="width: 150px; height: 200px;" src="<?= urlTo('./public/uploads/' . $k['Sampul']); ?>"></td>
                  <td><?= $k['Judul']; ?></td>
                  <td><?= $k['Penulis']; ?></td>
                  <td><?= $k['Penerbit']; ?></td>
                  <td>
                  <form action="<?= urlTo('/peminjaman/store') ?>" method="post" class="d-inline">
                      <input type="hidden" name="BukuID" value="<?= $k['BukuID']; ?>">
                      <button class="btn btn-primary">
                        Pinjam
                      </button>
                    <a href="<?= urlTo('/koleksi/' . $k['KoleksiID'] . '/delete') ?>" class="btn btn-danger">
                      Delete
                    </a>
                  </form>
                  </td>
                </tr>
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