<?php 


class Peminjaman_model extends CI_model
{
	public function getDataPeminjaman()
	{
		$this->db->select("tb_peminjaman.Kode_pinjam, tb_anggota.Nama,
			tb_buku.judul, tb_peminjaman.tgl_pinjam");
		$this->db->join('tb_anggota', 'tb_peminjaman.ID_anggota = tb_anggota.ID_anggota');
		$this->db->join('tb_buku', 'tb_peminjaman.Kode_buku = tb_buku.Kode_buku');
		return $query = $this->db->get('tb_peminjaman')->result_array();
	}

	public function tambahDataPeminjaman()
	{
		$data =[
			"Kode_pinjam" => $this->input->post('kodepinjam', true),
			"tgl_pinjam" => $this->input->post('tanggal', true),
			"ID_petugas" => $this->input->post('idpetugas', true),
			"ID_anggota" => $this->input->post('idanggota', true),
			"Kode_buku" => $this->input->post('kodebuku', true)
		];

		$this->db->insert('tb_peminjaman', $data);
	}

	public function getPeminjamanById($Kode_pinjam)
	{
		return $this->db->get_where('tb_peminjaman', ['Kode_pinjam' => $Kode_pinjam])->row_array();
	}

	public function hapusDataPeminjaman($Kode_pinjam)
	{
		$this->db->where('Kode_pinjam', $Kode_pinjam);
		$this->db->delete('tb_peminjaman');
	}

	public function ubahDataPeminjaman()
	{
		$data = [
			"Kode_pinjam" => $this->input->post('kodepinjam', true),
			"tgl_pinjam" => $this->input->post('tanggal', true),
			"ID_petugas" => $this->input->post('idpetugas', true),
			"ID_anggota" => $this->input->post('idanggota', true),
			"Kode_buku" => $this->input->post('kodebuku', true)
		];

		$this->db->where('Kode_pinjam', $this->input->post('kode'));
		$this->db->update('tb_peminjaman', $data);
	}

}