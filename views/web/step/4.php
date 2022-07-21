<div class="panel panel-primary">
  <div class="panel-heading">
    <h2><strong class="text-success" style="color:#eee;">Nilai Rapor</strong></h2>
  </div>
  <div class="panel-body">

  <div class="table">
    <table class="table" width="50%" border="1">
      <tr id="th_center">
        <th rowspan="2">Mata Pelajaran</th>
        <th colspan="5" width="25">Semester</th>
        <th rowspan="2">Rata-Rata Nilai</th>
      </tr>
      <tr id="">
        <th width="5">Sem 1</th>
        <th width="5">Sem 2</th>
        <th width="5">Sem 3</th>
        <th width="5">Sem 4</th>
        <th width="5">Sem 5</th>
      </tr>
      <tr>
        <td>Ilmu Pengetahuan Alam (IPA)</td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="ipa<?php echo $i;?>" value="" onkeyup="hitung('ipa');" id="tbl_input" data-parsley-group="block5">
        </td>
        <?php } ?>
        <td>
          <b id="nilai_ipa">0</b>
          <input type="hidden" name="nilai_ipa" value="0">
        </td>
      </tr>
      <tr>
        <td>Ilmu Pengetahuan Sosial (IPS)</td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="ips<?php echo $i;?>" value="" onkeyup="hitung('ips');" id="tbl_input"  data-parsley-group="block5">
        </td>
        <?php } ?>
        <td>
          <b id="nilai_ips">0</b>
          <input type="hidden" name="nilai_ips" value="0">
        </td>
      </tr>
      <tr>
        <td>Matematika </td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="mtk<?php echo $i;?>" value="" onkeyup="hitung('mtk');" id="tbl_input" data-parsley-group="block5" >
        </td>
        <?php } ?>
        <td>
          <b id="nilai_mtk">0</b>
          <input type="hidden" name="nilai_mtk" value="0">
        </td>
      </tr>
      <tr>
        <td>Bahasa Indonesia </td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="ind<?php echo $i;?>" value="" onkeyup="hitung('ind');" id="tbl_input" data-parsley-group="block5">
        </td>
        <?php } ?>
        <td>
          <b id="nilai_ind">0</b>
          <input type="hidden" name="nilai_ind" value="0">
        </td>
      </tr>
      <tr>
        <td>Bahasa Inggris </td>
        <?php for ($i=1; $i <=5 ; $i++) {?>
        <td>
          <input type="text" name="ing<?php echo $i;?>" value="" onkeyup="hitung('ing');" id="tbl_input" data-parsley-group="block5">
        </td>
        <?php } ?>
        <td>
          <b id="nilai_ing">0</b>
          <input type="hidden" name="nilai_ing" value="0">
        </td>
      </tr>
      <tr id="th_center">
        <th colspan="6">Rata-Rata Raport</th>
        <th><b id="total_nilai">0</b></th>
        <input type="hidden" name="total_nilai" value="0">
      </tr>
      <tr>
        <th colspan="7">
          <div class="msg_error">

          </div>
        </th>
      </tr>
    </table>
  </div>
  </div>
</div>

<script type="text/javascript">
$('.msg_error').html('');
function hitung(name)
{
  var v1 = $('[name="'+name+'1"]').val();
  var v2 = $('[name="'+name+'2"]').val();
  var v3 = $('[name="'+name+'3"]').val();
  var v4 = $('[name="'+name+'4"]').val();
  var v5 = $('[name="'+name+'5"]').val();

  if (v1 == '') {v1 = 0;}
  if (v2 == '') {v2 = 0;}
  if (v3 == '') {v3 = 0;}
  if (v4 == '') {v4 = 0;}
  if (v5 == '') {v5 = 0;}

  jml = parseInt(v1)+parseInt(v2)+parseInt(v3)+parseInt(v4)+parseInt(v5);
  rata_rata = jml / 5;
  $('#nilai_'+name).text(rata_rata);
  $('[name="nilai_'+name+'"]').val(rata_rata);

  jml_nilai = parseInt($('#nilai_ipa').text())+parseInt($('#nilai_ips').text())+parseInt($('#nilai_mtk').text())+parseInt($('#nilai_ind').text())+parseInt($('#nilai_ing').text());
  total_nilai =  jml_nilai / parseInt(5);
  jml_nilai_fix   = jml_nilai.toFixed(2);
  total_nilai_fix = total_nilai.toFixed(2);
  $('#total_nilai').text(total_nilai);
  $('[name="total_nilai"]').val(total_nilai);

  if ($('#nilai_ipa').text() != 0 && $('#nilai_ips').text() != 0 && $('#nilai_mtk').text() != 0 && $('#nilai_ind').text() != 0 && $('#nilai_ing').text() != 0) {
    if (total_nilai < 56) {
      $('.next-btn').hide();
      return false;
    }else {
      $('.next-btn').show();
      $('.msg_error').html('');
      return true;
    }
  }
}

</script>
