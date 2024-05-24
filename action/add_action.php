<?php
include '../config/connection.php';
$nama = $_POST['user_nama'];
$nim = $_POST['user_nim'];
$alamat = $_POST['user_alamat'];
$email = $_POST['user_email'];
$agama = $_POST['user_agama'];
$jenis_kelamin = $_POST['user_jenis_kelamin'];
$jurusan = $_POST['user_jurusan'];
$tanggal_lahir = $_POST['user_tanggal_lahir'];
$tempat_lahir = $_POST['user_tempat_lahir'];

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['user_foto']['name'];
$ukuran = $_FILES['user_foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
   header("location:../index.php?alert=gagal_ekstensi");
} else {
   if ($ukuran < 1044070) {
      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['user_foto']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
      mysqli_query($koneksi, "INSERT INTO user (user_nama, user_nim, user_alamat, user_email, user_agama, user_jenis_kelamin, user_jurusan, user_foto, user_tanggal_lahir, user_tempat_lahir) VALUES('$nama', '$nim', '$alamat', '$email', '$agama', '$jenis_kelamin', '$jurusan', '$xx', '$tanggal_lahir', '$tempat_lahir')");
      header("location:../index.php?alert=berhasil");
   } else {
      header("location:../index.php?alert=gagal_ukuran");
   }
}