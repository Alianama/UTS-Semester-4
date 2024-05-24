<!DOCTYPE html>
<html>

<head>
   <title>www.malasngoding.com - Upload file menggunakan php mysqli</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="../assets/style/add_page.css">
</head>

<body>
   <nav>
      <h1>Tambah Data Mahasiswa</h1>
   </nav>
   <div class="container">

      <form action="../action/add_action.php" method="post" enctype="multipart/form-data">
         <div class="form-group">
            <input type="text" class="form-control" placeholder="Masukkan Nama" name="user_nama" required="required">
         </div>
         <div class="form-group">
            <input type="text" class="form-control" placeholder="Masukkan NIM" name="user_nim" required="required">
         </div>
         <div class="form-group">
            <textarea class="form-control" name="user_alamat" placeholder="Masukan Alamat"
               required="required"></textarea>
         </div>
         <div class="form-group">
            <input type="email" class="form-control" placeholder="Masukkan Email" name="user_email" required="required">
         </div>
         <div class="form-group">
            <select class="form-control" name="user_agama" required="required">
               <option value="">Pilih Agama</option>
               <option value="Islam">Islam</option>
               <option value="Kristen">Kristen</option>
               <option value="Hindu">Hindu</option>
               <option value="Buddha">Buddha</option>
               <option value="Konghucu">Konghucu</option>
            </select>
         </div>
         <div class="form-group">
            <select class="form-control" name="user_jenis_kelamin" required="required">
               <option value="">Pilih Jenis Kelamin</option>
               <option value="Laki-laki">Laki-laki</option>
               <option value="Perempuan">Perempuan</option>
            </select>
         </div>
         <div class="form-group">
            <input type="text" class="form-control" placeholder="Masukkan Jurusan" name="user_jurusan"
               required="required">
         </div>
         <div class="form-group">
            <input type="date" class="form-control" name="user_tanggal_lahir" required="required">
         </div>
         <div class="form-group">
            <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="user_tempat_lahir"
               required="required">
         </div>
         <div class="form-group">
            <input type="file" name="user_foto" required="required">
            <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
         </div>
         <div class="action-container">
            <input type="submit" value="Simpan" class="simpan-btn">
            <a href="../index.php" class="cancel-btn">Batal</a>
         </div>
      </form>
   </div>

</body>

</html>