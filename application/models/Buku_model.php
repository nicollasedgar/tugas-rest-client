<?php  

/**
 * 
 */
class Buku_model extends CI_model
{
	
	public function getAllBuku()
	{
		return $query = $this->db->get('tb_buku')->result_array();
	}

	public function tambahDataBuku()
	{
		$data = [
			"Kode_buku" => $this->input->post('kodebuku', true),
			"judul" => $this->input->post('judul', true),
			"penulis" => $this->input->post('penulis', true),
			"penerbit" => $this->input->post('penerbit', true),
			"tahun" => $this->input->post('tahun', true),
			"no_rak" => $this->input->post('no_rak', true)
		];

		$this->db->insert('tb_buku', $data);
	}

	public function hapusDataBuku($Kode_buku)
	{
		$this->db->where('Kode_buku', $Kode_buku);
		$this->db->delete('tb_buku');
	}

	public function getBukuById($Kode_buku)
	{
		return $this->db->get_where('tb_buku', ['Kode_buku' => $Kode_buku])->row_array();
	}

	public function ubahDataBuku()
	{
		$data = [
			"Kode_buku" => $this->input->post('kodebuku', true),
			"judul" => $this->input->post('judul', true),
			"penulis" => $this->input->post('penulis', true),
			"penerbit" => $this->input->post('penerbit', true),
			"tahun" => $this->input->post('tahun', true),
			"no_rak" => $this->input->post('no_rak', true)
		];

		$this->db->where('Kode_buku', $this->input->post('kode'));
		$this->db->update('tb_buku', $data);
	}

	public function cariDataBuku()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('judul', $keyword);
		return $this->db->get('tb_buku')->result_array();
	}
}