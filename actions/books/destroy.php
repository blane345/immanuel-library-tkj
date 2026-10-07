<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  echo "<h3>Buku dengan id $id berhasil dihapus.</h3>";
  echo '<p><a href="../../pages/books/index.php">Kembali ke daftar buku</a></p>';
} else {
  echo "id buku tidak ditemukan.";
}