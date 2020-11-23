<?php

class Model_inperdin extends CI_Model
{
    public function getAllInperdin()
    {
        $this->db->select('*');
        $this->db->from('input_perdin');
        $this->db->join('ms_klasifikasi_jabatan', 'ms_klasifikasi_jabatan.kode_kj = input_perdin.klasifikasi_jabtan');
        $this->db->join('ms_sumberdana', 'ms_sumberdana.id_sumberdana = input_perdin.tahapan_anggaran');
        $this->db->join('ms_kategori_perdin', 'ms_kategori_perdin.id_kat_perdin = input_perdin.kategori_perjalanan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllInperdinById($id)
    {
        $this->db->select('*');
        $this->db->from('input_perdin');
        $this->db->join('ms_klasifikasi_jabatan', 'ms_klasifikasi_jabatan.kode_kj = input_perdin.klasifikasi_jabtan');
        $this->db->join('ms_sumberdana', 'ms_sumberdana.id_sumberdana = input_perdin.tahapan_anggaran');
        $this->db->join('ms_kategori_perdin', 'ms_kategori_perdin.id_kat_perdin = input_perdin.kategori_perjalanan');
        $this->db->join('ms_maskapai', 'ms_maskapai.id_maskapai = input_perdin.maskapai', 'left');
        $this->db->where('input_perdin.id_perdin', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getInperdinById($id)
    {
        return $this->db->get_where('input_perdin', ['id_perdin' => $id])->row_array();
    }

    public function tambahDataInperdin($data)
    {
        $this->db->insert('input_perdin', $data);
    }

    public function ubahDataInperdin($data, $id)
    {
        $this->db->where('id_perdin ', $id);
        $this->db->update('input_perdin', $data);
    }

    public function hapusDataInperdin($id)
    {
        $this->db->where('id_perdin', $id);
        $this->db->delete('input_perdin');
    }
}
