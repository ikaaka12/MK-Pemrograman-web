<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM diary WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Catatan</title>
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
      background: #2196F3; color: white; border: none; cursor: pointer;
    }
  </style>
</head>
<body>

<h2 style="text-align:center;">Edit Catatan</h2>

<form method="POST" action="">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">

  <label>Tanggal:</label>
  <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" required>

  <label>Judul:</label>
  <input type="text" name="judul" value="<?= $row['judul'] ?>" required>

  <label>Isi Catatan:</label>
  <textarea name="isi" rows="5" required><?= $row['isi'] ?></textarea>

  <button type="submit" name="update">Perbarui</button>
</form>

<?php
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $tanggal = $_POST['tanggal'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];

  mysqli_query($koneksi, "UPDATE diary SET tanggal='$tanggal', judul='$judul', isi='$isi' WHERE id='$id'");
  echo "<script>alert('Catatan berhasil diperbarui!'); window.location='index.php';</script>";
}
?>

</body>
</html>
