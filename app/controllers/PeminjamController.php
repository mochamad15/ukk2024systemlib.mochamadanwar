<?php
use Dompdf\Dompdf;
class PeminjamController extends Controller
{
    public function __construct()
    {
        if($_SESSION['role'] !== 'Administrator' && $_SESSION['role'] !== 'Petugas') {
            redirectTo('error', 'Mohon maaf, Anda tidak berhak mengakses halaman ini','/');
        }
    }

    public function index()
    {
        $data = $this->model('Peminjaman')->get();
        $this->view('peminjam/home', $data);
    }



    public function cetaklaporan()
  {
    $data = $this->model('Peminjaman')->get();
    $html   = "<center>";
    $html   .= "<h1>SMK NEGERI 1 JENANGAN - PONOROGO</h1>";
    $html   .= "<h2>PERPUSTAKAAN SEKOLAH</h2>";
    $html   .= "<h3>DAFTAR BUKU</h3>";
    $html   .= "<hr>";
    $html   .= "<table align='center' border='1' cellpadding='10' cellspacing='0'>";
    $html   .= "<tr><th>#</th><th>Nama Peminjam</th><th>Alamat Peminjam</th><th>Buku Yang di Pinjam</th><th>Tanggal Peminjaman</th><th>Tanggal di Kembalikan</th><th>Status</th></tr>";
    $no = 1;
    foreach ($data as $k) {
      $html .= "<tr>";
      $html .= "<td>" . $no . "</td>";
      $html .= "<td>" . $k['NamaLengkap'] . "</td>";
      $html .= "<td>" . $k['Alamat'] . "</td>";
      $html .= "<td>" . $k['Judul'] . "</td>";
      $html .= "<td>" . $k['TanggalPeminjaman'] . "</td>";
      $html .= "<td>" . $k['TanggalPengembalian'] . "</td>";
      $html .= "<td>" . $k['StatusPeminjaman'] . "</td>";
      $html .= "</tr>";
      $no++;
    }
    $html   .= "</table>";
    $html   .= "</center>";
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('4A', 'potrait');
    $dompdf->render();
    $dompdf->stream('Data Transaksi Peminjaman', ['Attachment' => 0]);
  }
    
}