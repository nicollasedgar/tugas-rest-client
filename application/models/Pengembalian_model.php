<?php 


class Pengembalian_model extends CI_model
{
	public function getDataPengembalian()
	{
		$this->db->select("tb_pengembalian.Kode_kembali, tb_anggota.Nama,
			tb_buku.judul, tb_pengembalian.tgl_kembali, tb_pengembalian.denda");
		$this->db->join('tb_anggota', 'tb_pengembalian.ID_anggota = tb_anggota.ID_anggota');
		$this->db->join('tb_buku', 'tb_pengembalian.Kode_buku = tb_buku.Kode_buku');
		return $query = $this->db->get('tb_pengembalian')->result_array();
	}

	public function tambahDataPengembalian()
	{
		$data =[
			"Kode_kembali" => $this->input->post('kodekembali', true),
			"tgl_kembali" => $this->input->post('tanggal', true),
			"denda" => $this->input->post('denda', true),
			"ID_petugas" => $this->input->post('idpetugas', true),
			"ID_anggota" => $this->input->post('idanggota', true),
			"Kode_buku" => $this->input->post('kodebuku', true)
		];

		$this->db->insert('tb_pengembalian', $data);
	}

	public function getPengembalianById($Kode_kembali)
	{
		return $this->db->get_where('tb_pengembalian', ['Kode_kembali' => $Kode_kembali])->row_array();
	}

	public function hapusDataPengembalian($Kode_kembali)
	{
		$this->db->where('Kode_kembali', $Kode_kembali);
		$this->db->delete('tb_pengembalian');
	}

	public function ubahDataPengembalian()
	{
		$data = [
			"Kode_kembali" => $this->input->post('kodekembali', true),
			"tgl_kembali" => $this->input->post('tanggal', true),
			"denda" => $this->input->post('denda', true),
			"ID_petugas" => $this->input->post('idpetugas', true),
			"ID_anggota" => $this->input->post('idanggota', true),
			"Kode_buku" => $this->input->post('kodebuku', true)
		];

		$this->db->where('Kode_kembali', $this->input->post('kode'));
		$this->db->update('tb_pengembalian', $data);
	}

}