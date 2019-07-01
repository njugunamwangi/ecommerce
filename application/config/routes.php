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
$route['login']							= 'auth/login';
$route['logout']						= 'auth/logout';
$route['admin']							= 'auth/index';
$route['my-account']					= 'pages/my_account';

// Frontend
$route['default_controller'] 			= 'pages/home';
$route['cart'] 							= 'pages/shopping_cart';
$route['checkout']						= 'pages/checkout';
$route['register']						= 'auth/register';
$route['(:any)']						= 'pages/product/$1';
$route['category/(:any)']				= 'pages/categories/$1';

// Admin Dashboard
$route['admin/products/categories'] 		= 'auth/categories';
$route['admin/products/categories/add'] 	= 'auth/publish_category';
$route['admin/products/subcategories/add'] 	= 'auth/publish_subcategory';
$route['admin/products/tags']				= 'auth/tags';
$route['admin/products/tags/add']			= 'auth/publish_tag';
$route['admin/products/publish']			= 'auth/publish_product';
$route['admin/products']					= 'auth/products';
$route['admin/product/edit/(:any)']			= 'auth/edit_product/$1';
$route['admin/shipments/add']				= 'auth/add_shipment';
$route['admin/shipments']					= 'auth/list_shipments';
$route['admin/orders']						= 'auth/list_orders';
$route['admin/order/(:any)']				= 'auth/view_order/$1';
$route['admin/products']					= 'auth/list_products';
$route['admin/settings/general']			= 'auth/general_settings';
$route['admin/users']						= 'auth/users';
