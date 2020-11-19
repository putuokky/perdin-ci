<?php

class Model_roleuser extends CI_Model
{
    public function getAllRoleusers()
    {
        $query = $this->db->get('user_role');
        return $query->result_array();
    }

    public function getAllRoleuser()
    {
        $this->db->where_not_in('id_role', '1');
        $query = $this->db->get('user_role');
        return $query->result_array();
    }

    public function getRoleuserById($id)
    {
        return $this->db->get_where('user_role', ['id_role' => $id])->row_array();
    }

    public function tambahDataRoleuser($data)
    {
        $this->db->insert('user_role', $data);
    }

    public function ubahDataRoleuser($data, $id)
    {
        $this->db->where('id_role', $id);
        $this->db->update('user_role', $data);
    }

    public function hapusDataRoleuser($id)
    {
        $this->db->where('id_role', $id);
        $this->db->delete('user_role');
    }
}
