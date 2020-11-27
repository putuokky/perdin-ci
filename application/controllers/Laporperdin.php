<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporperdin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_laporanperdin', 'm_laporanperdin');
		$this->load->model('model_inperdin', 'm_inperdin');
		$this->load->model('model_dana', 'm_dana');
	}

	public function index()
	{
		$data['judul'] = 'Laporan Perdin';
		$data['subjudul'] = 'Data Laporan Perdin';

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

		$data['lapdin'] = $this->m_laporanperdin->getAllLaporanPerdin();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan-perdin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Laporan Perdin';
		$data['subjudul'] = 'Form Tambah Laporan Perdin';

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

		$data['perdin'] = $this->m_inperdin->getAllInperdin();
		$data['dana'] = $this->m_dana->getAllDana();

		$this->form_validation->set_rules('kelasjbtn', 'Kelas Jabatan', 'required');
		$this->form_validation->set_rules('dana', 'Dana', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('laporan-perdin/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$kelasjbtn = $this->input->post('kelasjbtn');
			$dana = $this->input->post('dana');

			$data = [
				'id_perdin' => $kelasjbtn,
				'id_dana' => $dana
			];

			$this->m_laporanperdin->tambahDataLaporanPerdin($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('laporperdin');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Laporan Perdin';
		$data['subjudul'] = 'Form Ubah Laporan Perdin';

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

		$data['lapdin'] = $this->m_laporanperdin->getLaporanPerdinById($id);
		$data['perdin'] = $this->m_inperdin->getAllInperdin();
		$data['dana'] = $this->m_dana->getAllDana();

		$this->form_validation->set_rules('kelasjbtn', 'Kelas Jabatan', 'required');
		$this->form_validation->set_rules('dana', 'Dana', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('laporan-perdin/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$kelasjbtn = $this->input->post('kelasjbtn');
			$dana = $this->input->post('dana');
			$perdinjumlah = $dana - $this->input->post('perdinjumlah');

			$data = [
				'id_perdin' => $kelasjbtn,
				'id_dana' => $dana,
				'sisa' => $perdinjumlah
			];

			$this->m_laporanperdin->ubahDataLaporanPerdin($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('laporperdin');
		}
	}

	public function hapus($id)
	{
		$this->m_laporanperdin->hapusDataLaporanPerdin($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('laporperdin');
	}
}
