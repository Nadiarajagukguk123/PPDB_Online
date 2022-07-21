<?php
  $cek    = $user->row();
  $id = $cek->id;
  $nama    = $cek->nama;
  $level   = $cek->level;

  $tgl = date('m-Y');
?>

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat bg-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <center>Selamat Datang, <?php echo ucwords($nama); ?></center>
          </h3>
        </div>
      </div>
    
        </div>

      </div>

      <?php if ($web_ppdb->status_ppdb == 'buka') {?>
        <div class="alert alert-info alert-dismissible" role="alert">
          <form action="" method="post">
            <button type="submit" name="btnnonaktif" class="btn btn-primary" onclick="return confirm('Anda Yakin?')"><i class="icon-laptop"></i> Tutup Pendaftaran PPDB Online!</button>
            <strong>Status Pendaftaran PPDB Online</strong> masih dibuka. Terakhir diubah <?php echo date('d-m-Y H:i:s', strtotime($web_ppdb->tgl_diubah)); ?>.
           </form>
        </div>
      <?php }else{ ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <form action="" method="post">
            <button type="submit" name="btnaktif" class="btn btn-warning" onclick="return confirm('Anda Yakin?')"><i class="icon-laptop"></i> Buka Pendaftaran PPDB Online!</button>
            <strong>Status Pendaftaran PPDB Online</strong> masih ditutup. Terakhir diubah <?php echo date('d-m-Y H:i:s', strtotime($web_ppdb->tgl_diubah)); ?>.
           </form>
        </div>
      <?php } ?>

    </div>
    <!-- /dashboard content -->
 
