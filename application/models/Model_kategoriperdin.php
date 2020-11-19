<?php

class Model_kategoriperdin extends CI_Model
{
    public function getAllKatPerdin()
    {
        $query = $this->db->get('ms_kategori_perdin');
        return $query->result_array();
    }

    public function getKatPerdinById($id)
    {
        return $this->db->get_where('ms_kategori_perdin', ['id_kat_perdin' => $id])->row_array();
    }

    public function tambahDataKatPerdin($data)
    {
        $this->db->insert('ms_kategori_perdin', $data);
    }

    public function ubahDataKatPerdin($data, $id)
    {
        $this->db->where('id_kat_perdin', $id);
        $this->db->update('ms_kategori_perdin', $data);
    }

    public function hapusDataKatPerdin($id)
    {
        $this->db->where('id_kat_perdin', $id);
        $this->db->delete('ms_kategori_perdin');
    }
}
