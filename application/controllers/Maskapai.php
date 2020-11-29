<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maskapai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_maskapai', 'm_maskapai');
	}

	public function index()
	{
		$data['judul'] = 'Maskapai';
		$data['subjudul'] = 'Data Maskapai';

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

		$data['mask'] = $this->m_maskapai->getAllMaskapai();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('maskpai/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Maskapai';
		$data['subjudul'] = 'Form Tambah Maskapai';

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

		$this->form_validation->set_rules('namamaskapai', 'Nama Maskapai', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('maskpai/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$namamaskapai = $this->input->post('namamaskapai');

			$data = [
				'nama_maskapai' => $namamaskapai
			];

			$this->m_maskapai->tambahDataMaskapai($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('maskapai');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Maskapai';
		$data['subjudul'] = 'Form Ubah Maskapai';

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

		$data['mask'] = $this->m_maskapai->getMaskapaiById($id);

		$this->form_validation->set_rules('namamaskapai', 'Nama Maskapai', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('maskpai/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$namamaskapai = $this->input->post('namamaskapai');

			$data = [
				'nama_maskapai' => $namamaskapai
			];

			$this->m_maskapai->ubahDataMaskapai($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('maskapai');
		}
	}

	public function hapus($id)
	{
		$this->m_maskapai->hapusDataMaskapai($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('maskapai');
	}
}
