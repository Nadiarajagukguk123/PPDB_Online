<style>
  #tbl_input{width:50px;text-align: center;}
  #tbl_input2{width:100px;text-align: center;}
  #th_center > th {text-align: center;}
</style>

<?php
error_reporting(0);
$user = $user->row();?>
<!-- Main content -->
<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3">
      <!-- <div class="panel panel-flat"> -->

          </form>
          </div>
      </div>
      </div>

      <div class="col-md-9">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Biodata Siswa</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="20%">NO. PENDAFTARAN</th>
                      <th width="1%">:</th>
                      <td><?php echo $user->no_pendaftaran; ?></td>
                    </tr>
                    <tr>
                      <th>NISN</th>
                      <th>:</th>
                      <td><?php echo $user->nisn; ?></td>
                    </tr>
                    <tr>
                      <th>Nama Lengkap</th>
                      <th>:</th>
                      <td><?php echo ucwords($user->nama_lengkap); ?></td>
                    </tr>
                    <tr>
                      <th>Jenis Kelamin</th>
                      <th>:</th>
                      <td><?php echo $user->jenis_kelamin; ?></td>
                    </tr>
                    <tr>
                      <th>Tempat, Tgl Lahir</th>
                      <th>:</th>
                      <td><?php echo "$user->tempat_lahir, ".$user->tgl_lahir; ?></td>
                    </tr>
                    <tr>
                      <th>Agama</th>
                      <th>:</th>
                      <td><?php echo $user->agama; ?></td>
                    </tr>
                    <tr>
                      <th>Alamat</th>
                      <th>:</th>
                      <td><?php echo $user->alamat; ?></td>
                    </tr>
                    <tr>
                      <th>No. Handphone</th>
                      <th>:</th>
                      <td><?php echo $user->no_hp; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Data Ayah</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="20%">Nama Lengkap</th>
                      <th width="1%">:</th>
                      <td><?php echo ucwords($user->nama_ayah); ?></td>
                    </tr>
                    <tr>
                      <th>Pendidikan Ayah</th>
                      <th>:</th>
                      <td><?php echo $user->pendidikan_ayah; ?></td>
                    </tr>
                    <tr>
                      <th>Pekerjaan Ayah</th>
                      <th>:</th>
                      <td><?php echo $user->pekerjaan_ayah; ?></td>
                    </tr>
                    <tr>
                      <th>No HP Ayah</th>
                      <th>:</th>
                      <td><?php echo $user->no_hp_ayah; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-user"></i> Data Ibu</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th width="20%">Nama Lengkap</th>
                      <th width="1%">:</th>
                      <td><?php echo ucwords($user->nama_ibu); ?></td>
                    </tr>
                    <tr>
                      <th>Pendidikan Ibu</th>
                      <th>:</th>
                      <td><?php echo $user->pendidikan_ibu; ?></td>
                    </tr>
                    <tr>
                      <th>Pekerjaan Ibu</th>
                      <th>:</th>
                      <td><?php echo $user->pekerjaan_ibu; ?></td>
                    </tr>
                    <tr>
                      <th>No HP Ibu</th>
                      <th>:</th>
                      <td><?php echo $user->no_hp_ibu; ?></td>
                    </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
      </div>
     
      <div class="col-md-6">
      <div class="panel panel-flat">
          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold"><i class="icon-profile"></i> Nilai Rapor</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" border="1">
                  <tr id="th_center">
                    <th rowspan="2">Mata Pelajaran</th>
                    <th colspan="5" width="25">Semester</th>
                    <th rowspan="2">Rata-Rata Nilai</th>
                  </tr>
                  <tr id="th_center">
                    <th width="5">1</th>
                    <th width="5">2</th>
                    <th width="5">3</th>
                    <th width="5">4</th>
                    <th width="5">5</th>
                  </tr>
                  <tr>
                    <td>Ilmu Pengetahuan Alam (IPA)</td>
                    <?php
                      $ipa = $this->db->get_where('nilai', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Ilmu Pengetahuan Alam (IPA)"))->row();
                    ?>
                    <td><?php echo number_format($ipa->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($ipa->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($ipa->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($ipa->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($ipa->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($ipa->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <tr>
                    <td>Ilmu Pengetahuan Sosial (IPS)</td>
                    <?php
                      $ips = $this->db->get_where('nilai', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Ilmu Pengetahuan Sosial (IPS)"))->row();
                    ?>
                    <td><?php echo number_format($ips->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($ips->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($ips->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($ips->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($ips->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($ips->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <tr>
                    <td>Matematika </td>
                    <?php
                      $mtk = $this->db->get_where('nilai', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Matematika"))->row();
                    ?>
                    <td><?php echo number_format($mtk->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($mtk->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($mtk->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($mtk->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($mtk->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($mtk->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <tr>
                    <td>Bahasa Indonesia </td>
                    <?php
                      $ind = $this->db->get_where('nilai', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Bahasa Indonesia"))->row();
                    ?>
                    <td><?php echo number_format($ind->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($ind->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($ind->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($ind->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($ind->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($ind->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <tr>
                    <td>Bahasa Inggris </td>
                    <?php
                      $ing = $this->db->get_where('nilai', array('no_pendaftaran' => $user->no_pendaftaran, "mapel"=>"Bahasa Inggris"))->row();
                    ?>
                    <td><?php echo number_format($ing->semester1,2,",","."); ?></td>
                    <td><?php echo number_format($ing->semester2,2,",","."); ?></td>
                    <td><?php echo number_format($ing->semester3,2,",","."); ?></td>
                    <td><?php echo number_format($ing->semester4,2,",","."); ?></td>
                    <td><?php echo number_format($ing->semester5,2,",","."); ?></td>
                    <th><?php echo number_format($ing->rata_rata_nilai,2,",","."); ?></th>
                  </tr>
                  <tr id="th_center">
                    <th colspan="6">Rata-Rata Rapor</th>
                    <th><?php echo number_format(($ipa->rata_rata_nilai+$ips->rata_rata_nilai+$mtk->rata_rata_nilai+$ind->rata_rata_nilai+$ing->rata_rata_nilai)/5,2,",","."); ?></th>
                  </tr>
                </table>
              </div>
            </fieldset>
          </div>
      </div>
</div>


    </div>
    <!-- /dashboard content -->
