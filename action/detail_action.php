<?php
include '../config/connection.php';

if(isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $query = "SELECT * FROM user WHERE user_id = $userId";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    echo "<img src='./action/gambar/".$data['user_foto']."' width='60' alt='Foto User'>";
    echo "<p>".$data['user_nama']."</p>";
    echo "<p>".$data['user_nim']."</p>";
    echo "<p>".$data['user_alamat']."</p>";
    echo "<p>".$data['user_tanggal_lahir']."</p>";
    echo "<p>".$data['user_tempat_lahir']."</p>";
    echo "<p>".$data['user_email']."</p>";
    echo "<p>".$data['user_agama']."</p>";
    echo "<p>".$data['user_jenis_kelamin']."</p>";
    echo "<p>".$data['user_jurusan']."</p>";
}
?>