<?php

class Model_user extends CI_Model
{
    public function getAllUsers()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id_role = user.role_id');
        $this->db->join('tb_opd', 'tb_opd.idopd = user.opd','left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllUsersByid($opd)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id_role = user.role_id');
        $this->db->join('tb_opd', 'tb_opd.idopd = user.opd','left');
        $this->db->where('user.opd', $opd);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllUserr($role)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id_role = user.role_id');
        $this->db->where_not_in('user.role_id', $role);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllUser($role, $opd = '')
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id_role = user.role_id');
        $this->db->join('tb_opd', 'tb_opd.idopd = user.opd','left');
        $this->db->where('user.opd', $opd);
        $this->db->where_not_in('user.role_id', $role);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getUserByUser($user)
    {
        return $this->db->get_where('user', ['usrname' => $user])->row_array();
    }

    public function getUsersById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function tambahDataUsers($data)
    {
        $this->db->insert('user', $data);
    }

    public function ubahDataUsers($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function hapusDataUsers($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
