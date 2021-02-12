<?php

class Model_dana extends CI_Model
{
    public function getAllDana()
    {
        $this->db->select('*');
        $this->db->from('ms_dana');
        $this->db->join('ms_klasifikasi_jabatan', 'ms_klasifikasi_jabatan.kode_kj = ms_dana.klasifikasi_jabatan');
        $this->db->join('ms_sumberdana', 'ms_sumberdana.id_sumberdana = ms_dana.sumberdana');
        $this->db->join('ms_kategori_perdin', 'ms_kategori_perdin.id_kat_perdin = ms_dana.kategori_perdin');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllDanas($where)
    {
        $this->db->select('*');
        $this->db->from('ms_dana');
        $this->db->join('ms_klasifikasi_jabatan', 'ms_klasifikasi_jabatan.kode_kj = ms_dana.klasifikasi_jabatan');
        $this->db->join('ms_sumberdana', 'ms_sumberdana.id_sumberdana = ms_dana.sumberdana');
        $this->db->join('ms_kategori_perdin', 'ms_kategori_perdin.id_kat_perdin = ms_dana.kategori_perdin');
        $this->db->where('ms_klasifikasi_jabatan.opd_klasijabat', $where);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDanaById($id)
    {
        return $this->db->get_where('ms_dana', ['id_dana' => $id])->row_array();
    }

    public function tambahDataDana($data)
    {
        $this->db->insert('ms_dana', $data);
    }

    public function ubahDataDana($data, $id)
    {
        $this->db->where('id_dana', $id);
        $this->db->update('ms_dana', $data);
    }

    public function hapusDataDana($id)
    {
        $this->db->where('id_dana', $id);
        $this->db->delete('ms_dana');
    }
}
