<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>My Diary</title>
  <style>
    body { font-family: Arial; background: #f4f4f4; margin: 50px; }
    h1 { text-align: center; }
    a.button {
      background: #4CAF50; color: white; padding: 8px 12px;
      text-decoration: none; border-radius: 5px;
    }
    table {
      width: 100%; border-collapse: collapse; margin-top: 20px;
      background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    th, td { border: 1px solid #ddd; padding: 10px; }
    th { background: #4CAF50; color: white; }
    td a { margin: 0 5px; text-decoration: none; color: #2196F3; }
    td a.delete { color: red; }
  </style>
</head>
<body>

<h1>📓 My Diary</h1>

<a href="tambah.php" class="button">+ Tambah Catatan</a>

<table>
  <tr>
    <th>Tanggal</th>
    <th>Judul</th>
    <th>Isi</th>
    <th>Aksi</th>
  </tr>

  <?php
  $data = mysqli_query($koneksi, "SELECT * FROM diary ORDER BY tanggal DESC");
  while ($row = mysqli_fetch_array($data)) {
      echo "
      <tr>
        <td>{$row['tanggal']}</td>
        <td>{$row['judul']}</td>
        <td>{$row['isi']}</td>
        <td>
          <a href='edit.php?id={$row['id']}'>Edit</a> |
          <a href='hapus.php?id={$row['id']}' class='delete' onclick='return confirm(\"Yakin ingin menghapus catatan ini?\")'>Hapus</a>
        </td>
      </tr>
      ";
  }
  ?>

</table>

</body>
</html>
