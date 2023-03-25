<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
    protected $table = 'collaborator';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($data)
    {
        $this->db->select('email, password');
        $this->db->from($this->table);
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row();
            $data = array(
                'email' => $row->email,
                'password' => $row->password,
                'logged_in' => true
            );
            $this->session->set_userdata($data);
            return true;
        } else {
            return false;
        }
    }
}
