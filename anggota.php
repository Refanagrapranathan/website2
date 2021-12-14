<?php
// proses delete  
if (isset($_GET['delete'])){
  $id = $_GET['id'];
  $query_delete = mysqli_query($koneksi,"DELETE FROM anggota WHERE id_anggota = '$id'");
    if ($query_delete){
      ?>
      <div class="alert alert-success">
        Data Berhasil DIHAPUS!!!
        </div>
        <?php
    }
}





//   proses insert tambah data
if(isset($_POST['save']))
{
    $nis        = $_POST['nis'];
    $nama       = $_POST['nama'];
    $kelas      = $_POST['kelas'];
    $jurusan    = $_POST['jurusan'];
    $tgl_lahir  = $_POST['tanggal_lahir'];
    $tlp        = $_POST['no_telepon'];
    $alamat     = $_POST['alamat'];
    $jk         = $_POST['jenis_kelamin'];

    $query_insert = mysqli_query($koneksi,"INSERT INTO anggota VALUES('','$nis','$nama','$kelas','$jurusan','$tgl_lahir','$tlp','$alamat','$jk')");

//
if($query_insert) {
    ?>
        <div class="alert alert-success">
           Data Berhasil Disimpan !!!
        </div>
    <?php
    header('refresh:2; url=http://localhost/18_mywebsite_12rpl2/admin.php?page=anggota');
}else{
  ?>
    <div class="alert alert-damgerous">
           Data Gagal Disimpan !!!
        </div>
    <?php
  }   
}
?>

<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Tambah Data
</button>
<!-- --------------------------------------------------------------------------------------------------- -->
<table class="table table-striped table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tgl Lahir</th>
        <th>Tlp</td>
        <th>Alamat</th>
        <th>Gender</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($koneksi,"SELECT * FROM anggota");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td valign="middle"><?php echo $row['kelas']; ?></td>
        <td valign="middle"><?php echo $row['jurusan']; ?></td>
        <td valign="middle"><?php echo $row['tanggal_lahir']; ?></td>  
        <td valign="middle"><?php echo $row['no_telepon']; ?></td>
        <td valign="middle"><?php echo $row['alamat']; ?></td>
        <td align="center" valign="middle"><?php echo $row['jenis_kelamin']; ?></td>
        <td valign="middle">
        <a href="?page=anggota&delete&id=<?php echo $row['id_anggota'];?>">
            <button class="btn btn-danger"><i class="fas fa-trash-alt">Hapus</i></button>
        </a>
            <button class="btn btn-warning"><i class="fas fa-edit">Update</i></button>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>
<!-- ------------------------------------------------------------- -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ISI DATA DI SINI !!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action=""method="post">
            <div class="form-group">
              <input class="form-control" type="text" name="nis" placeholder="NIS" require>
            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text" name="nama" placeholder="Nama Siswa" require>
            </div>
            <div class="form-group mt-2">
               <select class="form-control" name="kelas">
                  <option value="">--Pilih Kelas--</option>
                  <option value="XIIRPL1">XII RPL 1</option>
                  <option value="XIIRPL2">XII RPL 2</option>
                  <option value="XIIRPL3">XII RPL 3</option>
                  <option value="XIITAV1">XII TAV 1</option>
                  <option value="XIITAV2">XII TAV 2</option>
                  <option value="XIITITL1">XII TITL 1</option>
                  <option value="XIITITL2">XII TITL 2</option>
                  <option value="XIITKR1">XII TKR 1</option>
                  <option value="XIITKR2">XII TKR 2</option>
                  <option value="XIITKR3">XII TKR 3</option>
                  <option value="XIITKR4">XII TKR 4</option>
                  <option value="XIITKR5">XII TKR 5</option>
                  <option value="XIITKR6">XII TKR 6</option>
                </select>
            </div>
            <div class="form-group mt-2">
                 <select class="form-control" name="jurusan">
                    <option value="">--Pilih Jurusan--</option>
                    <option value="RPL">Rekayasa Perangkat Lunak</option>
                    <option value="TAV">Teknik Audio Video</option>
                    <option value="TKR">Teknik Kendaraan Ringan</option>
                    <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                </select>
            </div> 
            <div class="form-group mt-2">
               <span class="input-group-text"></span> 
               <input class="form-control" type="date" name="tanggal_lahir">
            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text" name="no_telepon" placeholder=" No Telepon" require>
            </div>
            <div class="form-group mt-2">
              <textarea class="form-control" name="alamat"></textarea>
            </div>
            <div class="form-group mt-2">
              <select class="form-control" name="jenis_kelamin">
                 <option value="">--Pilih Gender--</option>
                 <option value="L">Laki-laki</option>
                 <option values="P">Perempuan</option>
             </select>
            </div>     
           
        <!-----------------------------------------------------------------------------------------------------------------  -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-success mt-2" type="submit" name="save">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>