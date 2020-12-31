<?php 


class Petugas_model extends CI_model
{
	public function getAllPetugas()
	{
		return $query = $this->db->get('tb_petugas')->result_array();
	}

	public function tambahDataPetugas()
	{
		$data = [
			"ID_petugas" => $this->input->post('id_petugas', true),
			"Nama" => $this->input->post('nama', true),
			"Alamat" => $this->input->post('alamat', true),
			"JK" => $this->input->post('jk', true),
			"Kontak" => $this->input->post('kontak', true)
		];

		$this->db->insert('tb_petugas', $data);
	}

	public function getPetugasById($ID_petugas)
	{
		return $this->db->get_where('tb_petugas', ['ID_petugas' => $ID_petugas])->row_array();
	}

	public function hapusDataPetugas($ID_petugas)
	{
		$this->db->where('ID_petugas', $ID_petugas);
		$this->db->delete('tb_petugas');
	}

	public function ubahDataPetugas()
	{
		$data = [
			"ID_petugas" => $this->input->post('id_petugas', true),
			"Nama" => $this->input->post('nama', true),
			"Alamat" => $this->input->post('alamat', true),
			"JK" => $this->input->post('jk', true),
			"Kontak" => $this->input->post('kontak', true)
		];

		$this->db->where('ID_petugas', $this->input->post('kode'));
		$this->db->update('tb_petugas', $data);
	}

	public function cariDataPetugas()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('Nama', $keyword);
		return $this->db->get('tb_petugas')->result_array();
	}
}