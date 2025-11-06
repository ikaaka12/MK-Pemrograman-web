<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Catatan</title>
  <style>
    body { font-family: Arial; background: #f9f9f9; margin: 50px; }
    form {
      background: white; padding: 20px; border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1); max-width: 400px; margin: auto;
    }
    input, textarea, button {
      width: 100%; margin: 10px 0; padding: 8px; font-size: 14px;
    }
    button {
      background: #4CAF50; color: white; border: none; cursor: pointer;
    }
  </style>
</head>
<body>

<h2 style="text-align:center;">Tambah Catatan Baru</h2>

<form method="POST" action="">
  <label>Tanggal:</label>
  <input type="date" name="tanggal" required>

  <label>Judul:</label>
  <input type="text" name="judul" required>

  <label>Isi Catatan:</label>
  <textarea name="isi" rows="5" required></textarea>

  <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
  $tanggal = $_POST['tanggal'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];

  $query = "INSERT INTO diary (tanggal, judul, isi) VALUES ('$tanggal','$judul','$isi')";
  mysqli_query($koneksi, $query);

  echo "<script>alert('Catatan berhasil disimpan!'); window.location='index.php';</script>";
}
?>

</body>
</html>