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
</head>

<body>
   <h2>Edit User</h2>
   <form action="../action/edit_action.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
      <input type="text" name="user_nama" value="<?php echo $data['user_nama']; ?>">
      <input type="text" name="user_nim" value="<?php echo $data['user_nim']; ?>">
      <input type="text" name="user_alamat" value="<?php echo $data['user_alamat']; ?>">
      <input type="hidden" name="user_foto_lama" value="<?php echo $data['user_foto']; ?>">
      <input type="file" name="user_foto">
      <input type="submit" name="submit" value="Simpan">
   </form>
</body>

</html>