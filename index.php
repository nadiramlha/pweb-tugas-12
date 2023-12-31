<html>
<head>
  <title>CRUD & Upload Gambar</title>
  
  <style>
    html {
      font-family: Arial;
    }

    * {
      box-sizing: border-box;
    }

    body {
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      color: #333;
      margin-top: 30px;
    }

    table {
      background-color: #fff;
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      color: #333;
    }

    tr:hover {
      background-color: #f9f9f9;
    }

    .foto {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100px;
      height: 100px;
      overflow: hidden;
      border-radius: 50%;
    }

    .foto img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #1b72de;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .button:hover {
      background-color: #5393e0;
    }

    .button-primary {
      background-color: #1b72de;
    }

    .button-primary:hover {
      background-color: #5393e0;
    }

    .button-danger {
      background-color: #e74c3c;
    }

    .button-danger:hover {
      background-color: #f44336;
    }
  </style>
</head>
<body>
  <h1>Data Siswa</h1><br><br>
  <table border="1" width="100%">
  <tr>
    <th>Foto</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Telepon</th>
    <th>Alamat</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Buat query untuk menampilkan semua data siswa
  $sql = $pdo->prepare("SELECT * FROM siswa");
  $sql->execute(); // Eksekusi querynya
  while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td class=\"foto\"><img src='images/".$data['foto']."'></td>";
    echo "<td>".$data['nis']."</td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['jenis_kelamin']."</td>";
    echo "<td>".$data['telp']."</td>";
    echo "<td>".$data['alamat']."</td>";
    echo "<td><a href='form_ubah.php?id=".$data['id']."'>Ubah</a></td>";
    echo "<td><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table><br><br>
  <a class="button" href="form_simpan.php">Tambah Data</a>
</body>
</html>