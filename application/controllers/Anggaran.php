<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_sumberdana', 'm_sumberdana');
	}

	public function index()
	{
		$data['judul'] = 'Tahapan Anggaran';
		$data['subjudul'] = 'Data Tahapan Anggaran';

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

		$data['sumber'] = $this->m_sumberdana->getAllSumberdana();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('anggaran/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Tahapan Anggaran';
		$data['subjudul'] = 'Form Tambah Tahapan Anggaran';

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

		$this->form_validation->set_rules('namasumberdn', 'Nama Tahapan Anggaran', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('anggaran/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$namasumberdn = $this->input->post('namasumberdn');

			$data = [
				'nama_sumberdana' => $namasumberdn
			];

			$this->m_sumberdana->tambahDataSumberdana($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('anggaran');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Tahapan Anggaran';
		$data['subjudul'] = 'Form Ubah Tahapan Anggaran';

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

		$data['sumberdna'] = $this->m_sumberdana->getSumberdanaById($id);

		$this->form_validation->set_rules('namasumberdn', 'Nama Sumberdana', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('anggaran/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$namasumberdn = $this->input->post('namasumberdn');

			$data = [
				'nama_sumberdana' => $namasumberdn
			];

			$this->m_sumberdana->ubahDataSumberdana($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('sumberdana');
		}
	}

	public function hapus($id)
	{
		$this->m_sumberdana->hapusDataSumberdana($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('sumberdana');
	}
}
