<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RolesModel extends CI_Model {
    public function getData($table)
    {
        return $this->db->get($table);
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
}

?>