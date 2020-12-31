<?php  


class petugas extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Petugas_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['petugas'] = $this->Petugas_model->getAllPetugas();
		if( $this->input->post('keyword'))
		{
			$data['petugas'] = $this->Petugas_model->cariDataPetugas();
		}
		$data['judul'] = 'Halaman Data Petugas Lazaris';
		$this->load->view('templates/header', $data);
		$this->load->view('petugas/index');
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$this->Petugas_model->tambahDataPetugas();
		redirect('petugas');
	}

	public function hapus($ID_petugas)
	{
		$this->Petugas_model->hapusDataPetugas($ID_petugas);
		redirect('petugas');
	}

	public function ubah($ID_petugas)
	{
		$data['petugas'] = $this->Petugas_model->getPetugasById($ID_petugas);

		$this->form_validation->set_rules('id_petugas', 'id petugas', 'required');
		$this->form_validation->set_rules('nama', 'judul', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('jk', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('kontak', 'Kontak', 'required');

		if ( $this->form_validation->run() == FALSE ) {
			//belum mau jalan header &footer
			// $this->load->view('templates/header', $data);
			$this->load->view('petugas/ubah', $data);
			// $this->load->view('templates/footer');
		}else{
			$this->Petugas_model->ubahDataPetugas();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('petugas');
		}
	}

	public function print()
	{
		$data['petugas'] = $this->Petugas_model->getAllPetugas();
		$this->load->view('petugas/printpetugas', $data);
	}

	public function pdf()
	{
		$data['petugas'] = $this->Petugas_model->getAllPetugas();
		$this->load->library('mypdf');
		$this->mypdf->generate('petugas/laporanpdf', $data);
	}

	public function excel()
	{
		$data['petugas'] = $this->Petugas_model->getAllPetugas();
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$object = new PHPExcel();
		$object->getProperties()->setCreator("Admin");
		$object->getProperties()->setLastModifiedBy("Admin");
		$object->getProperties()->setTitle("Daftar Petugas");

		$object->setActiveSheetIndex(0);

		$object->getActiveSheet()->setCellValue('A1', 'NO');
		$object->getActiveSheet()->setCellValue('B1', 'ID Petugas');
		$object->getActiveSheet()->setCellValue('C1', 'Nama');
		$object->getActiveSheet()->setCellValue('D1', 'Alamat');
		$object->getActiveSheet()->setCellValue('E1', 'Jenis kelamin');
		$object->getActiveSheet()->setCellValue('F1', 'Kontak');

		$baris = 2;
		$no = 1;

		foreach ( $data['petugas'] as $petugas )
		{
			$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
			$object->getActiveSheet()->setCellValue('B'.$baris, $petugas['ID_petugas']++);
			$object->getActiveSheet()->setCellValue('C'.$baris, $petugas['Nama']);
			$object->getActiveSheet()->setCellValue('D'.$baris, $petugas['Alamat']);
			$object->getActiveSheet()->setCellValue('E'.$baris, $petugas['JK']);
			$object->getActiveSheet()->setCellValue('F'.$baris, $petugas['Kontak']);

			$baris++;
		}

		$filename = "Data_petugas".'.xlsx';
		$object->getActiveSheet()->setTitle("Data petugas");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename"'.$filename.'"');
		header('Cache-Control: max-age=0');
		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
}