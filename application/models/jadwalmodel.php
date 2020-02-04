<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwalmodel extends CI_Model {

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

	function __construct() {
		parent::__construct();
		$this->load->library('fungsi');
	}

	function getAll($where="") {
       $this->db->select('a.*, b.namaDriver, c.namaKendaraan, e.namaPegawai')
		->join('driver b','b.idDriver = a.idDriver','INNER')
		->join('kendaraan c','c.idKendaraan = a.idKendaraan','INNER')
		->join('pegawai e','e.idPegawai = a.idPegawai','INNER')
		->from('jadwal a')
		->where($where);
		$query = $this->db->get();
		return $query->result();
    }

    function GetData($id) {
    	//return $this->db->where('idmerk', $id)->get('merk')->result_array();
    	return $this->db->get_where('jadwal', array('idJadwal'=> $id))->row();
    }

    function getLastId()
	{
		return $this->db->select('MAX(idJadwal) as id')
		->get('jadwal')
		->row()->id;
	}

	public function getKendaraan()
	{
  		$this->db->from("kendaraan");
		$this->db->order_by("namaKendaraan", "ASC");
		$query = $this->db->get(); 
		return $query->result();
 	}

 	public function getDriver()
 	{
  		$this->db->from("driver");
		$this->db->order_by("namaDriver", "ASC");
		$query = $this->db->get(); 
		return $query->result();
 	}

 	public function getPegawai()
	{
  		$this->db->from("pegawai");
		$query = $this->db->get(); 
		return $query->result();
 	}
	/*public function insert()
	{
		
		$merk = $this->input->post('merk');
		$merk_seo  = $this->fungsi->seo_title($merk);

		$input = array (
		    'namamerk' => $merk,
		    'namamerk_seo'  => $merk_seo
		);

		return $this->db->insert('merk', $input);
	}*/

	public function delete($param) {
		return $this->db->delete('merk', array('idmerk' => $param));
	}

}
