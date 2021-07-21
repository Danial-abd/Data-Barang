<?php
    include "koneksi.php";
    $id = $_GET['id_barang'];
    $ambilData = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE id_barang = '$id'");
    $data=mysqli_fetch_array($ambilData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
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
    <p></p>
    <ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" style="color:green" href="#">Edit</a>
    </li>
    </ul>
    <div class="container col-md-6">
    <br>
        <div class="card">
            <div class="card-header text-white text-center" style="background-color: #219e68;">
                Input Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-item" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="id_barang">ID Barang</label>
                        <input type="text" name="id_barang" class="form-control" value="<?php echo $data['id_barang']?>" placeholder="Masukkan ID Barang">
                    </div>
                    <div class="form-group">
                        <label for="name_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang']?>" placeholder="Masukkan Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" value="<?php echo $data['harga_beli']?>" placeholder="Masukkan Harga Beli">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" class="form-control" value="<?php echo $data['stok']?>" placeholder="Masukkan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Masukkan Foto Barang : </label>
                        <img src="images/<?php echo $data['images'] ?>" class="rounded mx-auto d-block" width="99" height="80"><br>
                        <input type="file" name="images" class="form-control">
                    </div>		
                    <div class="form-group">
                        <label for="jenis">Jenis Barang</label>
                        <input type="text" name="jenis" class="form-control" value="<?php echo $data['jenis']?>" placeholder="Masukkan Jenis Barang">
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="number" name="diskon" class="form-control" value="<?php echo $data['diskon']?>" placeholder="Masukkan Diskon">
                    </div>
                    <button type="submit" class="btn btn-success bi bi-briefcase-fill" name="simpan" onclick="myFunction()"> Simpan 
                        <span class="spinner-border-sm" role="status" aria-hidden="true" > </span>
                    </button>
                    <button type="reset" class="btn btn-light bi bi-x-octagon"> Batal</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    </body>
</html> 

<script >
    function myFunction(){
    const spn = document.querySelector("span");
    spn.classList.toggle("spinner-border");}
</script>

<?php
    include "koneksi.php";
    if(isset($_POST['simpan']))
    {
        $id_barang          = $_POST['id_barang'];
        $nama_barang        = $_POST['nama_barang'];
        $harga_beli         = $_POST['harga_beli'];
        $stok               = $_POST['stok'];
        //$images             = $_FILES['images'];
        $jenis              = $_POST['jenis'];
        $diskon             = $_POST['diskon'];

        $rand = rand();
        $ekstensi = array('png','jpg','jpeg');
        $filename = $_FILES['images']['name'];
        $size = $_FILES['images']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        
        if($filename == ""){
            mysqli_query($koneksi, "UPDATE tb_barang SET id_barang='$id_barang',nama_barang='$nama_barang',harga_beli='$harga_beli',stok='$stok',jenis='$jenis',diskon='$diskon' WHERE
            id_barang='$id'") or die(mysqli_error($koneksi));
            //header("location:dtbrg.php?alert=berhasil");
            echo "<div align='center'><h5>Data sedang di simpan, mohon tunggu...</h5></div>";
            echo "<meta http-equiv='refresh' content='1;http://localhost/uts/dtbrg.php'>";
        }else{
        if(!in_array($ext,$ekstensi)) {
            $message = "Ekstensi foto yang anda masukkan salah.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else{
            if($size < 10440700){		
                $foto = $rand.'_'.$filename;
                move_uploaded_file($_FILES['images']['tmp_name'], 'images/'.$rand.'_'.$filename);
                //$target = "images/".basename($images);
                mysqli_query($koneksi, "UPDATE tb_barang SET id_barang='$id_barang',nama_barang='$nama_barang',harga_beli='$harga_beli',stok='$stok',images='$foto',jenis='$jenis',diskon='$diskon' WHERE
                id_barang='$id'") or die(mysqli_error($koneksi));
                //header("location:dtbrg.php?alert=berhasil");
                echo "<div align='center'><h5>Data sedang di simpan, mohon tunggu...</h5></div>";
                echo "<meta http-equiv='refresh' content='1;http://localhost/uts/dtbrg.php'>";
            }else{
                $message = "Pastikan ukuran file sudah sesuai";
                echo "<script type='text/javascript'>alert('$message');</script>";    
            }
    }}
}
?>