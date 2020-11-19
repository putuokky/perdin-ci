<?php

class Model_config extends CI_Model
{
    public function getAllConfig()
    {
        $query = $this->db->get('config');
        return $query->result_array();
    }

    public function getConfigById($id)
    {
        return $this->db->get_where('config', ['id_config' => $id])->row_array();
    }

    public function getConfig($where = '')
    {
        $this->db->select('*');
        $this->db->from('config');
        $this->db->where('nama_config', $where);

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    public function tambahDataConfig($data)
    {
        $this->db->insert('config', $data);
    }

    public function ubahDataConfig($data, $id)
    {
        $this->db->where('id_config', $id);
        $this->db->update('config', $data);
    }

    public function hapusDataConfig($id)
    {
        $this->db->where('id_config', $id);
        $this->db->delete('config');
    }
}
