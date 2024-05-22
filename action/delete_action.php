<?php
include '../config/connection.php';

if (isset($_GET['user_id'])) {
   $user_id = $_GET['user_id'];
   // Query untuk menghapus data user berdasarkan user_id
   $query = "DELETE FROM user WHERE user_id = ?";

   $stmt = mysqli_prepare($koneksi, $query);
   mysqli_stmt_bind_param($stmt, "s", $user_id);

   if (mysqli_stmt_execute($stmt)) {
      // Jika berhasil dihapus, redirect ke halaman index dengan alert berhasil
      header("location:../index.php?alert=berhasil");
   } else {
      // Jika gagal, redirect ke halaman index dengan alert gagal
      header("location:../index.php?alert=gagal");
   }
   mysqli_stmt_close($stmt);
} else {
   header("location:../index.php?alert=invalid_id");
}