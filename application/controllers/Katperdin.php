<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katperdin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_kategoriperdin', 'm_kategoriperdin');
	}

	public function index()
	{
		$data['judul'] = 'Kategori Perdin';
		$data['subjudul'] = 'Data Kategori Perdin';

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

		$data['katper'] = $this->m_kategoriperdin->getAllKatPerdin();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('katperdin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Kategori Perdin';
		$data['subjudul'] = 'Form Tambah Kategori Perdin';

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

		$this->form_validation->set_rules('namakatperdin', 'Nama Kategori Perdin', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('katperdin/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$namakatperdin = $this->input->post('namakatperdin');

			$data = [
				'nama_kat_perdin' => $namakatperdin
			];

			$this->m_kategoriperdin->tambahDataKatPerdin($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('katperdin');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Kategori Perdin';
		$data['subjudul'] = 'Form Ubah Kategori Perdin';

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

		$data['katper'] = $this->m_kategoriperdin->getKatPerdinById($id);

		$this->form_validation->set_rules('namakatperdin', 'Nama Kategori Perdin', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('katperdin/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$namakatperdin = $this->input->post('namakatperdin');

			$data = [
				'nama_kat_perdin' => $namakatperdin
			];

			$this->m_kategoriperdin->ubahDataKatPerdin($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('katperdin');
		}
	}

	public function hapus($id)
	{
		$this->m_kategoriperdin->hapusDataKatPerdin($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('katperdin');
	}
}
