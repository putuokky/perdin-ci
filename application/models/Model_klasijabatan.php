<?php

class Model_klasijabatan extends CI_Model
{
    public function getAllKlasiJabatan()
    {
        $this->db->select('*');
        $this->db->from('ms_klasifikasi_jabatan');
        $this->db->join('tb_opd', 'tb_opd.idopd = ms_klasifikasi_jabatan.opd_klasijabat','left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllKlasiJabatans($where)
    {
        $this->db->select('*');
        $this->db->from('ms_klasifikasi_jabatan');
        $this->db->join('tb_opd', 'tb_opd.idopd = ms_klasifikasi_jabatan.opd_klasijabat');
        $this->db->where('ms_klasifikasi_jabatan.opd_klasijabat',$where);
        $query = $this->db->get();
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
