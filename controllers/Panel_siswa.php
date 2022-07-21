<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_siswa extends CI_Controller {
	
	public function index()
	{
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('');
		}else{
			$data['user']   	 = $this->db->get_where('siswa', "no_pendaftaran='$ceks'");
			$data['judul_web'] = "Dashboard Siswa";
			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/dashboard', $data);
			$this->load->view('siswa/footer');
		}
	}

	public function pengumuman()
	{
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('');
		}else{
			$data['user']   	 = $this->db->get_where('siswa', "no_pendaftaran='$ceks'");
			$data['judul_web'] = "Pengumuman";

			$this->load->view('siswa/header', $data);
			$this->load->view('siswa/pengumuman', $data);
			$this->load->view('siswa/footer');
		}
	}


	public function biodata()
	{
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('logcs');
		}else{
			$data['user']  = $this->db->get_where('siswa', "no_pendaftaran='$ceks'");
 			$data['judul_web'] = "Biodata ".ucwords($data['user']->row()->nama_lengkap);

					$this->load->view('siswa/header', $data);
					$this->load->view('siswa/biodata', $data);
					$this->load->view('siswa/footer');
		}
	}


	public function cetak() {
		$ceks = $this->session->userdata('no_pendaftaran');
		if(!isset($ceks)) {
			redirect('logcs');
		}
		$data['user'] 			= $this->db->get_where('siswa', "no_pendaftaran='$ceks'")->row();
		$data['judul_web'] 	= "Cetak Bukti Pendaftaran ".ucwords($data['user']->nama_lengkap);

		$data['thn_ppdb'] 	= date('Y', strtotime($data['user']->tgl_siswa));

		$this->db->select_sum('rata_rata_nilai');
		$data['nilai'] 	= $this->db->get_where('nilai', "no_pendaftaran='$ceks'")->row()->rata_rata_nilai / 5;

		$this->load->view('siswa/cetak', $data);
	}

	public function logout() {
		if ($this->session->userdata('no_pendaftaran') != '') {
			$this->session->sess_destroy();
		}
		 redirect('');
	}

}
