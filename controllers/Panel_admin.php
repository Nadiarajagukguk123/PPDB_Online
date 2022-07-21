<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
 
        // load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
    }
	public function index()
	{
		$ceks = $this->session->userdata('$unsmp4_tapung');
		if(!isset($ceks)) {

		}else {
			$data['user']   	 = $this->db->get_where('user', "username='$ceks'");
			$data['web_ppdb']	 = $this->db->get_where('websitte', "id_web='1'")->row();
			$data['judul_web'] = "Dashboard";

			
			$this->load->view('admin/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/footer');

			if (isset($_POST['btnnonaktif'])){
				$data = array(
					'status_ppdb'	=> 'tutup',
					'tgl_diubah'  => $this->Model_data->date('waktu_default')
				);
				$this->db->update('websitte', $data, array('id_web' => '1'));
				redirect('panel_admin');
			}
			if (isset($_POST['btnaktif'])){
				$data = array(
					'status_ppdb'	=> 'buka',
					'tgl_diubah'  => $this->Model_data->date('waktu_default')
				);
				$this->db->update('websitte', $data, array('id_web' => '1'));
				redirect('panel_admin');
			}

		}
	}

	public function log_in()
	{
		$ceks = $this->session->userdata('$unsmp4_tapung');
		if(isset($ceks)) {
			$this->load->view('404_content');
		}else{
			$this->load->view('admin/login/header');
			$this->load->view('admin/login/login');
			$this->load->view('admin/login/footer');

				if (isset($_POST['btnlogin'])){
						 $username = $_POST['username'];
						 $pass	   = $_POST['password'];

						 $query  = $this->db->get_where('user', "username='$username'");
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('panel_admin/log_in');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
												redirect('panel_admin/log_in');
										 } else {

																$this->session->set_userdata('$unsmp4_tapung', "$cekun");
																$this->session->set_userdata('id_$unsmp4_tapung', "$row->id_user");

												 			 	redirect('panel_admin');
										 }
						 }
				}
		}
	}


	public function profile()
	{
		$ceks = $this->session->userdata('$unsmp4_tapung');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('user', "username='$ceks'");
			$data['judul_web'] 		= "Profile";

					$this->load->view('admin/header', $data);
					$this->load->view('admin/profile', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$username	 		= $this->input->post('username');
						$nama	= $this->input->post('nama');

									$data = array(
										'username'	   => $username,
										'nama' => $nama
									);
									$this->db->update('user', $data, array('username' => $ceks));

									$this->session->has_userdata('$unsmp4_tapung');
									$this->session->set_userdata('$unsmp4_tapung', "$username");

									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Profile berhasil diperbarui.
										</div>'
									);

						redirect('panel_admin/profile');

					}

		}
	}

	

	public function verifikasi($aksi='', $id='')
	{
		$ceks = $this->session->userdata('$unsmp4_tapung');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('user', "username='$ceks'");
			$data['judul_web'] 		= "Verifikasi";

			if ($aksi == 'cek') {
				$cek_status = $this->db->get_where('siswa', "no_pendaftaran='$id'")->row();
				if ($cek_status->status_verifikasi == 1) {
					$sv = 0;
				}else {
					$sv = 1;
				}
				$data = array(
					'status_verifikasi'	=> $sv
				);
				$this->db->update('siswa', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/verifikasi');
			}elseif ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$this->db->like('tgl_siswa', "$thn", 'after');
			$this->db->order_by('id', 'DESC');
			$data['v_siswa']  		= $this->db->get('siswa');
			$data['v_thn']				= $thn;

					$this->load->view('admin/header', $data);
					$this->load->view('admin/verifikasi/verifikasi', $data);
					$this->load->view('admin/footer');
		}
	}

	public function set_pengumuman($aksi='', $id='')
	{
		$ceks = $this->session->userdata('$unsmp4_tapung');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('user', "username='$ceks'");
			$data['judul_web'] 		= "Setting Pengumuman";

			if ($aksi == 'lulus') {
				$data = array(
					'status_pendaftaran'	=> 'lulus'
				);
				$this->db->update('siswa', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'tdk_lulus') {
				$data = array(
					'status_pendaftaran'	=> 'tidak lulus'
				);
				$this->db->update('siswa', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'batal') {
				$data = array(
					'status_pendaftaran'	=> null
				);
				$this->db->update('siswa', $data, array('no_pendaftaran' => "$id"));
				redirect('panel_admin/set_pengumuman');
			}elseif ($aksi == 'thn') {
				$thn = $id;
			}else {
				$thn = date('Y');
			}
			$this->db->like('tgl_siswa', "$thn", 'after');
			$this->db->order_by('id', 'DESC');
			$data['v_siswa']  		= $this->db->get('siswa');
			$data['v_thn']				= $thn;

					$this->load->view('admin/header', $data);
					$this->load->view('admin/set_pengumuman/set_pengumuman', $data);
					$this->load->view('admin/footer');
		}
	}

	public function edit_ket($aksi='', $id='')
	{
		$ceks = $this->session->userdata('$unsmp4_tapung');
		if(!isset($ceks)) {
			redirect('panel_admin/log_in');
		}else{
			$data['user']  			  = $this->db->get_where('user', "username='$ceks'");
			$data['judul_web'] 		= "Edit Keterangan Lulus";

			$data['v_ket']	  		= $this->db->get_where('pengumuman', "id_pengumuman='1'")->row();

					$this->load->view('admin/header', $data);
					$this->load->view('admin/set_pengumuman/set_keterangan', $data);
					$this->load->view('admin/footer');

					if (isset($_POST['btnupdate'])) {
						$data = array(
							'ket_pengumuman'	=> $this->input->post('ket_pengumuman')
						);
						$this->db->update('pengumuman', $data, array('id_pengumuman' => "1"));

						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Keterangan Pengumuman berhasil diperbarui.
							</div>'
						);
						redirect('panel_admin/set_pengumuman');
					}
		}
	}
	public function logout() {
     if ($this->session->has_userdata('$unsmp4_tapung') != '' AND $this->session->has_userdata('id_$unsmp4_tapung') != '') {
         $this->session->sess_destroy();
     }
		 redirect('panel_admin/log_in');
  }

}