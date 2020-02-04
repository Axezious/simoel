<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('jadwalmodel');

		//cek apakah sudah login atau belum
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('info', 'Maaf, Anda harus login terlebih dahulu.');
			redirect(base_url("site"));
		}
	}

	public function index()
	{	
		$where = "a.idJadwal IS NOT NULL";
		$data['jadwal'] = $this->jadwalmodel->getAll($where);
		$data['content'] = "jadwal/view";
		$this->load->view('template/template', $data);
	}

	public function add()
	{
		$this->load->library('fungsi');

		if($this->input->post('submit')) 
			{

				$lastId = $this->jadwalmodel->getLastId()+1;

				$idJadwal			= $this->input->post('idJadwal');
				$namaPegawai		= $this->input->post('namaPegawai');
				$namaKendaraan 		= $this->input->post('namaKendaraan');
				$namaDriver 		= $this->input->post('namaDriver');
				$tujuan 			= $this->input->post('tujuan');
				$kepentingan 		= $this->input->post('Kepentingan');
				$tglBerangkat 		= $this->input->post('tglBerangkat');
				$lamaWaktu			= $this->input->post('lamaWaktu');
				$statusPerjalanan	= $this->input->post('statusPerjalanan');
				
						$field = array (
							'idJadwal'			=> $lastId,
							'idPegawai'		=> $namaPegawai,
						    'idKendaraan' 	=> $namaKendaraan,
						    'idDriver' 		=> $namaDriver,
						    'tujuan' 			=> $tujuan,
						    'kepentingan'		=> $kepentingan,
						    'tglBerangkat'		=> $tglBerangkat,
						    'lamaWaktu'			=> $lamaWaktu,
						    'statusPerjalanan'	=> 'Terjadwal'
						);

						$this->db->insert('jadwal', $field);

						if($this->db->affected_rows()) {
							$this->session->set_flashdata('info', 'Data berhasil disimpan');
							redirect('jadwal');
						} else {
							$this->session->set_flashdata('info', 'Data gagal disimpan');
							redirect('jadwal');
						}
			} else {
				$id = $this->uri->segment(3);
				$data['add'] = $this->jadwalmodel->GetData($id);
				$data['mobil'] = $this->jadwalmodel->getKendaraan();
				$data['driver'] = $this->jadwalmodel->getDriver();
				$data['pegawai'] = $this->jadwalmodel->getPegawai();
				/*$data['list'] = $this->jadwalmodel->GetJadwal();*/
				$data['content'] = "jadwal/add";
				$this->load->view('template/template', $data);
			}
	}

	public function edit($id)
	{	
		$this->load->library('fungsi');

		if($this->input->post('submit')) 
			{

				$lastId = $this->jadwalmodel->getLastId()+1;

				$idJadwal			= $this->input->post('idJadwal');
				$namaKendaraan 		= $this->input->post('namaKendaraan');
				$namaDriver 		= $this->input->post('namaDriver');
				$tujuan 			= $this->input->post('tujuan');
				$kepentingan 		= $this->input->post('kepentingan');
				$tglBerangkat 		= $this->input->post('tglBerangkat');
				$lamaWaktu			= $this->input->post('lamaWaktu');
				$statusPerjalanan	= $this->input->post('statusPerjalanan');

				/*$id = $this->input->post('id');
				$merk = $this->input->post('merk');
				$merk_seo  = $this->fungsi->seo_title($merk);*/

				$field = array (
				    'namaKendaraan' 	=> $namaKendaraan,
					'namaDriver' 		=> $namaDriver,
					'tujuan' 			=> $tujuan,
					'kepentingan'		=> $kepentingan,
					'tglBerangkat'		=> $tglBerangkat,
					'lamaWaktu'			=> $lamaWaktu,
					'statusPerjalanan'	=> $statusPerjalanan
				);

				$this->db->where('idJadwal', $id);
				$this->db->update('jadwal', $field);

				if($this->db->affected_rows()) {
					$this->session->set_flashdata('info', 'Data berhasil diupdate');
					redirect('jadwal');
				} else {
					$this->session->set_flashdata('info', 'Data gagal diupdate');
					redirect('jadwal');
				}

			} else {
				$data['edit'] = $this->jadwalmodel->GetData($id);
				$data['content'] = "jadwal/edit";
				$this->load->view('template/template', $data);
			}
	}

	public function hapus($id)
	{
		$this->jadwalmodel->delete($id);
		
		if($this->db->affected_rows()) {
			$this->session->set_flashdata('info', 'Data berhasil dihapus');
			redirect('jadwal');
		} else {
			$this->session->set_flashdata('info', 'Data gagal dihapus');
			redirect('jadwal');
		}
	}

}
