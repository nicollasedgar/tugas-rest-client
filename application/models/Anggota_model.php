<?php 


class Anggota_model extends CI_model
{
	public function getAllAnggota()
	{
		return $query = $this->db->get('tb_anggota')->result_array();
	}

	public function tambahDataAnggota()
	{
		$data = [
			"ID_anggota" => $this->input->post('id_anggota', true),
			"Nama" => $this->input->post('nama', true),
			"Alamat" => $this->input->post('alamat', true),
			"JK" => $this->input->post('jk', true),
			"Kontak" => $this->input->post('kontak', true)
		];

		$this->db->insert('tb_anggota', $data);
	}

	public function getAnggotaById($ID_anggota)
	{
		return $this->db->get_where('tb_anggota', ['ID_anggota' => $ID_anggota])->row_array();
	}

	public function hapusDataAnggota($ID_anggota)
	{
		$this->db->where('ID_anggota', $ID_anggota);
		$this->db->delete('tb_anggota');
	}

	public function ubahDataAnggota()
	{
		$data = [
			"ID_anggota" => $this->input->post('id_anggota', true),
			"Nama" => $this->input->post('nama', true),
			"Alamat" => $this->input->post('alamat', true),
			"JK" => $this->input->post('jk', true),
			"Kontak" => $this->input->post('kontak', true)
		];

		$this->db->where('ID_anggota', $this->input->post('kode'));
		$this->db->update('tb_anggota', $data);
	}

	public function cariDataAnggota()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->like('Nama', $keyword);
		return $this->db->get('tb_anggota')->result_array();
	}
}