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
                            $nama = $_POST['nama_barang'];
                            $harga = $_POST['harga'];
                            $query = mysqli_query($koneksi, "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama', harga='$harga' WHERE id_barang=$id");

                            if($query){
                                echo '<script>alert("Ubah data berhasil.");</script>';
                            }else{
                                echo '<script>alert("Ubah data gagal.");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT*FROM barang WHERE id_barang=$id");
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
                        <div class="col-md-4">Harga</div>
                        <div class="col-md-8"><input type="number" class="form-control" value="<?php echo $data['harga'];?>" name="harga" required oninvalid="setCustomValidity('Harga belum diisi')" oninput="setCustomValidity('')"></div>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=data_barang" class="btn btn-danger">Kembali<a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>