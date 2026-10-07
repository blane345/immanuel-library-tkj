<?php
if (isset($_POST['title'])) {
  echo "<h3>Data buku baru diterima:</h3>";
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
} else {
  echo "Tidak ada data yang dikirim.";
}