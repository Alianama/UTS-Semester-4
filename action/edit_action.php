<?php
include '../config/connection.php';

if (isset($_POST['submit'])) {
   $user_id = $_POST['user_id'];
   $user_nama = $_POST['user_nama'];
   $user_kontak = $_POST['user_kontak'];
   $user_alamat = $_POST['user_alamat'];
   $user_foto_lama = $_POST['user_foto_lama'];
   $user_foto = $_FILES['user_foto']['name'];
   $tmp_foto = $_FILES['user_foto']['tmp_name'];

   // Pindahkan foto ke folder gambar jika ada foto baru yang diupload
   $folder_tujuan = "./gambar/";
   if ($user_foto != '') {
      move_uploaded_file($tmp_foto, $folder_tujuan . $user_foto);
   } else {
      $user_foto = $user_foto_lama;
   }

   // Query untuk update data user
   $query = "UPDATE user SET user_nama=?, user_kontak=?, user_alamat=?, user_foto=? WHERE user_id=?";
   $stmt = mysqli_prepare($koneksi, $query);
   mysqli_stmt_bind_param($stmt, "ssssi", $user_nama, $user_kontak, $user_alamat, $user_foto, $user_id);

   if (mysqli_stmt_execute($stmt)) {
      // Jika berhasil diupdate, redirect ke halaman index dengan alert berhasil
      header("location:../index.php?alert=berhasil");
   } else {
      // Jika gagal, redirect ke halaman index dengan alert gagal
      header("location:../index.php?alert=gagal");
   }
   mysqli_stmt_close($stmt);
}