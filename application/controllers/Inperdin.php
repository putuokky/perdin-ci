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
		$this->load->model('model_dana', 'm_dana');
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

		if ($this->session->userdata('role_id') == 1) {
			$data['iptperdin'] = $this->m_inperdin->getAllInperdin();
		} else if ($this->session->userdata('role_id') == 2) {
			$data['iptperdin'] = $this->m_inperdin->getAllInperdina('1');
		} else if ($this->session->userdata('role_id') == 3) {
			$data['iptperdin'] = $this->m_inperdin->getAllInperdinaa(array('1', '2'), $this->session->userdata('opd'));
		} else {
			$data['iptperdin'] = $this->m_inperdin->getAllInperdinaa(array('1', '2', '3'), $this->session->userdata('opd'));
		}

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

		if ($this->session->userdata('opd')) {
			$data['sumberdana'] = $this->m_dana->getAllDanas($this->session->userdata('opd'));
		} else {
			$data['sumberdana'] = $this->m_dana->getAllDana();
		}
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
		// $this->form_validation->set_rules('rute', 'Rute', 'required');
		// $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
		// $this->form_validation->set_rules('notiket', 'No Tiket', 'required');
		// $this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('uangharian', 'Uang Harian', 'required');
		// $this->form_validation->set_rules('uangtransport', 'Uang Transport', 'required');
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
			$sumberdana = $this->input->post('sumberdana');
			$nospd = $this->input->post('nospd');
			$namaacara = $this->input->post('namaacara');
			$tujuan = $this->input->post('tujuan');
			$tglbrngkat = date('Y-m-d', strtotime($this->input->post('tglbrngkat')));
			$tglselesai = date('Y-m-d', strtotime($this->input->post('tglselesai')));
			$lama = $this->input->post('lama');
			$nosrttgs = $this->input->post('nosrttgs');
			$namapersonil = $this->input->post('namapersonil');
			$maskap = $this->input->post('maskap');
			$rute = $this->input->post('rute');
			$tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
			$notiket = $this->input->post('notiket');
			$harga = $this->input->post('harga');
			$uangharian = $this->input->post('uangharian');
			$uangtransport = $this->input->post('uangtransport');
			$penginapan = $this->input->post('penginapan');
			$uangrepre = $this->input->post('uangrepre');
			$lainlain = $this->input->post('lainlain');
			$jumlah = $harga + $uangharian + $uangtransport + $penginapan + $uangrepre + $lainlain;
			$username = $user;

			$dn = $this->m_dana->getDanaById($sumberdana);

			if ($jumlah <= $dn['debit']) {
				// ubah data debit di tabel dana
				$hasil_pengurangan = $dn['debit'] - $jumlah;
				$d_dn = [
					'debit' => $hasil_pengurangan
				];
				$u_dn = $this->m_dana->ubahDataDana($d_dn, $sumberdana);

				$data = [
					'id_dana' => $sumberdana,
					'no_sp2d' => $nospd,
					'nama_kegiatan' => $namaacara,
					'tujuan' => $tujuan,
					'tgl_berangkat' => $tglbrngkat,
					'tgl_selesai' => $tglselesai,
					'lama' => $lama,
					'no_surat_tgs' => $nosrttgs,
					'nama_personil' => $namapersonil,
					'maskapai' => $maskap,
					'rute' => $rute,
					'tnggal' => $tgl,
					'no_tiket' => $notiket,
					'harga' => $harga,
					'uang_harian' => $uangharian,
					'uang_transport' => $uangtransport,
					'penginapan' => $penginapan,
					'uang_representatif' => $uangrepre,
					'lain_lain' => $lainlain,
					'jumlah' => $jumlah,
					'debit_perdin' => $dn['debit'],
					'userid' => $username
				];

				$this->m_inperdin->tambahDataInperdin($data);
				$this->session->set_flashdata('message', 'Ditambah');
			} else {
				$this->session->set_flashdata('message', 'Ditambah');
				redirect('inperdin');
			}
		}
	}

	public function ubah($id)
	{
		$data['judul'] = 'Perjalanan Dinas';
		$data['subjudul'] = 'Form Ubah Perjalanan Dinas';

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

		$data['perdin'] = $this->m_inperdin->getInperdinById($id);
		$data['maskp'] = $this->m_maskapai->getAllMaskapai();
		$data['sumberdana'] = $this->m_dana->getAllDana();
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
		// $this->form_validation->set_rules('rute', 'Rute', 'required');
		// $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
		// $this->form_validation->set_rules('notiket', 'No Tiket', 'required');
		// $this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('uangharian', 'Uang Harian', 'required');
		// $this->form_validation->set_rules('uangtransport', 'Uang Transport', 'required');
		$this->form_validation->set_rules('penginapan', 'Penginapan', 'required');
		$this->form_validation->set_rules('uangrepre', 'Uang Representatif', 'required');
		$this->form_validation->set_rules('lainlain', 'Lain - Lain', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('inputperdin/formubah', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$id = $this->input->post('id'); // tidak perlu ini diubah
			$nospd = $this->input->post('nospd');
			$namaacara = $this->input->post('namaacara');
			$tujuan = $this->input->post('tujuan');
			$tglbrngkat = date('Y-m-d', strtotime($this->input->post('tglbrngkat')));
			$tglselesai = date('Y-m-d', strtotime($this->input->post('tglselesai')));
			$lama = $this->input->post('lama');
			$nosrttgs = $this->input->post('nosrttgs');
			$namapersonil = $this->input->post('namapersonil');
			$maskap = $this->input->post('maskap');
			$rute = $this->input->post('rute');
			$tgl = date('Y-m-d', strtotime($this->input->post('tgl')));
			$notiket = $this->input->post('notiket');
			$harga = $this->input->post('harga');
			$uangharian = $this->input->post('uangharian');
			$uangtransport = $this->input->post('uangtransport');
			$penginapan = $this->input->post('penginapan');
			$uangrepre = $this->input->post('uangrepre');
			$lainlain = $this->input->post('lainlain');
			$jumlah = $harga + $uangharian + $uangtransport + $penginapan + $uangrepre + $lainlain;

			$data = [
				'no_sp2d' => $nospd,
				'nama_kegiatan' => $namaacara,
				'tujuan' => $tujuan,
				'tgl_berangkat' => $tglbrngkat,
				'tgl_selesai' => $tglselesai,
				'lama' => $lama,
				'no_surat_tgs' => $nosrttgs,
				'nama_personil' => $namapersonil,
				'maskapai' => $maskap,
				'rute' => $rute,
				'tnggal' => $tgl,
				'no_tiket' => $notiket,
				'harga' => $harga,
				'uang_harian' => $uangharian,
				'uang_transport' => $uangtransport,
				'penginapan' => $penginapan,
				'uang_representatif' => $uangrepre,
				'lain_lain' => $lainlain,
				'jumlah' => $jumlah
			];

			$this->m_inperdin->ubahDataInperdin($data, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('inperdin');
		}
	}

	public function detail($id)
	{
		$data['judul'] = 'Perjalanan Dinas';
		$data['subjudul'] = 'Form Detail Perjalanan Dinas';

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

		$data['perdin'] = $this->m_inperdin->getAllInperdinById($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('inputperdin/tbldetail', $data);
		$this->load->view('templates/footer', $data);
	}

	public function hapus($id)
	{
		$this->m_inperdin->hapusDataInperdin($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('inperdin');
	}
}
