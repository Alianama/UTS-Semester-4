<?php
include '../config/connection.php';

if (isset($_GET['user_id'])) {
   $user_id = $_GET['user_id'];
   $query = "SELECT * FROM user WHERE user_id = ?";
   $stmt = mysqli_prepare($koneksi, $query);
   mysqli_stmt_bind_param($stmt, "s", $user_id);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);
   $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>

<head>
   <title>Edit User</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="../assets/style/edit_page.css">
</head>

<body>

   <div class="container">
      <h1>Edit Data Mahasiswa</h1>
      <form action="../action/edit_action.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="user_nama">Nama:</label>
            <input type="text" name="user_nama" value="<?php echo $data['user_nama']; ?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="user_nim">NIM:</label>
            <input type="text" name="user_nim" value="<?php echo $data['user_nim']; ?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="user_tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="user_tanggal_lahir" value="<?php echo $data['user_tanggal_lahir']; ?>"
               class="form-control">
         </div>
         <div class="form-group">
            <label for="user_tempat_lahir">Tempat Lahir:</label>
            <input type="text" name="user_tempat_lahir" value="<?php echo $data['user_tempat_lahir']; ?>"
               class="form-control">
         </div>
         <div class="form-group">
            <label for="user_alamat">Alamat:</label>
            <input type="text" name="user_alamat" value="<?php echo $data['user_alamat']; ?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="user_email">Email:</label>
            <input type="email" name="user_email" value="<?php echo $data['user_email']; ?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="user_agama">Agama:</label>
            <input type="text" name="user_agama" value="<?php echo $data['user_agama']; ?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="user_jenis_kelamin">Jenis Kelamin:</label>
            <input type="text" name="user_jenis_kelamin" value="<?php echo $data['user_jenis_kelamin']; ?>"
               class="form-control">
         </div>
         <div class="form-group">
            <label for="user_jurusan">Jurusan:</label>
            <input type="text" name="user_jurusan" value="<?php echo $data['user_jurusan']; ?>" class="form-control">
         </div>
         <div class="form-group">
            <input type="hidden" name="user_foto_lama" value="<?php echo $data['user_foto']; ?>" class="form-control">
         </div>
         <div class="form-group">

            <input type="file" name="user_foto">
         </div>
         <div class="action-container">
            <input type="submit" name="submit" value="Simpan" class="simpan-btn">
            <a href="../index.php" class="cancel-btn">Batal</a>
         </div>
      </form>
   </div>
</body>

</html>