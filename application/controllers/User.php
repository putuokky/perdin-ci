<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
		$this->load->model('model_roleuser', 'm_roleuser');
		$this->load->model('model_skpd', 'm_skpd');
	}

	public function index()
	{
		$data['judul'] = 'User';
		$data['subjudul'] = 'Data User';

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

		if ($this->session->userdata('role_id') == 1) {
			$data['users'] = $this->m_user->getAllUsers();
		} else if ($this->session->userdata('role_id') == 2) {
			$data['users'] = $this->m_user->getAllUserr(array('1', '2'));
		} else if ($this->session->userdata('role_id') == 3) {
			$data['users'] = $this->m_user->getAllUser(array('1', '2', '3'), $this->session->userdata('opd'));
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function tambah()
	{
		$data['judul'] = 'User';
		$data['subjudul'] = 'Form Tambah User';

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

		if ($this->session->userdata('role_id') == 1) {
			$data['role'] = $this->m_roleuser->getAllRoleusers();
		} else if ($this->session->userdata('role_id') == 2) {
			$data['role'] = $this->m_roleuser->getAllRoleuser(array('1', '2'));
		} else if ($this->session->userdata('role_id') == 3) {
			$data['role'] = $this->m_roleuser->getAllRoleuser(array('1', '2', '3'));
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('user', 'Username', 'required');
		$this->form_validation->set_rules('passwrd', 'Password', 'required');
		// $this->form_validation->set_rules('instansi', 'Instansi Pemerintah', 'required');
		$this->form_validation->set_rules('roleusr', 'Role User', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('users/formtambah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$nama = $this->input->post('nama');
			$user = $this->input->post('user');
			$passwrd = password_hash($this->input->post('passwrd'), PASSWORD_DEFAULT);
			$instansi = $this->input->post('instansi');
			$roleusr = $this->input->post('roleusr');
			$status = $this->input->post('status');

			$data = [
				'name' => $nama,
				'usrname' => $user,
				'password' => $passwrd,
				'opd' => $instansi,
				'role_id' => $roleusr,
				'is_active' => $status,
				'date_user' => time()
			];

			$this->m_user->tambahDataUsers($data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('user');
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'User';
		$data['subjudul'] = 'Form Ubah User';

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

		$data['user'] = $this->m_user->getUsersById($id);
		if ($this->session->userdata('opd')) {
			$data['opd'] = $this->m_skpd->getAllSkpdByid($this->session->userdata('opd'));
		} else {
			$data['opd'] = $this->m_skpd->getAllSkpd();
		}

		if ($this->session->userdata('role_id') == 1) {
			$data['role'] = $this->m_roleuser->getAllRoleusers();
		} else if ($this->session->userdata('role_id') == 2) {
			$data['role'] = $this->m_roleuser->getAllRoleuser(array('1', '2'));
		} else if ($this->session->userdata('role_id') == 3) {
			$data['role'] = $this->m_roleuser->getAllRoleuser(array('1', '2', '3'));
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('roleusr', 'Role User', 'required');
		// $this->form_validation->set_rules('instansi', 'Instansi Pemerintah', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('users/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id');  // tidak perlu ini diubah
			$nama = $this->input->post('nama');
			$instansi = $this->input->post('instansi');
			$roleusr = $this->input->post('roleusr');
			$status = $this->input->post('status');

			$data = [
				'name' => $nama,
				'opd' => $instansi,
				'role_id' => $roleusr,
				'is_active' => $status,
				'date_user' => time()
			];

			$this->m_user->ubahDataUsers($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('user');
		}
	}

	public function changepassw($id)
	{
		$data['judul'] = 'User';
		$data['subjudul'] = 'Form Ganti Password User';

		$data['user'] = $this->m_user->getUsersById($id);
		if ($this->session->userdata('role_id') == 1) {
			$data['role'] = $this->m_roleuser->getAllRoleusers();
		} else {
			$data['role'] = $this->m_roleuser->getAllRoleuser();
		}

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

		$this->form_validation->set_rules('gantipassw', 'Ganti Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('users/form_gantipassw', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$passwrd = password_hash($this->input->post('gantipassw'), PASSWORD_DEFAULT);

			$data = [
				'password' => $passwrd
			];

			$this->m_user->ubahDataUsers($data, $id);
			$this->session->set_flashdata('message', 'Password Diubah');
			redirect('user');
		}
	}

	public function hapus($id)
	{
		$this->m_user->hapusDataUsers($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('user');
	}
}
