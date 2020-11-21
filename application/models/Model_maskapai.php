<?php

class Model_maskapai extends CI_Model
{
    public function getAllMaskapai()
    {
        $query = $this->db->get('ms_maskapai');
        return $query->result_array();
    }

    public function getMaskapaiById($id)
    {
        return $this->db->get_where('ms_maskapai', ['id_maskapai' => $id])->row_array();
    }

    public function tambahDataMaskapai($data)
    {
        $this->db->insert('ms_maskapai', $data);
    }

    public function ubahDataMaskapai($data, $id)
    {
        $this->db->where('id_maskapai', $id);
        $this->db->update('ms_maskapai', $data);
    }

    public function hapusDataMaskapai($id)
    {
        $this->db->where('id_maskapai', $id);
        $this->db->delete('ms_maskapai');
    }
}
