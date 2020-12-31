<?php  


class Anggota extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Anggota_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['anggota'] = $this->Anggota_model->getAllAnggota();
		if( $this->input->post('keyword'))
		{
			$data['anggota'] = $this->Anggota_model->cariDataAnggota();
		}
		$data['judul'] = 'Halaman Data Anggota Lazaris';
		$this->load->view('templates/header', $data);
		$this->load->view('anggota/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->Anggota_model->tambahDataAnggota();
		redirect('anggota');
	}

	public function hapus($ID_anggota)
	{
		$this->Anggota_model->hapusDataAnggota($ID_anggota);
		redirect('anggota');
	}

	public function ubah($ID_anggota)
	{
		$data['anggota'] = $this->Anggota_model->getAnggotaById($ID_anggota);

		$this->form_validation->set_rules('id_anggota', 'id anggota', 'required');
		$this->form_validation->set_rules('nama', 'judul', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('jk', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('kontak', 'Kontak', 'required');

		if ( $this->form_validation->run() == FALSE ) {
			//belum mau jalan header &footer
			// $this->load->view('templates/header', $data);
			$this->load->view('anggota/ubah', $data);
			// $this->load->view('templates/footer');
		}else{
			$this->Anggota_model->ubahDataAnggota();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('anggota');
		}
	}

	public function print()
	{
		$data['anggota'] = $this->Anggota_model->getAllAnggota();
		$this->load->view('anggota/printanggota', $data);
	}

	public function pdf()
	{
		$data['anggota'] = $this->Anggota_model->getAllAnggota();
		$this->load->library('mypdf');
		$this->mypdf->generate('anggota/laporanpdf', $data);
	}

	public function excel()
	{
		$data['anggota'] = $this->Anggota_model->getAllAnggota();
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("Admin");
		$object->getProperties()->setLastModifiedBy("Admin");
		$object->getProperties()->setTitle("Daftar Anggota");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'ID anggota');
		$object->getActiveSheet()->setCellValue('C1', 'Nama');
		$object->getActiveSheet()->setCellValue('D1', 'Alamat');
		$object->getActiveSheet()->setCellValue('E1', 'Jenis kelamin');
		$object->getActiveSheet()->setCellValue('F1', 'Kontak');

		$baris = 2;
		$no = 1;

		foreach ( $data['anggota'] as $anggota )
		{
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $anggota['ID_anggota']++);
			$object->getActiveSheet()->setCellValue('C'.$baris, $anggota['Nama']);
			$object->getActiveSheet()->setCellValue('D'.$baris, $anggota['Alamat']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $anggota['JK']);
			$object->getActiveSheet()->setCellValue('F'.$baris, $anggota['Kontak']);

			$baris++;
		}

		$filename = "Data_anggota".'.xlsx';
		$object->getActiveSheet()->setTitle("Data anggota");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename"'.$filename.'"');
		header('Cache-Control: max-age=0');
		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
}