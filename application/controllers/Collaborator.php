<?php defined('BASEPATH') or exit('No direct script access allowed');

class Collaborator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Collaborator_Model');
		$this->load->library('pagination');
	}

	public function index()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1'
		) {
			$this->load->view('collaborator');
		} else {
			redirect('login');
		}
	}

	public function getCollaborators()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1'
		) {
			$collaborators = $this->Collaborator_Model->getAll();
			echo json_encode($collaborators);
		} else {
			redirect('login');
		}
	}

	public function getCollaboratorId($id)
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			$this->session->userdata('logged')->role == '1'
		) {
			$collaborator = $this->Collaborator_Model->getCollaboratorId($id);
			echo json_encode($collaborator);
		} else {
			redirect('login');
		}
	}

	public function create()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			$this->session->userdata('logged')->role == '1'
		) {
			$this->load->view('collaborator_create');
		} else {
			redirect('login');
		}
	}

	public function createCollaborator()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			$this->session->userdata('logged')->role == '1'
		) {
			$this->Collaborator_Model->createCollaborator();
			redirect('collaborator');
		} else {
			redirect('login');
		}
	}

	public function edit()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			$this->session->userdata('logged')->role == '1'
		) {
			$this->load->view('collaborator_edit');
		} else {
			redirect('login');
		}
	}

	public function updateCollaborator($id)
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			$this->session->userdata('logged')->role == '1'
		) {
			$this->Collaborator_Model->updateCollaborator($id);
			redirect('collaborator');
		} else {
			redirect('login');
		}
	}
}
