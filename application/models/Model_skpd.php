<?php

class Model_skpd extends CI_Model
{
    public function getAllSkpd()
    {
        $query = $this->db->get('tb_opd');
        return $query->result_array();
    }

    public function getSkpdById($id)
    {
        return $this->db->get_where('tb_opd', ['idopd' => $id])->row_array();
    }

    public function tambahDataSkpd($data)
    {
        $this->db->insert('tb_opd', $data);
    }

    public function ubahDataSkpd($data, $id)
    {
        $this->db->where('idopd', $id);
        $this->db->update('tb_opd', $data);
    }

    public function hapusDataSkpd($id)
    {
        $this->db->where('idopd', $id);
        $this->db->delete('tb_opd');
    }
}
