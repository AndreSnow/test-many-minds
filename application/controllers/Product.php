<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_Model');
	}

	public function index()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1'
		) {
			$this->load->view('product');
		} else {
			redirect('login');
		}
	}

	public function create()
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1'
		) {
			$this->load->view('product_create');
		} else {
			redirect('login');
		}
	}

	public function createProduct()
	{
		$this->Product_Model->createProduct();
		redirect('product');
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
			$this->load->view('product_edit');
		} else {
			redirect('login');
		}
	}

	public function updateProduct($id)
	{
		if (
			$this->session->userdata('logged') &&
			$this->session->userdata('logged')->status == '1' &&
			($this->session->userdata('logged')->role == '1' ||
				$this->session->userdata('logged')->role == '2'
			)
		) {
			$this->Product_Model->updateProduct($id);
			redirect('product');
		} else {
			redirect('login');
		}
	}
}
