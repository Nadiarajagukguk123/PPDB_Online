<?php
  $cek    = $user->row();
  $id_user = $cek->id;
  $nama    = $cek->nama_lengkap;

  $tgl = date('m-Y');
?>

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
    <?php if ($cek->status_pendaftaran == 'lulus') {?>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body">
          <h3>
            <center>
              Selamat <b><?php echo $nama; ?></b> <span class="label label-success" style="font-size:20px;">Lulus</span> Seleksi Sebagai Calon Peserta Didik Baru <b>SMP NEGERI 4 TAPUNG 
              <hr>
            </center>
          </h3>
        </div>
      </div>
    <?php }elseif ($cek->status_pendaftaran == 'tidak lulus') { ?>
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body" style="color:red">
          <h3>
            <center>
              Mohon Maaf <b><?php echo $nama; ?></b>
               <span class="label label-danger" style="font-size:20px;">Tidak Lulus</span> <br>
              Sebagai Calon Peserta Didik Baru <b>SMP NEGERI 4 TAPUNG</b>.
            </center>
            <br>
          </h3>
        </div>
      </div>
    <?php }else{ ?>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <i class="glyphicon glyphicon-bullhorn"></i> Pengumuman
          </h3>
        </div>
        <div class="panel-body">
          <h3>
            <center>~ Belum ada Pengumuman dari SEKOLAH</center>
          </h3>
        </div>
      </div>
    <?php } ?>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
