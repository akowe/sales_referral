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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
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
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['index'] = 'user/index';
$route['register'] = 'user/register';
$route['verify'] = 'user/verify';
$route['login'] = 'user/login';
$route['dashboard'] = 'user/dashboard';
$route['profile'] = 'user/profile';
$route['admin'] = 'admin/admin';
$route['support'] = 'admin/support';
$route['finance'] = 'admin/finance';
$route['create'] = 'admin/create';
$route['biggie_commission'] = 'user/biggie_commission';
$route['midi_commission'] = 'user/midi_commission';
$route['mini_commission'] = 'user/mini_commission';
$route['large_commission'] = 'user/large_commission';
$route['medium_commission'] = 'user/medium_commission';
$route['small_commission'] = 'user/small_commission';
$route['maxi_commission'] = 'user/maxi_commission';
$route['standard_commission'] = 'user/standard_commission';
$route['compact_commission'] = 'user/compact_commission';
$route['agents'] = 'admin/agents';
$route['flash_sales'] = 'admin/flash_sales';


$route['commission'] = 'admin/commission';
$route['sales'] = 'admin/sales';
$route['specta'] = 'admin/specta';
$route['pendingOrder'] = 'admin/pendingOrder';
$route['approve_user'] = 'admin/approve_user';
$route['reject_user'] = 'admin/reject_user';
$route['edit_user'] = 'admin/edit_user';
$route['forgot_password'] = 'user/forgot_password';
$route['reset_password'] = 'user/reset_password';
$route['change_password'] = 'user/change_password';
$route['reset_user'] = 'admin/reset_user';
$route['users'] = 'employee/users';





