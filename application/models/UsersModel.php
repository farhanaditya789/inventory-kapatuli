<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model {
    // CRUD
    public function getData($table, $roles_id_array = null)
    {
        $this->db->select('users.*, roles.name AS role_name');
        $this->db->from($table);
        $this->db->join('roles', 'users.roles_id = roles.id');

        if ($roles_id_array != null) {
            $this->db->where_in('roles_id', $roles_id_array);
        }

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function createData($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function updateData($data, $table)
    {
        $this->db->where('id', $data['id']);
        $this->db->update($table, $data);
    }

    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    // CRUD


    // OTHER FUNCTION FOR TABLE USERS
    public function getUserByEmail($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function getUserWhere($where = null) {
        return $this->db->get_where('users', $where);
    }

    public function getUserRoleByName($username) {
        $this->db->select('roles.role_name');
        $this->db->from('users');
        $this->db->join('roles', 'users.role_id = roles.id');
        $this->db->where('users.username', $username);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->role_name;
        } else {
            return null;
        }
    }
}

?>