<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dana extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_dana', 'm_dana');
		$this->load->model('Model_klasijabatan', 'm_klasijabatan');
		$this->load->model('Model_sumberdana', 'm_sumberdana');
		$this->load->model('Model_kategoriperdin', 'm_kategoriperdin');
	}

	public function index()
	{
		$data['judul'] = 'Sumberdana';
		$data['subjudul'] = 'Data Sumberdana';

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

		$data['dana'] = $this->m_dana->getAllDana();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('dana/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Sumberdana';
		$data['subjudul'] = 'Form Tambah Sumberdana';

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

		$data['klasijbtn'] = $this->m_klasijabatan->getAllKlasiJabatan();
		$data['sumberdana'] = $this->m_sumberdana->getAllSumberdana();
		$data['katperdin'] = $this->m_kategoriperdin->getAllKatPerdin();
		$data['thnawal'] = 2018;
		$data['thnskrg'] = date('Y');

		$this->form_validation->set_rules('klasijbtn', 'Klasifikasi Jabatan', 'required');
		$this->form_validation->set_rules('anggaran', 'Tahapan Anggaran', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('katperdin', 'Kategori Perdin', 'required');
		$this->form_validation->set_rules('frmdana', 'Dana', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dana/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$klasijbtn = $this->input->post('klasijbtn');
			$anggaran = $this->input->post('anggaran');
			$tahun = $this->input->post('tahun');
			$katperdin = $this->input->post('katperdin');
			$frmdana = $this->input->post('frmdana');

			$data = [
				'klasifikasi_jabatan' => $klasijbtn,
				'sumberdana' => $anggaran,
				'tahun_anggaran' => $tahun,
				'kategori_perdin' => $katperdin,
				'dana' => $frmdana,
				'debit' => $frmdana
			];

			$this->m_dana->tambahDataDana($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('dana');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Sumberdana';
		$data['subjudul'] = 'Form Ubah Sumberdana';

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

		$data['dana'] = $this->m_dana->getDanaById($id);
		$data['klasijbtn'] = $this->m_klasijabatan->getAllKlasiJabatan();
		$data['sumberdana'] = $this->m_sumberdana->getAllSumberdana();
		$data['katperdin'] = $this->m_kategoriperdin->getAllKatPerdin();
		$data['thnawal'] = 2018;
		$data['thnskrg'] = date('Y');

		$this->form_validation->set_rules('klasijbtn', 'Klasifikasi Jabatan', 'required');
		$this->form_validation->set_rules('anggaran', 'Tahapan Anggaran', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('katperdin', 'Kategori Perdin', 'required');
		$this->form_validation->set_rules('frmdana', 'Dana', 'required|numeric');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('dana/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id'); // tidak perlu ini diubah
			$klasijbtn = $this->input->post('klasijbtn');
			$anggaran = $this->input->post('anggaran');
			$tahun = $this->input->post('tahun');
			$katperdin = $this->input->post('katperdin');
			$frmdana = $this->input->post('frmdana');

			$data = [
				'klasifikasi_jabatan' => $klasijbtn,
				'sumberdana' => $anggaran,
				'tahun_anggaran' => $tahun,
				'kategori_perdin' => $katperdin,
				'dana' => $frmdana
			];

			$this->m_dana->ubahDataDana($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('dana');
		}
	}

	public function hapus($id)
	{
		$this->m_dana->hapusDataDana($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('dana');
	}
}
