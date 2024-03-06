<?php 
class PeminjamanController extends Controller
{
  public function index()
  {
    $data = $this->model('Peminjaman')->getPinjam();
    $this->view('peminjaman/home', $data);
  }

  public function pinjam($id)
  {
    $data = $this->model('Buku')->getById($id);
    $this->view('peminjaman/pinjam', $data);
  }

  public function store()
{
  $bukuID = $_POST['BukuID'];

  $stokBuku = $this->model('Buku')->getStock($bukuID);

  if ($stokBuku > 0) {
    if ($this->model('Peminjaman')->create([
      'UserID'              => $_SESSION['UserID'],
      'BukuID'              => $_POST['BukuID'],
      'TanggalPeminjaman'   => date('Y-m-d'),
      'StatusPeminjaman'    => 'Belum di Kembalikan'
    ]) > 0) {
      $this->model('Buku')->reduceStock($bukuID);
      redirectTo('success', 'Selamat, Buku berhasil di pinjam', '/peminjaman');
    } else {
      redirectTo('error', 'Maaf, Buku gagal di pinjam', '/peminjaman');
    }
  } else {
    redirectTo('error', 'Maaf, Stok buku habis. Buku tidak dapat dipinjam', '/perpustakaan');
  }
}

public function kembalikan($id)
{
  $bukuID = $_POST['BukuID'];
  if ($this->model('Peminjaman')->update($id) > 0) {
    $this->model('Buku')->increaseStock($bukuID);
    redirectTo('success', 'Selamat, Buku berhasil dikembalikan!', '/peminjam');
  } else {
    redirectTo('error', 'Maaf, Buku gagal dikembalikan!', '/peminjam');
  }
}

  public function delete($id)
  {
    
    if ($this->model('Peminjaman')->delete($id) > 0) {
      redirectTo('success', 'Selamat, Data Buku berhasil di hapus!', '/peminjam');
    }
  }

  
}