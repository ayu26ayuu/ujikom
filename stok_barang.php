<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="?page=tambah_stok" class="btn btn-primary">+ Tambah Data</a>
    <table align="center" cellspading="0"width="100%">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Stok</th>
        </tr>
        <?php
  $no = 1;
  $data = mysqli_query($koneksi,"SELECT * FROM barang");
  while($d = mysqli_fetch_array($data)){
    ?>

    <tr>   
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['kode_barang']; ?></td>
    <td><?php echo $d['nama_barang']; ?></td>
    <td><?php echo $d['stok']; ?></td>
    <td>
        <a href="?page=stok_ubah&&id_barang=<?php echo $d['id_barang'];?>" class="btn btn-info">Ubah</a>
        <a href="?page=tambah&&id_barang=<?php echo $d['id_barang'];?>" class="btn btn-primary">Tambah</a>
        <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=barang_hapus&&id_barang=<?php echo $d['id_barang'];?>" class="btn btn-info">Hapus</a>
    </td>
        <?php
  }
        ?>
    </tr>
    </table>
</body>
</html>