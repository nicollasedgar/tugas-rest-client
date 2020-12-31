<?php 
/**
 * 
 */
class Peminjaman extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peminjaman_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Data Petugas Lazaris';
		$data['peminjaman'] = $this->Peminjaman_model->getDataPeminjaman();
		$this->load->view('templates/header', $data);
		$this->load->view('peminjaman/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->Peminjaman_model->tambahDataPeminjaman();
		redirect('peminjaman');
	}

	public function hapus($Kode_pinjam)
	{
		$this->Peminjaman_model->hapusDataPeminjaman($Kode_pinjam);
		redirect('peminjaman');
	}

	public function ubah($Kode_pinjam)
	{
		$data['peminjaman'] = $this->Peminjaman_model->getPeminjamanById($Kode_pinjam);

		$this->form_validation->set_rules('kodepinjam', 'Kode pinjam', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('idpetugas', 'ID petugas', 'required');
		$this->form_validation->set_rules('idanggota', 'Id anggota', 'required');
		$this->form_validation->set_rules('kodebuku', 'Kode buku', 'required');

		if ( $this->form_validation->run() == FALSE ) {
			//belum mau jalan header &footer
			// $this->load->view('templates/header', $data);
			$this->load->view('peminjaman/ubah', $data);
			// $this->load->view('templates/footer');
		}else
		{
			$this->Peminjaman_model->ubahDataPeminjaman();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('peminjaman');
		}
	}

	public function print()
	{
		$data['peminjaman'] = $this->Peminjaman_model->getDataPeminjaman();
		$this->load->view('peminjaman/printpeminjaman', $data);
	}

	public function pdf()
	{
		$data['peminjaman'] = $this->Peminjaman_model->getDataPeminjaman();
		$this->load->library('mypdf');
		$this->mypdf->generate('peminjaman/laporanpdf', $data);
	}

	public function excel()
	{
		$data['peminjaman'] = $this->Peminjaman_model->getDataPeminjaman();
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("Admin");
		$object->getProperties()->setLastModifiedBy("Admin");
		$object->getProperties()->setTitle("Daftar Peminjaman");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'Kode pinjam');
		$object->getActiveSheet()->setCellValue('C1', 'Nama');
		$object->getActiveSheet()->setCellValue('D1', 'Nama buku');
		$object->getActiveSheet()->setCellValue('E1', 'Tanggal pinjam');
		$object->getActiveSheet()->setCellValue('F1', 'Kontak');

		$baris = 2;
		$no = 1;

		foreach ( $data['peminjaman'] as $peminjaman )
		{
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $peminjaman['Kode_pinjam']);
			$object->getActiveSheet()->setCellValue('C'.$baris, $peminjaman['Nama']);
			$object->getActiveSheet()->setCellValue('D'.$baris, $peminjaman['judul']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $peminjaman['tgl_pinjam']);

			$baris++;
		}

		$filename = "Data_peminjaman".'.xlsx';
		$object->getActiveSheet()->setTitle("Data peminjaman");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename"'.$filename.'"');
		header('Cache-Control: max-age=0');
		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
}