<?php

class User_model extends CI_Model {
    public function get_user_by_username($username)
    {
        $query = $this->db->get_where('users', ['user' => $username]);

        return $query->row();
    }
}