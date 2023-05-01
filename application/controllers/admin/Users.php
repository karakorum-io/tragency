<?php
defined('BASEPATH') or exit('No direct script access allowed');
require(__DIR__.'/../ExpeditionSaga.php');
class Users extends ExpeditionSaga
{
    public $controllerUrl;
    public $isAdminLogin;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('session');

        $this->load->helper('general');

        $this->load->model('admin/user');
        $this->load->model('admin/booking');
        $this->load->model('admin/query');
        $this->load->model('admin/blog');
        $this->load->model('admin/experience');
        $this->load->model('admin/destination');
        $this->load->model('admin/lead');
        $this->load->model('admin/package');

        $this->controllerUrl = base_url() . "admin/users";

        $this->isAdminLogin = $this->session->userdata('isAdminLogin');
    }

    public function index()
    {
        $this->checkAdminAccess();
        $users = $this->user->getAll();
        $this->load->view('admin/users/list', [
            'users' => $users
        ]);
    }

    public function login()
    {
        $this->checkLoginAccess();
        // when form is posted
        if (!empty($this->input->post())) {

            // process login
            if (trim($this->input->post('username')) && trim($this->input->post('password'))) {
                $user = $this->user->getUserByCreds($this->input->post('username'), $this->input->post('password'));

                if (count($user) == 1) {
                    $this->session->set_userdata('isAdminLogin', TRUE);
                    $this->session->set_userdata('userInfo', $user[0]);
                    $this->session->set_flashdata('success', 'Logged In!');
                    redirect($this->controllerUrl."/dashboard");
                } else {
                    $this->session->set_flashdata('error', 'Invalid Credentials!');
                }
            }
        }

        $this->load->view('admin/users/login', []);
    }

    public function logout()
    {
        $this->session->unset_userdata('isAdminLogin');
        $this->session->unset_userdata('userInfo');
        $this->session->sess_destroy();

        redirect($this->controllerUrl . "/login");
    }

    public function dashboard()
    {
        $this->checkAdminAccess();
        $this->load->view('admin/users/dashboard', [
            'leads' => $this->lead->getAllCount()->records,
            'packages' => $this->package->getAllCount()->records,
            'destinations' => $this->destination->getAllCount()->records,
            'experiences' => $this->experience->getAllCount()->records,
            'posts' => $this->blog->getAllCount()->records,
            'enquiries' => $this->query->getAllCount()->records,
        ]);
    }

    public function add()
    {
        $this->checkAdminAccess();
        // when form is posted
        if (!empty($this->input->post())) {

            $id = $this->user->create([
                'name' => trim($this->input->post('name')),
                'password' => md5(trim($this->input->post('password'))),
                'email' => trim($this->input->post('email')),
                'phone' => trim($this->input->post('phone')),
                'address' => trim($this->input->post('address')),
                'city' => trim($this->input->post('city')),
                'state' => trim($this->input->post('state')),
                'country' => trim($this->input->post('country')),
                'type' => User::TYPE,
                'status' => User::STATUS_INACTIVE
            ]);

            if ($id) {
                $this->session->set_flashdata('success', 'User added!');
                redirect($this->controllerUrl);
            }
        }

        $this->load->view('admin/users/add', [
            'countries' => getCountries($this->db)
        ]);
    }

    public function edit($id = NULL)
    {
        $this->checkAdminAccess();
        if (!empty($this->input->post()) && $id != NULL) {
            $this->user->update($id, [
                'name' => trim($this->input->post('name')),
                'email' => trim($this->input->post('email')),
                'phone' => trim($this->input->post('phone')),
                'address' => trim($this->input->post('address')),
                'city' => trim($this->input->post('city')),
                'state' => trim($this->input->post('state')),
                'country' => trim($this->input->post('country'))
            ]);

            $this->session->set_flashdata('success', 'User Information updated!');
            redirect($this->agent->referrer());
        }

        $user = $this->user->getById($id);
        $this->load->view('admin/users/edit', [
            'countries' => getCountries($this->db),
            'user' => $user
        ]);
    }

    public function activate_deactivate($id, $status)
    {
        $this->checkAdminAccess();
        $newStatus = User::STATUS_ACTIVE;
        if ($status == User::STATUS_ACTIVE) {
            $newStatus = User::STATUS_INACTIVE;
        }

        if ($status == User::STATUS_INACTIVE) {
            $newStatus = User::STATUS_ACTIVE;
        }

        $this->user->activate_deactivate($id, $newStatus);
        $this->session->set_flashdata('success', 'User status changed!');
        redirect($this->agent->referrer());
    }

    public function delete($id)
    {
        $this->checkAdminAccess();
        $this->user->delete($id);
        $this->session->set_flashdata('success', 'User deleted!');
        redirect($this->agent->referrer());
    }

    public function profile($id)
    {
        $this->checkAdminAccess();
        if (!empty($this->input->post()) && $id != NULL) {
            $this->user->update($id, [
                'name' => trim($this->input->post('name')),
                'email' => trim($this->input->post('email')),
                'phone' => trim($this->input->post('phone')),
                'address' => trim($this->input->post('address')),
                'city' => trim($this->input->post('city')),
                'state' => trim($this->input->post('state')),
                'country' => trim($this->input->post('country'))
            ]);

            $this->session->set_flashdata('success', 'User Information updated!');
            redirect($this->agent->referrer());
        }

        $user = $this->user->getById($id);
        $this->load->view('admin/users/profile', [
            'countries' => getCountries($this->db),
            'user' => $user
        ]);
    }
    private function checkLoginAccess()
    {
        if ($this->isAdminLogin) {
            redirect($this->controllerUrl."/dashboard");
        }
    }
    private function checkAdminAccess()
    {
        if (!$this->isAdminLogin) {
            redirect($this->controllerUrl . "/login");
        }
    }
}