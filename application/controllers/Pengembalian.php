<?php 


class Pengembalian extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengembalian_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Halaman Data Petugas Lazaris';
		$data['pengembalian'] = $this->Pengembalian_model->getDataPengembalian();
		$this->load->view('templates/header', $data);
		$this->load->view('pengembalian/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->Pengembalian_model->tambahDataPengembalian();
		redirect('pengembalian');
	}

	public function hapus($Kode_kembali)
	{
		$this->Pengembalian_model->hapusDataPengembalian($Kode_kembali);
		redirect('pengembalian');
	}

	public function ubah($Kode_kembali)
	{
		$data['pengembalian'] = $this->Pengembalian_model->getPengembalianById($Kode_kembali);

		$this->form_validation->set_rules('kodekembali', 'Kode kembali', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('denda', 'Denda', 'required');
		$this->form_validation->set_rules('idpetugas', 'ID petugas', 'required');
		$this->form_validation->set_rules('idanggota', 'Id anggota', 'required');
		$this->form_validation->set_rules('kodebuku', 'Kode buku', 'required');

		if ( $this->form_validation->run() == FALSE ) {
			//belum mau jalan header &footer
			// $this->load->view('templates/header', $data);
			$this->load->view('pengembalian/ubah', $data);
			// $this->load->view('templates/footer');
		}else
		{
			$this->Pengembalian_model->ubahDataPengembalian();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('pengembalian');
		}
	}

	public function print()
	{
		$data['pengembalian'] = $this->Pengembalian_model->getDataPengembalian();
		$this->load->view('pengembalian/printpengembalian', $data);
	}

	public function pdf()
	{
		$data['pengembalian'] = $this->Pengembalian_model->getDataPengembalian();
		$this->load->library('mypdf');
		$this->mypdf->generate('pengembalian/laporanpdf', $data);
	}

	public function excel()
	{
		$data['pengembalian'] = $this->Pengembalian_model->getDataPengembalian();
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("Admin");
		$object->getProperties()->setLastModifiedBy("Admin");
		$object->getProperties()->setTitle("Daftar Pengembalian");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'Kode kembali');
		$object->getActiveSheet()->setCellValue('C1', 'Nama');
		$object->getActiveSheet()->setCellValue('D1', 'Nama buku');
		$object->getActiveSheet()->setCellValue('E1', 'Tanggal kembali');
		$object->getActiveSheet()->setCellValue('F1', 'Denda');

		$baris = 2;
		$no = 1;

		foreach ( $data['pengembalian'] as $pengembalian )
		{
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $pengembalian['Kode_kembali']);
			$object->getActiveSheet()->setCellValue('C'.$baris, $pengembalian['Nama']);
			$object->getActiveSheet()->setCellValue('D'.$baris, $pengembalian['judul']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $pengembalian['tgl_kembali']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $pengembalian['denda']);

			$baris++;
		}

		$filename = "Data_pengembalian".'.xlsx';
		$object->getActiveSheet()->setTitle("Data pengembalian");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename"'.$filename.'"');
		header('Cache-Control: max-age=0');
		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
}
