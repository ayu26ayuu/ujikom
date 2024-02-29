<h1 class="mt-4">Tambah Stok Barang</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])){
                            $kode_barang = $_POST ['kode_barang'];
                            $nama_barang = $_POST['nama_barang'];
                            $stok =$_POST['stok'];
                            $query = mysqli_query($koneksi, "INSERT INTO barang (kode_barang, nama_barang, stok) values('$kode_barang', '$nama_barang', '$stok')");

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
                        <div class="col-md-4">Stok</div>
                        <div class="col-md-8"><input type="number" class="form-control" name="stok" required oninvalid="setCustomValidity('Stok belum diisi')" oninput="setCustomValidity('')"></div>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=stok_barang" class="btn btn-danger">Kembali<a>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>