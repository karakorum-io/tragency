<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'web';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "web" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'web';
$route['about'] = 'web/about';
$route['travel-agency-in-agra'] = 'web/tagra';
$route['client-testimonials'] = 'web/testimonials';
$route['client-testimonials/(:any)'] = 'web/testimonials/$1';
$route['cancellation-policy'] = 'web/load/cancel_policy';
$route['why-expedition-saga'] = 'web/load/why';
$route['terms-conditions'] = 'web/load/terms_policy';
$route['services'] = 'web/load/services';
$route['contact'] = 'web/load/contact';
$route['tour/(:any)'] = 'web/tour_detail/$1';
$route['destination/(:any)/(:any)'] = 'web/destination/$1/$2';
$route['destination/(:any)'] = 'web/destination/$1';
$route['blogs'] = 'web/blogs';
$route['tours/(:any)/(:any)'] = 'web/tour_detail/$1/$2';
$route['blog/(:any)'] = 'web/blog/$1';
$route['personalized-tours'] = 'web/personalized_tours';
$route['b2b'] = 'web/b2b';
$route['review'] = 'web/review';

$route['taj-mahal-virtual-tours'] = 'web/meta_tours';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
