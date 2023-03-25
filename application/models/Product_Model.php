<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_Model extends CI_Model
{
	public $table = 'product';

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

	public function getProductId($id)
	{
		$this->db->select(
			'product.id,
			product.name,
			product.price,
			product.description,
			product.quantity,
			product.brand,
			collaborator.name as collaborator, 
			status_product.id as status'
		);
		$this->db->from($this->table);
		$this->db->where('product.id', $id);
		$this->db->join('collaborator', 'collaborator.id = product.id');
		$this->db->join('status_product', 'status_product.id = product.id');
		$query = $this->db->get();

		return $query->row();
	}

	public function createProduct()
	{
		$this->db->trans_start();

		$data = array(
			'name'		 => $this->input->post('name'),
			'price' 	 => $this->input->post('price'),
			'description' => $this->input->post('description'),
			'quantity' 	 => $this->input->post('quantity'),
			'brand' 	 => $this->input->post('brand'),
			'status' 	 => $this->input->post('status')
		);

		$this->db->insert('product', $data);

		$this->db->where('id', $this->db->insert_id());
		$this->db->set('collaborator', $this->db->insert_id());
		$this->db->update('product');

		$this->db->trans_complete();
	}

	public function updateProduct($id)
	{
		$this->db->trans_start();

		$data = array(
			'name'		  => $this->input->post('name'),
			'price' 	  => $this->input->post('price'),
			'description' => $this->input->post('description'),
			'quantity' 	  => $this->input->post('quantity'),
			'brand' 	  => $this->input->post('brand'),
			'status' 	  => $this->input->post('status')
		);

		$this->db->where('id', $id);
		$this->db->update('product', $data);

		$this->db->trans_complete();
	}
}
