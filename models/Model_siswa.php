<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model{

   public function get()
{
$this->db->from($this->table);
$query = $this->db->get();
return $query->result_array();
}
}
?>
