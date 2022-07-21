<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data extends CI_Model{

   public function date($aksi)
   {
     date_default_timezone_set('Asia/Jakarta');
     if ($aksi == 'waktu') {
       $date	 = date('d-m-Y H:i:s');
     }elseif ($aksi == 'waktu_default') {
       $date	 = date('Y-m-d H:i:s');
     }elseif ($aksi == 'thn') {
       $date	 = date('Y');
     }elseif ($aksi == 'bln') {
       $date	 = date('m');
     }elseif ($aksi == 'tgl_default') {
       $date	 = date('Y-m-d');
     }elseif ($aksi == 'tgl') {
       $date	 = date('d-m-Y');
     }elseif ($aksi == 'jam') {
       $date	 = date('H:i:s');
     }else {
       $date  = 'Null';
     }

     return $date;
   }

   public static function tgl_id($date)
 	{
 			$str = explode('-', $date);
 			$bulan = array(
 				'01' => 'Januari',
 				'02' => 'Februari',
 				'03' => 'Maret',
 				'04' => 'April',
 				'05' => 'Mei',
 				'06' => 'Juni',
 				'07' => 'Juli',
 				'08' => 'Agustus',
 				'09' => 'September',
 				'10' => 'Oktober',
 				'11' => 'November',
 				'12' => 'Desember',
 			);
 			return $str['0'] . " " . $bulan[$str[1]] . " " .$str[2];
 	}

   public static function bln_id($date)
 	{
     $str = explode('-', $date);
 			$bulan = array(
 				'01' => 'Januari',
 				'02' => 'Februari',
 				'03' => 'Maret',
 				'04' => 'April',
 				'05' => 'Mei',
 				'06' => 'Juni',
 				'07' => 'Juli',
 				'08' => 'Agustus',
 				'09' => 'September',
 				'10' => 'Oktober',
 				'11' => 'November',
 				'12' => 'Desember',
 			);
 			return $bulan[$str[0]];
 	}

}
?>
