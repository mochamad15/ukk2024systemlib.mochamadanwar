<?php

class BukuController extends Controller
{

  public function __construct()
  {
    if ($_SESSION['role'] !== 'Administrator' && $_SESSION['role'] !== 'Petugas') {
      redirectTo('error', 'Mohon maaf, Anda tidak berhak mengakses halaman ini', '/');
    }
  }

  public function index()
  {
    $data = $this->model('KBRelasi')->get();
    $this->view('buku/home', $data);
  }

  public function create()
  {
    $data = $this->model('KategoriBuku')->getAll();
    $this->view('buku/create', $data);
  }

  public function store()
  {
    $sampul      =  $_FILES['Sampul']['name'];
    $tmp_name    =  $_FILES['Sampul']['tmp_name'];

    move_uploaded_file($tmp_name,'./uploads/'.$sampul);

    $BukuID = $this->model('Buku')->create([
      'Judul'       => $_POST['Judul'],
      'Sampul'      => $sampul,
      'Penulis'     => $_POST['Penulis'],
      'Penerbit'    => $_POST['Penerbit'],
      'TahunTerbit' => $_POST['TahunTerbit'],
      'Stok'        => $_POST['Stok']
     
    ]);
    $KategoriID = $_POST['KategoriID'];

    if ($this->model('KBRelasi')->create([
      'BukuID'      => $BukuID,
      'KategoriID'  => $KategoriID
    ]) > 0) {
      
      redirectTo('success', 'Selamat, Buku berhasil di tambahkan', '/buku');
    } else {
      redirectTo('error', 'Maaf, Buku gagal di tambahkan', '/buku/create');
    }
  }

  public function edit($id)
  {
    
    $data = $this->model('Buku')->getById($id);
    $this->view('buku/edit', $data);
    
  }

  public function update($id)
  {
    
    if ($this->model('Buku')->update($id) > 0) {
      redirectTo('success', 'Selamat, Data Buku Berhasil di Update', '/buku');
    } else {
      redirectTo('danger', 'Maaf, Data Buku gagal di Update', '/buku');
    }
  }

  public function delete($id)
  {
    if ($this->model('Buku')->delete($id) > 0) {
      redirectTo('success', 'Selamat, Data Buku berhasil di hapus!', '/buku');
    }
  }

  public function ulasan($id)
  {
    $this->view('buku/ulasan', [
      'buku'   => $this->model('Buku')->getById($id),
      'ulasan' => $this->model('Ulasanbuku')->getByBookId($id)
    ]);
  } 


}
