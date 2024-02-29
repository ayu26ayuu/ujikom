<h1 class="mt-4">Tambah Data Barang</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])){
                            $kode_barang = $_POST ['kode_barang'];
                            $nama = $_POST['nama_barang'];
                            $harga = $_POST['harga'];
                            $query = mysqli_query($koneksi, "INSERT INTO barang (kode_barang, nama_barang, harga) values('$kode_barang', '$nama','$harga')");

                            if($query){
                                echo '<script>alert("Tambah data berhasil.");</script>';
                            }else{
                                echo '<script>alert("Tambah data gagal.");</script>';
                            }
                        }
                    ?>
                    <div class="rows">
                    <div class="col-md-4">Kode Barang</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="kode_barang" required oninvalid="setCustomValidity('Kode Barang belum diisi')" oninput="setCustomValidity('')"></div>
                    </div>
                    <div class="rows">
                        <div class="col-md-4">Nama Barang</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="nama_barang" required oninvalid="setCustomValidity('Nama Barang belum diisi')" oninput="setCustomValidity('')"></div>
                    </div>
                    <div class="rows">
                        <div class="col-md-4">Harga</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="harga" required oninvalid="setCustomValidity('Harga belum diisi')" oninput="setCustomValidity('')"></div>
                        <BR>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=data_barang" class="btn btn-danger">Kembali<a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>