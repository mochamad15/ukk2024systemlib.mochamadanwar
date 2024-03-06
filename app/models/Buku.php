<?php 
class Buku extends BaseModel
{
  public $table_name  = "buku";
  public $table_id    = "BukuID";

  public function getStock($bukuID)
{
  $result = $this->mysqli->query("
    SELECT Stok
    FROM buku
    WHERE BukuID = $bukuID
  ");

  if ($result) {
    $row = $result->fetch_assoc();
    return $row['Stok'];
  } else {
    return 0; 
  }
}
  

  public function reduceStock($bukuID)
{
 
  $this->mysqli->query("
    UPDATE buku
    SET Stok = Stok - 1
    WHERE BukuID = $bukuID
  ");
}

public function increaseStock($bukuID)
{
  $this->mysqli->query("
    UPDATE buku
    SET Stok = Stok + 1
    WHERE BukuID = $bukuID
  ");
}

}