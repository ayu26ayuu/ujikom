<h1 class="mt-4">Ubah Data </h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id_barang'];
                        if(isset($_POST['submit'])){
                            $kode_barang = $_POST['kode_barang'];
                            $nama_barang = $_POST['nama_barang'];
                            $stok = $_POST['stok'];
                            $query = mysqli_query($koneksi, "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', stok='$stok' WHERE id_barang=$id");

                            if($query){
                                echo '<script>alert("Ubah data berhasil.");</script>';
                            }else{
                                echo '<script>alert("Ubah data gagal.");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <div class="rows">
                        <div class="col-md-4">Kode Barang</div>
                        <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['kode_barang'];?>" name="kode_barang" required oninvalid="setCustomValidity('Kode Barang belum diisi')" oninput="setCustomValidity('')"></div>
                    </div>
                    <div class="rows">
                        <div class="col-md-4">Nama Produk</div>
                        <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['nama_barang'];?>" name="nama_barang" required oninvalid="setCustomValidity('Nama Barang belum diisi')" oninput="setCustomValidity('')"></div>
                    </div>
                    <div class="rows">
                        <div class="col-md-4">Stok</div>
                        <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['stok'];?>" name="stok" required oninvalid="setCustomValidity('Stok belum diisi')" oninput="setCustomValidity('')"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=stok_barang" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
