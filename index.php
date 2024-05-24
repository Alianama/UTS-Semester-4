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
   $(document).ready(function() {
      $('.hapusBtn').click(function() {
         var userId = $(this).data('id');
         $('#modalHapus').modal('show');
         $('#btnYa').attr('href', './action/delete_action.php?user_id=' + userId);
      });
      $('.editBtn').click(function() {
         var userId = $(this).data('id');
         window.location.href = './page/user_edit.php?user_id=' + userId;
      });
      $('.detailBtn').click(function() {
         var userId = $(this).data('id');
         $.ajax({
            url: './action/detail_action.php',
            type: 'GET',
            data: {
               user_id: userId
            },
            success: function(data) {
               $('#modalDetail .modal-body').html(data);
               $('#modalDetail').modal('show');
            },
            error: function() {
               alert('Failed to fetch details. Please try again.');
            }
         });
      });
      $('#search').on('keyup', function() {
         var value = $(this).val().toLowerCase();
         $('.data-box').hide().filter(function() {
            return $(this).text().toLowerCase().indexOf(value) > -1;
         }).show();
      });
   });
   </script>
</head>

<body>
   <nav class="d-flex justify-content-center ">
      <h1 class="nav-title">DATA KARYAWAN</h1>
   </nav>
   <div class="aksen"></div>
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
      setTimeout(function() {
         $('.alert').alert('close');
         window.location.href = "./index.php";
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
            <div class="foto">
               <p>Foto</p>
               <img src="./action/gambar/<?php echo $d['user_foto'] ?>" width="60" alt="Foto User">
            </div>
            <div class="nama">
               <p>Nama</p>
               <?php echo $d['user_nama']; ?>
            </div>
            <div class="nim">
               <p>NIM</p>
               <?php echo $d['user_nim']; ?>
            </div>
            <div class="jurusan">
               <p>Jurusan</p>
               <?php echo $d['user_jurusan']; ?>
            </div>
         </div>

         <div class="action">
            <div class="action-title">
               <p>Action</p>
            </div>
            <div class="action-container">
               <a class="hapusBtn action-btn " data-id="<?php echo $d['user_id']; ?>"><img
                     src="./assets/icon/delete.svg" alt="delete" title="Delete" width="30"></a>
               <a class="editBtn action-btn" data-id="<?php echo $d['user_id']; ?>">
                  <img src="./assets/icon/edit.svg" alt="edit" title="Edit" width="30">
               </a>
               <a class="detailBtn action-btn" data-id="<?php echo $d['user_id']; ?>"><img src="./assets/icon/view.svg"
                     alt="view" title="Show Detail" width="30"></a>
            </div>
         </div>

      </div>
      <?php
      }
      ?>

      <!-- Modal Hapus -->
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

      <!-- Modal Detail -->
      <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalDetailLabel">Detail Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">

               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
</body>

</html>