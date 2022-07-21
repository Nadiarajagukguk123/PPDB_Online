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
      <div class="panel panel-flat bg-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <center>Selamat Datang Calon Siswa SMP Negeri 4 TAPUNG, <?php echo ucwords($nama); ?></center>
          </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <?php if ($cek->status_pendaftaran == 'lulus') {?>
            <div class="panel panel-flat bg-success">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <center>
                    <i class="glyphicon glyphicon-bullhorn"></i> Selamat <b><?php echo $nama; ?></b> <span class="label label-info" style="font-size:20px;">Lulus</span> Seleksi Sebagai Calon Peserta Didik Baru.
                    <hr style="margin:0px;margin-bottom:10px;">
                  </center>
                </h4>
              </div>
            </div>
          <?php }elseif ($cek->status_pendaftaran == 'tidak lulus') {?>
            <div class="panel panel-flat bg-warning">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <center>
                    <i class="glyphicon glyphicon-bullhorn"></i> Mohon Maaf <b><?php echo $nama; ?></b>
                     <span class="label label-danger" style="font-size:20px;">Tidak Lulus</span> 
                    Sebagai Calon Peserta Didik Baru <b>SMP NEGERI 4 TAPUNG</b>.
                  </center>
                </h4>
              </div>
            </div>
          <?php } ?>
      
          <!-- Quick stats boxes -->
          <div class="row">
            <div class="col-lg-3">
              <!-- Current server load -->
            <center>
              <a href="panel_siswa/biodata">
              <div class="panel bg-green">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h1 class="no-margin">
                    <i class="icon-file-check2" style="font-size:200px;"></i>
                  </h1>
                  Biodata Pendaftaran
                </div>
              </div>
              </a>
            </center>
              <!-- /current server load -->
            </div>

            <div class="col-lg-3">
              <!-- Current server load -->
            <center>
              <a href="panel_siswa/cetak" target="_blank">
              <div class="panel bg-teal-400">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h1 class="no-margin">
                    <i class="icon-printer2" style="font-size:200px;"></i>
                  </h1>
                  Cetak Bukti Pendaftaran
                </div>
              </div>
              </a>
            </center>
              <!-- /current server load -->
            </div>

            <div class="col-lg-3">
              <!-- Current server load -->
            <center>
              <a href="panel_siswa/rekap_nilai" target="_blank">
              <div class="panel bg-blue-400">
                <div class="panel-body">
                  <div class="heading-elements">
                    <span class="heading-text"></span>
                  </div>
                  <h1 class="no-margin">
                    <i class="icon-printer4" style="font-size:200px;"></i>
                  </h1>
                  Nilai Siswa
                </div>
              </div>
              </a>
            </center>
              <!-- /current server load -->
            </div>

          </div>
          <!-- /quick stats boxes -->


        </div>

      </div>

    </div>
    <!-- /dashboard content -->
