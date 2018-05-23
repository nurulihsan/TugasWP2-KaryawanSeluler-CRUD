<?php

require_once "core/init.php";
require_once "view/header.php";

$list_karyawan = tampilkan();
function rupiah($nilai, $pecahan = 0) {
    return number_format($nilai, $pecahan, ',', '.');
}

if (isset($_GET['cari'])) {
	$list_karyawan = cari_nama($_GET['cari']);
}
session_start();
if($_SESSION['status'] !="login"){
	header("location:login_admin.php");
}

 ?>
  <div class="container-fluid" style="margin:10px;">
      <div class="row">
        <div class="col-md-8">
          <h1>Hi, Selamat Datang <?= $_SESSION['user']; ?></h1>
        </div>
        <div class="col-md-4">
          <form method="get">
              <div class="form-group">
                <br>
                  <input type="search" name="cari" class="form-control" placeholder="Cari Nama Karyawan disini">
              </div>
          </form>
        </div>
      </div>
      <hr>
      <div class="row" style="margin-top:50px;">
          <h4 class="text-center">Data Karyawan PT. Seluler Semesta </h4>
      </div>

      <div class="row">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Karyawan</th>
                <th>Departemen</th>
                <th>Gaji Utama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Status</th>
                <th>Tools</th>
              </tr>
            </thead>
            <?php
              $no = 1;
              while ($row = mysqli_fetch_assoc($list_karyawan)) :?>
            <tr>
              <td><?= $no; ?></td>
              <td><h5><?= $row['nip']; ?></td>
              <td><a href="detail.php?nip=<?= $row['nip']; ?>"><?= $row['nama'];  ?></td>
              <td><?= $row['departemen']; ?></td>
              <td>Rp <?= rupiah($row['gaji']); ?></td>
              <td><?= $row['sex']; ?></td>
              <td><?= $row['alamat']; ?></td>
              <td><?= $row['no_telp']; ?></td>
              <td>
                <?php
                if($row['status'] == 'Tetap'){
									echo '<span class="label label-primary">Tetap</span>';
								}
								else if ($row['status'] == 'Kontrak' ){
									echo '<span class="label label-warning">Kontrak</span>';
								}
                 ?>
              </td>
              <td><a class="btn btn-success btn-sm" href="edit.php?nip=<?= $row['nip']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                  <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')" href="hapus.php?nip=<?= $row['nip']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
            <?php
              $no++;
              endwhile; ?>
          </table>
        </div>
        
      </div>
  </div>

<?php
require_once "view/footer.php";

 ?>
