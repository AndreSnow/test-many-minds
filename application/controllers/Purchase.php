<?php defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Purchase_Model');
		$this->load->library('pagination');
	}

	public function index()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			($this->session->userdata('logged')->role == '1' ||
				$this->session->userdata('logged')->role == '2'
			)
		) {
			$this->load->view('purchase');
		} else {
			redirect('login');
		}
	}

	public function create()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			($this->session->userdata('logged')->role == '1' ||
				$this->session->userdata('logged')->role == '2'
			)
		) {
			$this->load->view('purchase_create');
		} else {
			redirect('login');
		}
	}

	public function createPurchase()
	{
		$this->Purchase_Model->createPurchase();
		redirect('purchase');
	}

	public function edit()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			($this->session->userdata('logged')->role == '1' ||
				$this->session->userdata('logged')->role == '2'
			)
		) {
			$this->load->view('purchase_edit');
		} else {
			redirect('login');
		}
	}

	public function updatePurchase($id)
	{
		$this->Purchase_Model->updatePurchase($id);
		redirect('purchase');
	}

	public function deletePurchase($id)
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			$this->session->userdata('logged')->role == '1'
		) {
			$this->Purchase_Model->deletePurchase($id);
			redirect('purchase');
		} else {
			redirect('login');
		}
	}
}
