<?php 

/**
 * 
 */
class Buku extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Buku_model');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$data['buku'] = $this->Buku_model->getAllBuku();
		$data['judul'] = 'Halaman Data Buku Lazaris';
		if( $this->input->post('keyword'))
		{
			$data['buku'] = $this->Buku_model->cariDataBuku();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('buku/index');
		$this->load->view('templates/footer');	
	}

	public function tambah()
	{
		$data['judul'] = 'Tambah Data Buku Lazaris';

		$this->form_validation->set_rules('kodebuku', 'Kode Buku', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
		$this->form_validation->set_rules('no_rak', 'Nomor Rak', 'required');

		if ( $this->form_validation->run() == FALSE ) {
			//belum mau jalan header &footer
			// $this->load->view('templates/header', $data);
			$this->load->view('buku/tambah');
			// $this->load->view('templates/footer');
		}else{
			$this->Buku_model->tambahDataBuku();
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect('buku');
		}
		
	}

	public function hapus($Kode_buku)
	{
		$this->Buku_model->hapusDataBuku($Kode_buku);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('buku');
	}

	public function info($Kode_buku)
	{
		$data['buku'] = $this->Buku_model->getBukuById($Kode_buku);
		// $this->load->view('templates/header', $data);
		$this->load->view('buku/info', $data);
		// $this->load->view('templates/footer');
	}

	public function ubah($Kode_buku)
	{
		$data['buku'] = $this->Buku_model->getBukuById($Kode_buku);

		$this->form_validation->set_rules('kodebuku', 'Kode Buku', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('penulis', 'Penulis', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
		$this->form_validation->set_rules('no_rak', 'Nomor Rak', 'required');

		if ( $this->form_validation->run() == FALSE ) {
			//belum mau jalan header &footer
			// $this->load->view('templates/header', $data);
			$this->load->view('buku/ubah', $data);
			// $this->load->view('templates/footer');
		}else{
			$this->Buku_model->ubahDataBuku();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('buku');
		}
		
	}

	public function print()
	{
		$data['buku'] = $this->Buku_model->getAllBuku();
		$this->load->view('buku/printbuku', $data);
	}

	public function pdf()
	{
		$data['buku'] = $this->Buku_model->getAllBuku();
		$this->load->library('mypdf');
		$this->mypdf->generate('buku/laporanpdf', $data);
	}

	public function excel()
	{
		$data['buku'] = $this->Buku_model->getAllBuku();
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("Admin");
		$object->getProperties()->setLastModifiedBy("Admin");
		$object->getProperties()->setTitle("Daftar Buku ");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'Kode buku');
		$object->getActiveSheet()->setCellValue('C1', 'Judul');
		$object->getActiveSheet()->setCellValue('D1', 'Penulis');
		$object->getActiveSheet()->setCellValue('E1', 'Penerbit');
		$object->getActiveSheet()->setCellValue('F1', 'Tahun');
		$object->getActiveSheet()->setCellValue('G1', 'Nomor rak');

		$baris = 2;
		$no = 1;

		foreach ( $data['buku'] as $buku )
		{
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $buku['Kode_buku']++);
			$object->getActiveSheet()->setCellValue('C'.$baris, $buku['judul']);
			$object->getActiveSheet()->setCellValue('D'.$baris, $buku['penulis']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $buku['penerbit']);
			$object->getActiveSheet()->setCellValue('F'.$baris, $buku['tahun']);
			$object->getActiveSheet()->setCellValue('G'.$baris, $buku['no_rak']);

			$baris++;
		}

		$filename = "Data_buku".'.xlsx';
		$object->getActiveSheet()->setTitle("Data Buku");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename"'.$filename.'"');
		header('Cache-Control: max-age=0');
		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
}