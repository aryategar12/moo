<?php
if (isset($_GET['edit'])) {
  include('koneksi.php');
  $id             = $_GET['id'];
  $nis            = $_GET['nis'];
  $nama           = $_GET['nama'];
  $jurusan        = $_GET['jurusan'];
  $tanggal_lahir  = $_GET['tanggal_lahir'];
  $kelas          = $_GET['kelas'];
  $alamat         = $_GET['alamat'];
  $jenis_kelamin  = $_GET['jenis_kelamin'];
  $query_update = mysqli_query($konek,"UPDATE anggota SET nis ='$nis', nama ='$nama', jurusan ='$jurusan', tanggal_lahir ='$tanggal_lahir', kelas ='$kelas', alamat ='$alamat', jenis_kelamin ='$jenis_kelamin' WHERE id_anggota = '$id'");

if ($query_update) {
  ?>
  <script>
  alert("Data Berhasil Di Update!!");
  </script>
  <?php
  header('Refresh:0; URL=http://localhost/6_aryamywebsite_12rpl2/admin.php?page=anggota');
}
}
if (isset($_POST['save'])) {
$nis            = $_POST['nis'];
$nama           = $_POST['nama'];
$jurusan        = $_POST['jurusan'];
$tanggal_lahir  = $_POST['tanggal_lahir'];
$kelas          = $_POST['kelas'];
$alamat         = $_POST['alamat'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
  $query_insert = mysqli_query($konek,"INSERT INTO anggota VALUES('','$nis','$nama','$jurusan','$tanggal_lahir','$kelas','$alamat','$jenis_kelamin')");
  if ($query_insert){
    header('Refresh:1; URL=http://localhost/5_mywebsite_12rpl2/admin.php?page=anggota');
?>
<div class="alert alert-warning" role="alert">
  Data Berhasil Di Tambahkan
</div>
<?php
  }else{
    echo "Data Gagal Di Simpan!";
  }
}elseif(isset($_GET['hapus'])){
$id = $_GET['id'];
$query_delete = mysqli_query($konek,"DELETE FROM anggota WHERE id_anggota = '$id' ");
if($query_delete){
?>
<div class="alert alert-warning" role="alert">
  Data Berhasil Di Hapus
</div>
<?php
header('Refresh:1; URL=localhost/06_aryamywebsite_12rpl2/admin.php?page=anggota');
}
}
?>
<br>
<center><h1>Data Anggota</h1></center>
<br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputdata">
Tambah Data
</button>
    <table class="table table-striped">
    <tr>
        <th class="text-center">NO</th>
        <th class="text-center">NIS</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Jurusan</th>
        <th class="text-center">Tgl Lahir</th>
        <th class="text-center">Kelas</th> 
        <th class="text-center">Alamat</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Action</th>
    </tr>
    <?php
    $no = 1;
    $query = mysqli_query($konek, "SELECT * FROM anggota");
    foreach ($query as $row) {
        
    ?>
    <tr>
        <td class="text-center"><?php echo $no ?></td>
        <td class="text-center"><?php echo $row['nis']?></td>
        <td class="text-center"><?php echo $row['nama']?></td>
        <td class="text-center">
          <?php 
            if ($row['jurusan']=='RPL') {
              echo "Rekayasa Perangkat Lunak";
            }elseif ($row['jurusan']=='TKR') {
              echo "Teknik Kendaraan Ringan";
            }elseif ($row['jurusan']=='TAV') {
              echo "Teknik Audio Video";
            }else {
              echo "Teknik Instalasi Tenaga Listrik";
            }
          ?>
          <?php echo $row['jurusan']?>
        </td>
        <td class="text-center"><?php echo $row['tanggal_lahir']?></td>
        <td class="text-center"><?php echo $row['kelas']?></td>
        <td class="text-center"><?php echo $row['alamat']?></td>
        <td class="text-center"><?php echo $row['jenis_kelamin']?></td>
        <td class="text-center">
        <a href="?page=anggota&hapus&id=<?php echo $row['id_anggota'];?>">
          <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
        </a>
        <a href="?page=anggota&update&id=<?php echo $row['id_anggota'];?>">
          <button class="btn btn-warning"><i class="fas fa-edit" data-bs-toggle="modal" data-bs-target="#edit-modal"></i></button>
        </a>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>

<!-- Modal input -->
<div class="modal fade" id="inputdata" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <div class="form-group mb-2">
      <input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa">
      </div>
      <div class="form-group mb-2">
      <input class="form-control" type="text" name="nama" placeholder="Nama Siswa">
      </div>
      <div class="input-group mb-2">
      <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
      <select class="form-control" name="kelas" id="inputGroupSelect01">
      <option value="">Pilih Kelas</option>
      <option value="X">X</option>
      <option value="XI">XI</option>
      <option value="XII">XII</option>
      </select>
      </div>
      <div class="input-group mb-2">
      <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
      <select class="form-control" name="jurusan" id="inputGroupSelect01">
      <option value="">Pilih Jurusan</option>
      <option value="">Rekayasa Perangkat Lunak</option>
      <option value="">Teknik Kendaraan Ringan</option>
      <option value="">Teknik Audio Video</option>
      <option value="">Teknik Instalasi Tenaga Listrik</option>
      </select>
      </div>
      <div class="input-group mb-2">
      <span class="input-group-text"> Tanggal Lahir</span>
      <input class="form-control" type="date" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
      </div>
      <div class="form-floating mb-2">
  <textarea  name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Alamat</label>
  </div>
      <div class="form-group">
      <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
        <select class="form-control" name="jenis_kelamin">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--Edit-->
<?php
if (isset($_GET['update'])) {
  $id = $_GET['id'];
  $query_select = mysqli_query($konek,"SELECT * FROM anggota WHERE id_anggota = '$id'");
  foreach ($query_select as $row) {
?>
<script>
  $(document).ready(function(){
    $("#edit-modal").modal('show');
  });
</script>
<div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="anggota.php" method="get">
      <input type="hidden" name="id" value="<?php echo $row['id_anggota']; ?>">
      <div class="form-group mb-2">
      <input value="<?php echo $row['nis'];?>" class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa">
      </div>
      <div class="form-group mb-2">
      <input value="<?php echo $row['nama'];?>" class="form-control" type="text" name="nama" placeholder="Nama Siswa">
      </div>
      <div class="input-group mb-2">
      <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
      <select class="form-control" name="kelas" id="inputGroupSelect01">
      <option value="<?php echo $row['kelas'];?>">
      <?php 
            if ($row['kelas']=='X') {
              echo "X";
            }elseif ($row['kelas']=='X') {
              echo "XI";
            }else {
              echo "XII";
            }
      ?>
      </option>
      <option value="X">X</option>
      <option value="XI">XI</option>
      <option value="XII">XII</option>
      </select>
      </div>
      <div class="input-group mb-2">
      <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
      <select class="form-control" name="jurusan" id="inputGroupSelect01">\
      <option value="<?php echo $row['jurusan'];?>">
      <?php 
            if ($row['jurusan']=='RPL') {
              echo "Rekayasa Perangkat Lunak";
            }elseif ($row['jurusan']=='TKR') {
              echo "Teknik Kendaraan Ringan";
            }elseif ($row['jurusan']=='TAV') {
              echo "Teknik Audio Video";
            }else {
              echo "Teknik Instalasi Tenaga Listrik";
            }
          ?>
    </option>
      <option value="">Rekayasa Perangkat Lunak</option>
      <option value="">Teknik Kendaraan Ringan</option>
      <option value="">Teknik Audio Video</option>
      <option value="">Teknik Instalasi Tenaga Listrik</option>
      </select>
      </div>
      <div class="input-group mb-2">
      <span class="input-group-text"> Tanggal Lahir</span>
      <input value="<?php echo $row['tanggal_lahir'];?>" class="form-control" type="date" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
      </div>
      <div class="form-floating mb-2">
  <textarea  name="alamat" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo $row['alamat'];?></textarea>
  <label for="floatingTextarea2">Alamat</label>
  </div>
      <div class="form-group">
      <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
        <select class="form-control" name="jenis_kelamin">
            <option value="<?php echo $row['jenis_kelamin'];?>">
              <?php
                if ($row['jenis_kelamin']=='L') {
                  echo "Laki Laki";
                }else {
                  echo "Perempuan";
                }
              ?>
            </option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
}
}
?>
</table>