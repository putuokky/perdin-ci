<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporperdin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_inperdin', 'm_inperdin');
		$this->load->model('model_dana', 'm_dana');
		$this->load->model('model_sumberdana', 'm_sumberdana');
		$this->load->model('model_klasijabatan', 'm_klasijabatan');
		$this->load->model('model_kategoriperdin', 'm_kategoriperdin');
	}

	public function index()
	{
		$data['judul'] = 'Laporan Perdin';
		$data['subjudul'] = 'Data Laporan Perdin';
		$data['filjudul'] = 'Filter Laporan Perdin';

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

		// untuk select form
		$data['thnawal'] = 2018;
		$data['thnskrg'] = date('Y');
		$data['sumber'] = $this->m_sumberdana->getAllSumberdana();
		$data['klajbt'] = $this->m_klasijabatan->getAllKlasiJabatan();
		$data['katper'] = $this->m_kategoriperdin->getAllKatPerdin();


		$tahun = $this->input->post('tahun');
		$thpanggaran = $this->input->post('thpanggaran');
		$klsjabatan = $this->input->post('klsjabatan');
		$katperdin = $this->input->post('katperdin');

		$keywords = [
			'tahun' => $tahun,
			'thpanggaran' => $thpanggaran,
			'klsjabatan' => $klsjabatan,
			'katperdin' => $katperdin
		];

		if ($keywords) {
			$data['lapdin'] = $this->m_inperdin->cari($keywords);
		} else {

			// untuk konten tabel
			if ($this->session->userdata('role_id') == 1) {
				$data['lapdin'] = $this->m_inperdin->getAllInperdin();
			} else if ($this->session->userdata('role_id') == 2) {
				$data['lapdin'] = $this->m_inperdin->getAllInperdina('1', '');
			} else if ($this->session->userdata('role_id') == 3) {
				$data['lapdin'] = $this->m_inperdin->getAllInperdinaa(array('1', '2'), $this->session->userdata('nama_bagian'));
			} else {
				$data['lapdin'] = $this->m_inperdin->getAllInperdinaa(array('1', '2', '3'), $this->session->userdata('nama_bagian'));
			}
		}



		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan-perdin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function search()
	{
		$data['judul'] = 'Laporan Perdin';
		$data['subjudul'] = 'Data Laporan Perdin';
		$data['filjudul'] = 'Filter Laporan Perdin';

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

		$tahun = $this->input->post('tahun');
		$thpanggaran = $this->input->post('thpanggaran');
		$klsjabatan = $this->input->post('klsjabatan');
		$katperdin = $this->input->post('katperdin');

		$keywords = [
			'tahun' => $tahun,
			'thpanggaran' => $thpanggaran,
			'klsjabatan' => $klsjabatan,
			'katperdin' => $katperdin
		];

		$data['perdin'] = $this->m_inperdin->cari($keywords);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan-perdin/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
