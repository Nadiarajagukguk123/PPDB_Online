<div class="panel panel-primary">
  <div class="panel-heading">
    <h2><strong class="text-success" style="color:#eee;">Data Siswa</strong></h2>
  </div>
  <div class="panel-body">

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">NISN <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="nisn" class="form-control class" placeholder="Nomor Induk Siswa Nasional" data-parsley-group="block1">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3" style="text-align:right; margin-top:6px">Nama Lengkap <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap Siswa">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3" style="text-align:right; margin-top:6px">Jenis Kelamin <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <select class="form-control class" placeholder="Jenis Kelamin" name="jenis_kelamin" data-parsley-group="block1">
          <option value="Pilih_opsi">Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3" style="text-align:right; margin-top:6px">Tempat Lahir <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <input type="text" name="tempat_lahir" class="form-control class" placeholder="Tempat Lahir" data-parsley-group="block1" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tanggal Lahir <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <div class="col-sm-4" style="padding:0px">
          <select class="form-control class" name="tgl_lahir" data-parsley-group="block1">
            <option value="" selected>Pilih Tanggal</option>
            <?php for ($i = 1;$i <= 31; $i++) {
              if ($i < 10) {
                $i = "0" . $i;
              } ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-4" style="padding-left:3px;">
          <select class="form-control class" data-placeholder="Pilih Bulan" name="bln_lahir" 
          data-parsley-group="block1">
            <option value="" selected>Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <div class="col-sm-4">

          <select class="form-control class" data-placeholder="Pilih Tahun Lahir" name="thn_lahir" 
          data-parsley-group="block1">
            <option value="" selected>Pilih Tahun Lahir</option>
            <?php
            $thn_max = date('Y') - 1;
            for ($i = 2001; $i <= $thn_max; $i++) { ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>

      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3" style="text-align:right; margin-top:6px">Agama <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
      <input type="text" name="agama" class="form-control class" placeholder="Agama" data-parsley-group="block1" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3" style="text-align:right; margin-top:6px">Alamat <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <input type="text" name="alamat" class="form-control class" placeholder="Alamat Siswa" data-parsley-group="block1">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3" style="text-align:right; margin-top:6px">No Hp <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <input type="text" name="no_hp" class="form-control class" placeholder="No Hp Siswa" data-parsley-group="block1">
      </div>
    </div>

  </div>
</div>


<div class="col-md-12">
  <hr>
  <div>