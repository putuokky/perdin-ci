<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasijabatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_klasijabatan', 'm_klasijabatan');
		$this->load->model('model_skpd', 'm_skpd');
	}

	public function index()
	{
		$data['judul'] = 'Klasifikasi Jabatan';
		$data['subjudul'] = 'Data Klasifikasi Jabatan';

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

		if ($this->session->userdata('opd')) {
			$data['klajbt'] = $this->m_klasijabatan->getAllKlasiJabatans($this->session->userdata('opd'));
		} else {
			$data['klajbt'] = $this->m_klasijabatan->getAllKlasiJabatan();
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('klajabatan/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Klasifikasi Jabatan';
		$data['subjudul'] = 'Form Tambah Klasifikasi Jabatan';

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
		
		if ($this->session->userdata('opd')) {
			$data['opd'] = $this->m_skpd->getAllSkpdByid($this->session->userdata('opd'));
		} else {
			$data['opd'] = $this->m_skpd->getAllSkpd();
		}

		$this->form_validation->set_rules('klajbatan', 'Klasifikasi Jabatan', 'required');
		$this->form_validation->set_rules('kdjabtan', 'Kode Jabatan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('klajabatan/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$kdjabtan = $this->input->post('kdjabtan');
			$klajbatan = $this->input->post('klajbatan');
			$instansi = $this->input->post('instansi');

			$data = [
				'kode_kj' => $kdjabtan,
				'jabatan' => $klajbatan,
				'opd_klasijabat' => $instansi
			];

			$this->m_klasijabatan->tambahDataKlasiJabatan($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('klasijabatan');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Klasifikasi Jabatan';
		$data['subjudul'] = 'Form Ubah Klasifikasi Jabatan';

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

		$data['kljbt'] = $this->m_klasijabatan->getKlasiJabatanById($id);
		if ($this->session->userdata('opd')) {
			$data['opd'] = $this->m_skpd->getAllSkpdByid($this->session->userdata('opd'));
		} else {
			$data['opd'] = $this->m_skpd->getAllSkpd();
		}

		$this->form_validation->set_rules('klajbatan', 'Klasifikasi Jabatan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('klajabatan/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$klajbatan = $this->input->post('klajbatan');
			$instansi = $this->input->post('instansi');

			$data = [
				'jabatan' => $klajbatan,
				'opd_klasijabat' => $instansi
			];

			$this->m_klasijabatan->ubahDataKlasiJabatan($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('klasijabatan');
		}
	}

	public function hapus($id)
	{
		$this->m_klasijabatan->hapusDataKlasiJabatan($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('klasijabatan');
	}
}
