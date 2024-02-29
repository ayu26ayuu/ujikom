<?php
    $id = $_GET['id_barang'];
    $query = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang=$id");
?>
<script>
    alert('Hapus data berhasil');
    location.href="?page=data_barang";
</script>