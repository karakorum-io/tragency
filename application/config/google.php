<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '601859088136-5fjhno6rpebj2gs59oo8bv1t1h82ho94.apps.googleusercontent.com';
$config['google']['client_secret']    = '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';
$config['google']['redirect_uri']     = base_url().'users/google';
$config['google']['application_name'] = 'Mystical taj';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();