<?php

require_once "core/init.php";
require_once "view/header.php";

$error = '';
$nip = $_GET['nip'];

if (isset($nip)) {
  $detail = tampilkan_per_nip($nip);
  while ($row = mysqli_fetch_assoc($detail)) {
    $nip_detail         = $row['nip'];
    $nama_detail        = $row['nama'];
    $departemen_detail  = $row['departemen'];
    $gaji_detail        = $row['gaji'];
    $sex_detail         = $row['sex'];
    $alamat_detail      = $row['alamat'];
    $notelp_detail      = $row['no_telp'];
    $status_detail      = $row['status'];
    $gambar_detail      = $row['gambar'];
  }
}

function get_form(){
  global $nip, $nama, $alamat, $gaji, $status, $departemen, $sex, $notelp;
  $nip         = $_POST['nip'];
  $nama        = $_POST['nama'];
  $alamat      = $_POST['alamat'];
  $gaji        = $_POST['gaji'];
  $status      = $_POST['status'];
  $departemen  = $_POST['departemen'];
  $sex         = $_POST['sex'];
  $notelp      = $_POST['notelp'];
}

if (isset($_POST['cek_foto'])) {
  get_form();
  $nama_gambar = $_FILES['gambar']['name'];
	$file_gambar = $_FILES['gambar']['tmp_name'];
	$directory	 = "image/$nama_gambar";
	if (move_uploaded_file($file_gambar, $directory)){

    $sql = tampilkan_per_nip($nip);
    $data = mysqli_fetch_assoc($sql);
    if(is_file("image/".$data['gambar'])){
      unlink("image/".$data['gambar']);
    }
    if (edit_data($nip, $nama, $alamat, $gaji, $status, $departemen, $sex, $nama_gambar, $notelp)) {
      header('Location: index.php');
    }else {
      $error = 'Ada Masalah Saat Mengupdate Data';
    }
  } else {
    $error = 'Gagal Update Gambar';
  }
}else if (isset($_POST['update'])) {
  get_form();

  if (edit_tanpa_gambar($nip, $nama, $alamat, $gaji, $status, $departemen, $sex, $notelp)) {
    header('Location: index.php');
  } else {
    $error = 'Ada Masalah Saat Mengupdate Data';
  }
}
 ?>

 <div class="container" style="margin-top:50px; margin-bottom:50px;">
   <div class="row">
     <div class="col-md-6 col-md-offset-3">
       <div class="panel panel-default">
         <div class="panel-heading" style="background-color: #004d40; color:white;">
           <h3 class="text-center">Edit Karyawan</h3>
         </div>
         <div class="panel-body">
           <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nip">NIP</label> <br>
              <input type="text" class="form-control" name="nip" size="37" readonly value="<?= $nip_detail; ?>"> <br> <br>

             	<label for="nama">Nama Lengkap</label> <br>
             	<input type="text" class="form-control" name="nama" size="37" value="<?= $nama_detail; ?>"> <br> <br>

             	<label for="alamat">Alamat</label> <br>
             	<textarea name="alamat" class="form-control" rows="5" cols="40"><?= $alamat_detail; ?></textarea> <br> <br>

             	<label for="gaji">Gaji Utama</label> <br>
             	<input type="number" class="form-control" name="gaji" min="800000" max="8000000" step="50000" style="width: 19em" value="<?= $gaji_detail; ?>"> <br> <br>

              <label for="status">Status</label> <br>
             	<select name="status" class="form-control">
                <option value="<?= $status_detail; ?>">-Status Baru-</option>
                <option value="Tetap">Tetap</option>
                <option value="Kontrak">Kontrak</option>
              </select> <br> <br>

              <label for="departemen">Departemen</label> <br>
              <select name="departemen" class="form-control">
                <option value="<?= $departemen_detail; ?>">-Departemen Baru-</option>
                <option value="Produksi">Produksi</option>
                <option value="Jaminan Kualitas">Pemeriksaan kualitas</option>
                <option value="Information Technology">Information Technology</option>
                <option value="Keuangan">Keuangan</option>
                <option value="Kepersonaliaan">Kepersonaliaan</option>
                <option value="Marketing ">Marketing</option>
                <option value="Customer Service">Customer Service</option>
              </select> <br> <br>

              <label for="sex">Jenis Kelamin</label> <br>
              <select name="sex" class="form-control">
                <option value="<?= $sex_detail; ?>">-Jenis Kelamin Baru-</option>
                <option value="Laki-Laki">L</option>
                <option value="Perempuan">P</option>
              </select> <br> <br>

              <label for="notelp">No Telepon</label> <br>
             	<input type="text" class="form-control" name="notelp" size="37" value="<?= $notelp_detail; ?>"> <br> <br>

             	<label for="exampleInputFile">Foto Profil</label> <br>
              <input type="checkbox" id="myCheck" class="form-check-input" onclick="myFunction()" name="cek_foto" value="true"> Ceklis jika ingin mengubah foto<br>
                <div id="input-file" style="display:none">
                  <input name="gambar" class="form-control-file" type="file" id="exampleInputFile"> <br> <br>
                </div>

                <script>
                  function myFunction() {
                      var checkBox = document.getElementById("myCheck");
                      var inputFile = document.getElementById("input-file");
                      if (checkBox.checked == true){
                          inputFile.style.display = "block";
                      } else {
                         inputFile.style.display = "none";
                      }
                  }
                </script>
              <div class="text-center" style="margin-top:20px">

                <div id="error"><?= $error  ?></div>

                <input type="submit" class="btn btn-success" name="update" value="Update" style="background-color: #004d40">
                <a href="index.php"><input type="button" class="btn btn-danger" value="Batal" style="width:200px;"></a>
              </div>
            </div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>

 <?php
 require_once "view/footer.php";

  ?>
