<?php

class Model_klasijabatan extends CI_Model
{
    public function getAllKlasiJabatan()
    {
        $query = $this->db->get('ms_klasifikasi_jabatan');
        return $query->result_array();
    }

    public function getKlasiJabatanById($id)
    {
        return $this->db->get_where('ms_klasifikasi_jabatan', ['kode_kj' => $id])->row_array();
    }

    public function tambahDataKlasiJabatan($data)
    {
        $this->db->insert('ms_klasifikasi_jabatan', $data);
    }

    public function ubahDataKlasiJabatan($data, $id)
    {
        $this->db->where('kode_kj', $id);
        $this->db->update('ms_klasifikasi_jabatan', $data);
    }

    public function hapusDataKlasiJabatan($id)
    {
        $this->db->where('kode_kj', $id);
        $this->db->delete('ms_klasifikasi_jabatan');
    }
}
