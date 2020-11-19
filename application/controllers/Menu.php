<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_menu', 'm_menu');
	}

	public function index()
	{
		$data['judul'] = 'Menu Management';
		$data['subjudul'] = 'Data Menu Management';

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

		$data['menu'] = $this->m_menu->getAllMenu();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('menu/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'Menu Management';
		$data['subjudul'] = 'Form Tambah Menu Management';

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

		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$menu = $this->input->post('menu');
			$urutan = $this->input->post('urutan');
			$status = $this->input->post('status');

			$data = [
				'menu' => $menu,
				'is_active_menu' => $status,
				'urutan_user_menu' => $urutan
			];

			$this->m_menu->tambahDataMenu($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('log/menu');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Menu Management';
		$data['subjudul'] = 'Form Ubah Menu Management';

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

		$data['menu'] = $this->m_menu->getMenuById($id);

		$this->form_validation->set_rules('menu', 'Menu', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('menu/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$menu = $this->input->post('menu');
			$urutan = $this->input->post('urutan');
			$status = $this->input->post('status');

			$data = [
				'menu' => $menu,
				'is_active_menu' => $status,
				'urutan_user_menu' => $urutan
			];

			$this->m_menu->ubahDataMenu($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('log/menu');
		}
	}

	public function hapus($id)
	{
		$this->m_menu->hapusDataMenu($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('log/menu');
	}
}
