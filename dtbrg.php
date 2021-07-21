<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <p><h2><center>Barang Database</center></h2></p>
    <center><hr width="500px" style="height:2px;border-width:0px;color:gray;background-color:#000000"></center>
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="index.php" style="color:green">Tambah Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dtbrg.php" style="color:green"><b>Data Barang</b></a>
        </li>
    </ul>
<br>
    <div class="container col-md-10">
    <div class="card">
            <div class="card-header text-white text-center" style="background-color: #219e68;">
                Data Mahasiswa
            </div>
            <br>
            <div class="card-body">
            <nav class="navbar">
            <div class="position-absolute top-50 end-0 translate-middle-y">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            </nav>
                <br>
                <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-success">
                    <tr align="center">
                        <th scope="col">No</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Gambar Barang</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <?php
                        include "koneksi.php";
                        $no = 1;
                        $nama_barang = "";
                        
                        if(isset($_GET['search']))
                        {
                            $nama_barang = $_GET['search'];
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$nama_barang%'");
                        }else{
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_barang");
                        }
                        while($data=mysqli_fetch_array($tampil))
                        {
                    ?>
                    <tbody>
                    <tr class="text-center">
                        <th scope="row"><?php echo $no++; ?></th>
                        <td><?php echo $data['id_barang']?></td>
                        <td><?php echo $data['nama_barang']?></td>
                        <td><?php echo $data['harga_beli']?></td>
                        <td><?php echo $data['stok']?></td>
                        <td><img src="images/<?php echo $data['images'] ?>" class="rounded mx-auto d-block" width="150" height="130"></td></td>
                        <td><?php echo $data['jenis']?></td>
                        <td><?php echo $data['diskon']?></td>
                        <td align="center">
                            <a href="edit_data.php?id_barang=<?php echo $data['id_barang']?>" class="btn btn-success bi bi-pencil-square"> Edit</a>     
                            <a href="delete_data.php?id_barang=<?php echo $data['id_barang']?>" class="btn btn-dark bi bi-trash"> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>    
            </div>
        </div>
    </div>
</body>
</html>



