<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inperdin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_inperdin', 'm_inperdin');
		$this->load->model('Model_klasijabatan', 'm_klasijabatan');
		$this->load->model('Model_sumberdana', 'm_sumberdana');
		$this->load->model('Model_kategoriperdin', 'm_kategoriperdin');
		$this->load->model('Model_maskapai', 'm_maskapai');
	}

	public function index()
	{
		$data['judul'] = 'Perjalanan Dinas';
		$data['subjudul'] = 'Data Perjalanan Dinas';

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

		$data['iptperdin'] = $this->m_inperdin->getAllInperdin();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('inputperdin/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Perjalanan Dinas';
		$data['subjudul'] = 'Form Tambah Perjalanan Dinas';

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
		$data['maskp'] = $this->m_maskapai->getAllMaskapai();
		$data['thnawal'] = 2015;
		$data['thnskrg'] = date('Y');

		$this->form_validation->set_rules('nospd', 'NO SP2D', 'required');
		$this->form_validation->set_rules('namaacara', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
		$this->form_validation->set_rules('tglbrngkat', 'Tanggal Berangkat', 'required');
		$this->form_validation->set_rules('tglselesai', 'Tanggal Selesai', 'required');
		$this->form_validation->set_rules('lama', 'Lama (Hari)', 'required');
		$this->form_validation->set_rules('nosrttgs', 'No Surat Tugas', 'required');
		$this->form_validation->set_rules('namapersonil', 'Nama Personil', 'required');
		$this->form_validation->set_rules('rute', 'Rute', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
		$this->form_validation->set_rules('notiket', 'No Tiket', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('uangharian', 'Uang Harian', 'required');
		$this->form_validation->set_rules('uangtransport', 'Uang Transport', 'required');
		$this->form_validation->set_rules('penginapan', 'Penginapan', 'required');
		$this->form_validation->set_rules('uangrepre', 'Uang Representatif', 'required');
		$this->form_validation->set_rules('lainlain', 'Lain - Lain', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('inputperdin/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$menu = $this->input->post('menu');
			$submenu = $this->input->post('submenu');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$urutan = $this->input->post('urutan');
			$status = $this->input->post('status');

			$data = [
				'menu_id' => $menu,
				'submenu' => $submenu,
				'url' => $url,
				'icon' => $icon,
				'is_active' => $status,
				'urutan_user_sub_menu' => $urutan
			];

			$this->m_submenu->tambahDataSubMenu($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('submenu');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'SubMenu Management';
		$data['subjudul'] = 'Form Ubah SubMenu Management';

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

		$data['submenu'] = $this->m_submenu->getSubMenuById($id);
		$data['menu'] = $this->m_menu->getAllMenu();

		$this->form_validation->set_rules('submenu', 'SubMenu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('submenu/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id'); // tidak perlu ini diubah
			$menu = $this->input->post('menu');
			$submenu = $this->input->post('submenu');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$urutan = $this->input->post('urutan');
			$status = $this->input->post('status');

			$data = [
				'menu_id' => $menu,
				'submenu' => $submenu,
				'url' => $url,
				'icon' => $icon,
				'is_active' => $status,
				'urutan_user_sub_menu' => $urutan
			];

			$this->m_submenu->ubahDataSubMenu($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('submenu');
		}
	}

	public function hapus($id)
	{
		$this->m_submenu->hapusDataSubMenu($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('submenu');
	}
}
