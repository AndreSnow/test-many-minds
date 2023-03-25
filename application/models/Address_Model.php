<?php defined('BASEPATH') or exit('No direct script access allowed');

class Address_Model extends CI_Model
{

    protected $table = 'address';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();

        return $query->result();
    }
}
