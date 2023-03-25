<?php defined('BASEPATH') or exit('No direct script access allowed');

class Collaborator_Model extends CI_Model
{

	protected $table = 'collaborator';
	protected $table_address = 'address';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('validate_cpf');
	}

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('address', 'address.id = collaborator.id');

		$query = $this->db->get();

		return $query->result();
	}

	public function getCollaboratorId($id)
	{
		$this->db->select(
			'collaborator.id,
			collaborator.name,
			collaborator.last_name,
			collaborator.cpf,
			collaborator.email,
			collaborator.date_birth,
			collaborator.phone,
			collaborator.status,
			collaborator.password,
			collaborator.role,
			address.postal_code,
			address.country,
			address.uf,
			address.city,
			address.street,
			address.number'
		);
		$this->db->from($this->table);
		$this->db->where('collaborator.id', $id);
		$this->db->join('address', 'address.id = collaborator.id');
		$query = $this->db->get();

		return $query->row();
	}


	public function getCollaborator($email, $password)
	{
		$query = $this->db->get_where('collaborator', array('email' => $email, 'password' => $password));
		return $query->row();
	}

	public function createCollaborator()
	{
		if (validate_cpf($this->input->post('cpf'))) {

			$this->db->trans_start();

			$password = $this->input->post('password');
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			$data = array(
				'name'		 => $this->input->post('name'),
				'last_name'  => $this->input->post('last_name'),
				'cpf' 		 => $this->input->post('cpf'),
				'phone' 	 => $this->input->post('phone'),
				'email' 	 => $this->input->post('email'),
				'date_birth' => $this->input->post('date_birth'),
				'password' 	 => $hashed_password,
				'role' 		 => $this->input->post('role'),
				'status' 	 => $this->input->post('status'),
			);

			$this->db->insert('collaborator', $data);

			$collaborator_id = $this->db->insert_id();

			$data = array(
				'id' 	  => $collaborator_id,
				'postal_code' => $this->input->post('postal_code'),
				'country' => $this->input->post('country'),
				'uf' 	  => $this->input->post('uf'),
				'city' 	  => $this->input->post('city'),
				'street'  => $this->input->post('street'),
				'number'  => $this->input->post('number')
			);

			$this->db->insert('address', $data);

			$address_id = $this->db->insert_id();

			$this->db->where('id', $address_id);
			$this->db->update('collaborator', array('address' => $collaborator_id));

			$this->db->trans_complete();
		} else {
			$this->session->set_flashdata('error', 'CPF inválido');
			redirect('collaborator/create');
		}
	}

	public function updateCollaborator($collaborator_id)
	{
		if (validate_cpf($this->input->post('cpf'))) {

			$this->db->trans_start();

			$password = $this->input->post('password');
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			$data = array(
				'name'		 => $this->input->post('name'),
				'last_name'  => $this->input->post('last_name'),
				'cpf' 		 => $this->input->post('cpf'),
				'phone' 	 => $this->input->post('phone'),
				'email' 	 => $this->input->post('email'),
				'date_birth' => $this->input->post('date_birth'),
				'password' 	 => $hashed_password,
				'role' 		 => $this->input->post('role'),
				'status' 	 => $this->input->post('status'),
			);

			$this->db->where('id', $collaborator_id);
			$this->db->update('collaborator', $data);

			$data = array(
				'postal_code' => $this->input->post('postal_code'),
				'country' => $this->input->post('country'),
				'uf' 	  => $this->input->post('uf'),
				'city' 	  => $this->input->post('city'),
				'street'  => $this->input->post('street'),
				'number'  => $this->input->post('number')
			);

			$this->db->where('id', $collaborator_id);
			$this->db->update('address', $data);

			$this->db->trans_complete();
		} else {
			$this->session->set_flashdata('error', 'CPF inválido');
			redirect('collaborator/edit/' . $collaborator_id);
		}
	}
}
