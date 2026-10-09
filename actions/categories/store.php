<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['store'])) {
  echo "<h3>Data kategori baru diterima:</h3>";
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
} else {
  echo "Tidak ada data yang dikirim.";
}