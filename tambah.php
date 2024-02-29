<h1 class="mt-4">Ubah Data </h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id_barang'];
                        if(isset($_POST['submit'])){
                            
                            
                            $stok = $_POST['stok'];
                            $query = mysqli_query($koneksi, "UPDATE barang SET stok='$stok' WHERE id_barang=$id");

                            if($query){
                                echo '<script>alert("Tambah stok berhasil.");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT*FROM barang WHERE id_barang=$id");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <div class="rows">
                        <div class="col-md-4">Stok</div>
                        <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['stok'];?>" name="stok"></div>
                    </div>
                    <br>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=stok_barang" class="btn btn-danger">Kembali<a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>