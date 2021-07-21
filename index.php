<?php
ob_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>
<p><h2><center>Barang Database</center></h2></p>
<center><hr width="500px" style="height:2px;border-width:0px;color:gray;background-color:#000000"></center>
<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php" style="color:green"><b>Tambah Data</b></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="dtbrg.php" style="color:green">Data Barang</a>
    </li>
</ul>
<br>
    <div class="container col-md-7">
        <br>
        <div class="card">
            <div class="card-header text-white text-center" style="background-color: #219e68;">
            Input Data Barang
            </div>
            <?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=='gagal_ekstensi'){
				?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4><strong class="bi bi-exclamation-triangle-fill" > Peringatan!</strong></h4>
                    Pastikan ekstensi foto sudah sesuai.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>								
				<?php
			}elseif($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-warning alert-dismissible fade show bi bi-exclamation-triangle-fill" role="alert">
                    <h4><strong class="bi bi-exclamation-triangle-fill"> Peringatan!</strong></h4>
                    Pastikan ukuran foto sudah sesuai.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>								
				<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4><strong class="bi bi-check-square-fill"> Berhasil!</strong></h4>
                Data berhasil disimpan, silahkan cek bagian data barang untuk melihat list data.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>								
				<?php
			}
		}
		?>
            <div class="card-body">
                <form action="" method="POST" class="form-item" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="id_barang">ID Barang</label>
                        <input type="text" name="id_barang" class="form-control" placeholder="Masukkan ID Barang">
                    </div>
                    <div class="form-group">
                        <label for="name_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" placeholder="Masukkan Harga Beli">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="Masukkan Stok Barang">
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Masukkan Foto Barang : </label>
                        <input type="file" name="images" value="" class="form-control" id="formFile">
                        <p style="color:red">File Ekstensi : .jpg .jpeg .png</p>
                    </div>		
                    <div class="form-group">
                        <label for="jenis">Jenis Barang</label>
                        <input type="text" name="jenis" class="form-control" placeholder="Masukkan Jenis Barang">
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="number" name="diskon" class="form-control" placeholder="Masukkan Diskon">
                    </div>
                    <button type="submit" class="btn btn-success bi bi-briefcase-fill" name="simpan" onclick="myFunction()"> Simpan 
                        <span class="spinner-border-sm" role="status" aria-hidden="true" ></span>
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
        //$images             = $_FILES['images']['name'];
        $jenis              = $_POST['jenis'];
        $diskon             = $_POST['diskon'];

        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg');
        $filename = $_FILES['images']['name'];
        $size = $_FILES['images']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$ekstensi)) {
            header("location:index.php?alert=gagal_ekstensi");
        }else{
            if($size < 10440700){		
                $foto = $rand.'_'.$filename;
                move_uploaded_file($_FILES['images']['tmp_name'], 'images/'.$rand.'_'.$filename);
                //$target = "images/".basename($images);
                mysqli_query($koneksi, "INSERT INTO tb_barang(id_barang,nama_barang,harga_beli,stok,images,jenis,diskon) VALUE
                ('$id_barang','$nama_barang','$harga_beli','$stok','$foto','$jenis','$diskon')") or die(mysqli_error($koneksi));
                header("location:index.php?alert=berhasil");
                //echo "<div align='center'><h5>Data Sedang disimpan, mohon tunggu sebentar...</h5></div>";
                //echo "<meta http-equiv='refresh' content='1;url=http://localhost/uts/dtbrg.php'>";    
            }else{
                header("location:index.php?alert=gagal_ukuran");
            }
    }
}
?>
<?php
ob_flush();
?>
