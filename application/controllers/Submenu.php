<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_menu', 'm_menu');
		$this->load->model('model_submenu', 'm_submenu');
	}

	public function index()
	{
		$data['judul'] = 'SubMenu Management';
		$data['subjudul'] = 'Data SubMenu Management';

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

		$data['submenu'] = $this->m_submenu->getAllSubMenu();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('submenu/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'SubMenu Management';
		$data['subjudul'] = 'Form Tambah SubMenu Management';

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

		$this->form_validation->set_rules('submenu', 'SubMenu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required|valid_url');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('submenu/formtambah', $data);
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
			redirect('log/submenu');
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
			redirect('log/submenu');
		}
	}

	public function hapus($id)
	{
		$this->m_submenu->hapusDataSubMenu($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('log/submenu');
	}
}
