<?php

class Model_submenu extends CI_Model
{
    public function getAllSubMenu()
    {
        $this->db->select('*');
        $this->db->from('user_sub_menu');
        $this->db->join('user_menu', 'user_menu.id = user_sub_menu.menu_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSubMenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id_user_sub_menu ' => $id])->row_array();
    }

    public function tambahDataSubMenu($data)
    {
        $this->db->insert('user_sub_menu', $data);
    }

    public function ubahDataSubMenu($data, $id)
    {
        $this->db->where('id_user_sub_menu ', $id);
        $this->db->update('user_sub_menu', $data);
    }

    public function hapusDataSubMenu($id)
    {
        $this->db->where('id_user_sub_menu', $id);
        $this->db->delete('user_sub_menu');
    }
}
