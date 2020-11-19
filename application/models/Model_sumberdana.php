<?php

class Model_sumberdana extends CI_Model
{
    public function getAllSumberdana()
    {
        $query = $this->db->get('ms_sumberdana');
        return $query->result_array();
    }

    public function getSumberdanaById($id)
    {
        return $this->db->get_where('ms_sumberdana', ['id_sumberdana' => $id])->row_array();
    }

    public function tambahDataSumberdana($data)
    {
        $this->db->insert('ms_sumberdana', $data);
    }

    public function ubahDataSumberdana($data, $id)
    {
        $this->db->where('id_sumberdana', $id);
        $this->db->update('ms_sumberdana', $data);
    }

    public function hapusDataSumberdana($id)
    {
        $this->db->where('id_sumberdana', $id);
        $this->db->delete('ms_sumberdana');
    }
}
