<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skpd extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_skpd', 'm_skpd');
	}

	public function index()
	{
		$data['judul'] = 'Instansi Pemerintahan';
		$data['subjudul'] = 'Data Instansi Pemerintahan';

		// untuk session login wajib isi
		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);
		// end untuk session login wajib isi

		// konten default pada template wajib isi
		$data_config = $this->m_config->getConfig('brand');
		$data['brand'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_header');
		$data['main_header'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('version');
		$data['version'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('nama_pengembang');
		$data['nama_pengembang'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('link_pengembang');
		$data['link_pengembang'] = $data_config->config_value;
		// end konten default pada template wajib isi

		$data['opd'] = $this->m_skpd->getAllSkpd();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('opd/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Instansi Pemerintahan';
		$data['subjudul'] = 'Form Tambah Instansi Pemerintahan';

		// untuk session login wajib isi
		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);
		// end untuk session login wajib isi

		// konten default pada template wajib isi
		$data_config = $this->m_config->getConfig('brand');
		$data['brand'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_header');
		$data['main_header'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('version');
		$data['version'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('nama_pengembang');
		$data['nama_pengembang'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('link_pengembang');
		$data['link_pengembang'] = $data_config->config_value;
		// end konten default pada template wajib isi

		$this->form_validation->set_rules('namaopd', 'Nama Instansi', 'required');
		// $this->form_validation->set_rules('namapendekopd', 'Nama Pendek Instansi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('opd/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$namaopd = $this->input->post('namaopd');
			$namapendekopd = $this->input->post('namapendekopd');

			$data = [
				'namaopd' => $namaopd,
				'nama_pendek_opd' => $namapendekopd
			];

			$this->m_skpd->tambahDataSkpd($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('skpd');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Instansi Pemerintahan';
		$data['subjudul'] = 'Form Ubah Instansi Pemerintahan';

		// untuk session login wajib isi
		$user = $this->session->userdata('usrname');
		$data['userlogin'] = $this->m_user->getUserByUser($user);
		// end untuk session login wajib isi

		// konten default pada template wajib isi
		$data_config = $this->m_config->getConfig('brand');
		$data['brand'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_header');
		$data['main_header'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('version');
		$data['version'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('nama_pengembang');
		$data['nama_pengembang'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('link_pengembang');
		$data['link_pengembang'] = $data_config->config_value;
		// end konten default pada template wajib isi

		$data['opd'] = $this->m_skpd->getSkpdById($id);

		$this->form_validation->set_rules('namaopd', 'Nama Instansi', 'required');
		// $this->form_validation->set_rules('namapendekopd', 'Nama Pendek Instansi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('opd/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$namaopd = $this->input->post('namaopd');
			$namapendekopd = $this->input->post('namapendekopd');

			$data = [
				'namaopd' => $namaopd,
				'nama_pendek_opd' => $namapendekopd
			];

			$this->m_skpd->ubahDataSkpd($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('skpd');
		}
	}

	public function hapus($id)
	{
		$this->m_skpd->hapusDataSkpd($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('skpd');
	}
}
