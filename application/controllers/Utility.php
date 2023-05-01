<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Utility extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->helper('general');
    }

    public function get_country_states($countryId)
    {
        if ($countryId) {
            $states = getCountryStates($this->db, $countryId);
            respondSuccess($states);
        }
    }
}