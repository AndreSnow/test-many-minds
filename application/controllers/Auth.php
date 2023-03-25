<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Collaborator_Model');
    }

    public function index()
    {
        if (!$this->session->userdata('logged')) {
            $this->load->view('login');
        } else {
            redirect('product');
        }
    }

    public function validate()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Senha', 'required|min_length[8]');

        if ($this->form_validation->run() == FALSE) {
            redirect('auth');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $collaborator = $this->Collaborator_Model->getCollaborator($email, $password);

            if ($collaborator) {
                $this->session->set_userdata('logged', $collaborator);
                $collaborator = $this->Collaborator_Model->getCollaboratorId($collaborator->id);
                match ($collaborator->role) {
                    '1' => redirect('collaborator'),
                    '2' => redirect('purchase'),
                    '3' => redirect('product'),
                    default => redirect('auth')
                };
            } else {
                return redirect('/login');
            }
        }
    }

    public function logout()
    {
        if (!$this->session->userdata('logged')) {
            redirect('auth');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
}
