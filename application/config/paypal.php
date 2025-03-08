<?php

defined('BASEPATH') or exit('No direct script access allowed');
$config['sandbox'] = FALSE; // FALSE for live environment 
$config['business'] = 'shahrukhusmaani@live.com';
$config['paypal_lib_currency_code'] = 'USD';
// Where is the button located at? (optional) 
$config['paypal_lib_button_path'] = 'assets/images/';
// If (and where) to log ipn response in a file 
$config['paypal_lib_ipn_log'] = FALSE;
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';