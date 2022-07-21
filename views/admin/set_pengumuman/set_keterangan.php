<script type="text/javascript" src="assets/panel/ckeditor/ckeditor.js"></script>
<style>
  label{font-weight: bold;}
</style>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="panel panel-flat">

            <div class="panel-body">

              <fieldset class="content-group">
                <legend class="text-bold"> Edit Keterangan Lulus</legend>
                <?php
                echo $this->session->flashdata('msg');
                ?>
                <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                    <label class="control-label col-lg-12">Keterangan:</label>
                    <div class="col-lg-12">
                      <textarea type="text" name="ket_pengumuman" class="form-control ckeditor" id="ckedtor" placeholder="Isi Keterangan" required><?php echo $v_ket->ket_pengumuman; ?></textarea>
                    </div>
                  </div>
                  <hr>
                  <a href="panel_admin/set_pengumuman" class="btn btn-default">Setting Pengumuman</a>
                  <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Simpan</button>
                </form>

              </fieldset>


            </div>

        </div>
      </div>
    </div>
    <!-- /dashboard content -->
