<?php defined('BASEPATH') or exit('No direct script access allowed');

class Purchase_Model extends CI_Model
{

	public $table = 'purchase';

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

	public function getPurchaseId($id)
	{
		$this->db->select(
			'purchase.id,
			purchase.product,
			purchase.quantity,
			purchase.comments,
			purchase.price,
			collaborator.name as collaborator,
			status_purchase.id as status'
		);
		$this->db->from($this->table);
		$this->db->where('purchase.id', $id);
		$this->db->join('collaborator', 'collaborator.id = purchase.id');
		$this->db->join('status_purchase', 'status_purchase.id = purchase.id');
		$query = $this->db->get();

		return $query->row();
	}

	public function getPurchase()
	{
		$this->db->select(
			'purchase.id,
			purchase.date,
			purchase.quantity,
			product.name as product,
			collaborator.name as collaborator,
			status_purchase.id as status'
		);
		$this->db->from($this->table);
		$this->db->join('product', 'product.id = purchase.id');
		$this->db->join('collaborator', 'collaborator.id = purchase.id');
		$this->db->join('status_purchase', 'status_purchase.id = purchase.id');
		$this->db->order_by('purchase.id', 'DESC');
		$query = $this->db->get();

		return $query->result();
	}

	public function createPurchase()
	{
		$this->db->trans_start();

		$data = array(
			'product'		=> $this->input->post('product'),
			'comments'		=> $this->input->post('comments'),
			'price'			=> $this->input->post('price'),
			'quantity'		=> $this->input->post('quantity'),
			'collaborator'	=> $this->input->post('collaborator'),
			'status'		=> $this->input->post('status')
		);

		$this->db->insert('purchase', $data);

		$this->db->where('id', $this->db->insert_id());
		$this->db->set('collaborator', $this->db->insert_id());
		$this->db->update('purchase');

		$this->db->trans_complete();
	}

	public function updatePurchase($id)
	{

		$this->db->trans_start();

		$data = array(
			'product'		=> $this->input->post('product'),
			'comments'		=> $this->input->post('comments'),
			'price'			=> $this->input->post('price'),
			'quantity'		=> $this->input->post('quantity'),
			'collaborator'	=> $this->input->post('collaborator'),
			'status'		=> $this->input->post('status')
		);

		$this->db->where('id', $id);
		$this->db->update('purchase', $data);

		$this->db->trans_complete();
	}

	public function deletePurchase($id)
	{
		if ($this->db->field_exists('id', $this->table)) {
			$this->db->where('id', $id);
			$this->db->delete($this->table);
		}
	}
}
