<?php include './config/connection.php'; ?>
<!DOCTYPE html>
<html>

<head>
   <title>Data Mahasiswa - UTS </title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="./assets/style/index.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <script>
      $(document).ready(function () {
         $('.hapusBtn').click(function () {
            var userId = $(this).data('id');
            $('#modalHapus').modal('show');
            $('#btnYa').attr('href', './action/delete_action.php?user_id=' + userId);
         });
         $('.editBtn').click(function () {
            var userId = $(this).data('id');
            window.location.href = './page/user_edit.php?user_id=' + userId;
         });
         $('#search').on('keyup', function () {
            var value = $(this).val().toLowerCase();
            $('.data-box').hide().filter(function () {
               return $(this).text().toLowerCase().indexOf(value) > -1;
            }).show();
         });
      });
   </script>
</head>

<body>
   <nav class="d-flex justify-content-center ">
      <a class="nav-title" href="./index.php"><strong>DATA KARYAWAN</strong></a>
   </nav>
   <div class="container">

      <?php
      if (isset($_GET['alert'])) {
         $alertType = $_GET['alert'];
         $messages = [
            'gagal_ekstensi' => 'Ekstensi Tidak Diperbolehkan',
            'gagal_ukuran' => 'Ukuran File terlalu Besar',
            'berhasil' => 'Berhasil Disimpan'
         ];
         $alertClass = $alertType == 'berhasil' ? 'alert-success' : 'alert-warning';
         ?>
         <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> <?php echo $alertType == 'berhasil' ? 'Success' : 'Peringatan !'; ?></h4>
            <?php echo $messages[$alertType]; ?>
         </div>
         <script>
            setTimeout(function () {
               $('.alert').alert('close');
            }, 2000);
         </script>
         <?php
         unset($_GET['alert']);
      }
      ?>
      <div class="header">
         <a href="./page/user_add.php" class="btn-add">Tambah Data + </a>
         <input class="form-control" id="search" type="text" placeholder="Cari data..">
      </div>


      <?php
      $no = 1;
      $data = mysqli_query($koneksi, "select * from user");
      while ($d = mysqli_fetch_array($data)) {
         ?>

         <div class="data-box">
            <div class="data-container">
               <div class="title-data">
                  <p><?php echo $no++; ?></p>
                  <p>Nama</p>
                  <p>NIM</p>
                  <p>Alamat</p>

               </div>

               <div class="detail-data">
                  <img src="./action/gambar/<?php echo $d['user_foto'] ?>" width="60" alt="Foto User">
                  <p><?php echo $d['user_nama']; ?></p>
                  <p><?php echo $d['user_nim']; ?></p>
                  <p><?php echo $d['user_alamat']; ?></p>
               </div>
            </div>
            <div class="action">
               <a class="editBtn action-btn" data-id="<?php echo $d['user_id']; ?>">
                  <img src="./assets/icon/edit.svg" alt="edit" width="30">
               </a>
               <a class="hapusBtn action-btn " data-id="<?php echo $d['user_id']; ?>"><img src="./assets/icon/delete.svg"
                     alt="delete" width="30"></a>
            </div>

         </div>
         <?php
      }
      ?>

      <!-- Modiv Hapus -->
      <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  Apakah Anda yakin ingin menghapus data ini?
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                  <a href="#" id="btnYa" class="btn btn-danger">Ya</a>
               </div>
            </div>
         </div>
      </div>
</body>

</html>