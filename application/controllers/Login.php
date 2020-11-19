<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user', 'm_user');
		$this->load->model('model_config', 'm_config');
	}

	public function index()
	{
		$data['judul'] = 'Login';

		// konten default pada template wajib isi
		$data_config = $this->m_config->getConfig('brand');
		$data['brand'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('main_header');
		$data['main_header'] = $data_config->config_value;

		$data_config = $this->m_config->getConfig('version');
		$data['version'] = $data_config->config_value;
		// end konten default pada template wajib isi

		$this->form_validation->set_rules('usr', 'Username', 'required');
		$this->form_validation->set_rules('passw', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('login/index', $data);
		} else {
			$this->loginsukses();
		}
	}

	private function loginsukses()
	{
		$usr = $this->input->post('usr');
		$passw = $this->input->post('passw');

		$userlogin = $this->m_user->getUserByUser($usr);

		if ($userlogin) {
			if ($userlogin['is_active'] == 1) {
				if (password_verify($passw, $userlogin['password'])) {
					$data = [
						'usrname' => $userlogin['usrname'],
						'role_id' => $userlogin['role_id']
					];

					$this->session->set_userdata($data);

					if ($userlogin['role_id']) {
						redirect('log/dashboard');
					}
				} else {
					$this->session->set_flashdata('message', 'Wrong password!');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', 'This username has not been activated!');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', 'Username is not registered!');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', 'You have been logged out!');
		redirect('login');
	}
}
