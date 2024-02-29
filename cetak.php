<h2 align="center">Laporan Penjualan</h2>
<table border="1" cellspading="5" cellspacing="0" width="100%">
        <tr>
        <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Sub Total</th>
        </tr>
        <?php
        include "koneksi.php";
        $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM transaksi");
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['NamaProduk']; ?></td>
                <td>Rp. <?php echo $d['Harga']; ?></td>
                <td><?php echo $d['Qty']; ?></td>
                <td>Rp. <?php echo $d['Sub Total']; ?></td>
                </tr>
                <?php
            }
        ?>
</table>
<script>
    window.print();
    setTimeout(function(){
        window.close();
    },100);
</script>