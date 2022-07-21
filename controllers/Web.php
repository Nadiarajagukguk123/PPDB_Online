<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index()
	{
		$data['web_ppdb']	 = $this->db->get_where('websitte', "id_web='1'")->row();
		$this->load->view('web/index', $data);
	}

	public function pendaftaran()
	{
		$data['web_ppdb']	 = $this->db->get_where('websitte', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
		}

		$this->load->view('web/pendaftaran', $data);

		if (isset($_POST['btndaftar'])) {
			$this->db->order_by('id', 'DESC');
			$sql 		= $this->db->get('siswa');
			if ($sql->num_rows() == 0) {
			  $no_pendaftaran   = "01";
			}else{
			  $noUrut 	 	= substr($sql->row()->no_pendaftaran, 8, 3);
			  $noUrut++;
			  $no_pendaftaran	  = "18004".sprintf("%03s", $noUrut);
			}

			$nisn = $this->input->post('nisn');
			$nama_lengkap= $this->input->post('nama_lengkap');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$tempat_lahir= $this->input->post('tempat_lahir');
			$tgl_lahir= $this->input->post('tgl_lahir')."-".$this->input->post('bln_lahir')."-".$this->input->post('thn_lahir');
			$agama= $this->input->post('agama');
			$alamat= $this->input->post('alamat');
			$no_hp= $this->input->post('no_hp');
			$nama_ayah	= $this->input->post('nama_ayah');
			$pendidikan_ayah = $this->input->post('pendidikan_ayah');
			$pekerjaan_ayah	= $this->input->post('pekerjaan_ayah');
			$no_hp_ayah	= $this->input->post('no_hp_ayah');
			$nama_ibu = $this->input->post('nama_ibu');
			$pendidikan_ibu = $this->input->post('pendidikan_ibu');
			$pekerjaan_ibu	= $this->input->post('pekerjaan_ibu');
			$no_hp_ibu = $this->input->post('no_hp_ibu');
			$tgl_siswa	= $this->Model_data->date('waktu_default');

					$data = array(
						'no_pendaftaran'=> $no_pendaftaran,
						'password' => $nisn,
						'nisn'=> $nisn,
						'nama_lengkap'=> $nama_lengkap,
						'jenis_kelamin'=> $jenis_kelamin,
						'tempat_lahir'=> $tempat_lahir,
						'tgl_lahir'=> $tgl_lahir,
						'agama'	=> $agama,
						'alamat' => $alamat,
						'no_hp' => $no_hp,
						'nama_ayah' => $nama_ayah,
						'pendidikan_ayah' => $pendidikan_ayah,
						'pekerjaan_ayah' => $pekerjaan_ayah,
						'no_hp_ayah' => $no_hp_ayah,
						'nama_ibu' => $nama_ibu,
						'pendidikan_ibu' => $pendidikan_ibu,
						'pekerjaan_ibu' => $pekerjaan_ibu,
						'no_hp_ibu ' => $no_hp_ibu,
						'tgl_siswa'	=> $tgl_siswa

					);
					$this->db->insert('siswa',$data);

					for ($i=1; $i <=5 ; $i++) {
						if ($i == 1) {
							$mapel = 'Ilmu Pengetahuan Alam (IPA)';
							$smstr = 'ipa';
						}elseif ($i == 2) {
							$mapel = 'Ilmu Pengetahuan Sosial (IPS)';
							$smstr = 'ips';
						}elseif ($i == 3) {
							$mapel = 'Matematika';
							$smstr = 'mtk';
						}elseif ($i == 4) {
							$mapel = 'Bahasa Indonesia';
							$smstr = 'ind';
						}elseif ($i == 5) {
							$mapel = 'Bahasa Inggris';
							$smstr = 'ing';
						}
						$data2 = array(
							'mapel'	=> $mapel,
							'semester1'=> $this->input->post($smstr."1"),
							'semester2'=> $this->input->post($smstr."2"),
							'semester3'=> $this->input->post($smstr."3"),
							'semester4'	=> $this->input->post($smstr."4"),
							'semester5'	=> $this->input->post($smstr."5"),
							'rata_rata_nilai'=> $this->input->post("nilai_".$smstr),
							'no_pendaftaran'=> $no_pendaftaran
						);
						$this->db->insert('nilai',$data2);
					}

						$this->session->set_userdata('no_pendaftaran', "$no_pendaftaran");
						redirect('panel_siswa');

		}


	}

	public function logcs()
	{
		$data['web_ppdb']	 = $this->db->get_where('websitte', "id_web='1'")->row();
		if ($data['web_ppdb']->status_ppdb == 'tutup') {
			redirect('404');
		}
		$ceks = $this->session->userdata('no_pendaftaran');
		if(isset($ceks)) {
			redirect('panel_siswa');
		}else{
			$this->load->view('web/index', $data);

				if (isset($_POST['btnlogin'])){
						 $username = $_POST['username'];
						 $pass	   = $_POST['password'];
						 $query  = $this->db->get_where('siswa', "no_pendaftaran='$username'");
						 $cek    = $query->result();
						 $cekun  = $cek[0]->no_pendaftaran;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>No. Pendaftaran "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('logcs');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>No. Pendaftaran atau NISN Salah!</strong>.
													 </div>'
												);
												redirect('logcs');
										 } else {
											$this->session->set_userdata('no_pendaftaran', "$cekun");

												 			 	redirect('panel_siswa');
										 }
						 }
				}
		}
	}

}
