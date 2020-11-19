<?php

class Model_menu extends CI_Model
{
    public function getAllMenu()
    {
        $query = $this->db->get('user_menu');
        return $query->result_array();
    }

    public function getAllMenuBy()
    {
        $this->db->order_by('urutan_user_menu', 'ASC');
        $query = $this->db->get('user_menu');
        return $query->result_array();
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function tambahDataMenu($data)
    {
        $this->db->insert('user_menu', $data);
    }

    public function ubahDataMenu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }

    public function hapusDataMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }
}
