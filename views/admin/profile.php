<?php
$user = $user->row();
$level = $user->level;?>
<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
      <div class="panel panel-flat">
          <div class="panel-body">
              <center>
                <img src="assets/panel/images/admin.jpg" alt="<?php echo $user->nama; ?>" class="img-circle" width="176">
              </center>
            <br>
           
          </form>
          </div>
      </div>

      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Profile Anda</legend>
              <?php
              echo $this->session->flashdata('msg');
              ?>
              <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-lg-3">Username</label>
                  <div class="col-lg-9">
                    <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Nama Lengkap</label>
                  <div class="col-lg-9">
                    <input type="text" name="nama" class="form-control" value="<?php echo $user->nama; ?>" placeholder="Nama Lengkap" maxlength="100" required>
                  </div>
                </div>

            </fieldset>
            <div class="col-md-12">
              <hr style="margin-top:-10px;">
              <button type="submit" name="" class="btn btn-primary" style="float:right;">OK!</button>
            </div>
          </form>
          </div>
      </div>
      </div>


    </div>
    <!-- /dashboard content -->
