<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'AuthController/index';//login page (get)
$route['login']='AuthController/login';//authentication user (post)
$route['home'] = 'AdminController/index';//administration page access only for admin (get)
$route['add']='AdminController/form_to_add_user';//form to add new user (get)
$route['list']='AdminController/list_active_user';//Show list of active user(get)
$route['store']='AdminController/store';//Send data to database (post)
$route['user_info']='HomeController/home';//public home page for all user when authentified (get)
$route['logout']='AuthController/logout';//logout 
$route['edit/(:any)']='AdminController/edit/$1';// show an user by matriculID in form to edit (get)
$route['post_edit/(:any)']='AdminController/post_edit/$1';// submit data to edit(post)
$route['delete/(:any)']='AdminController/delete/$1';//  confirmation page to delete user (get)
$route['corfirm_to_delete/(:any)']='AdminController/corfirm_to_delete/$1';//confirm to delete (post)
$route['restore/(:any)']='AdminController/corfirm_to_restore/$1';
$route['user_not_active']='AdminController/employee_not_active';
$route['user/users_connected']='AdminController/get_connected_users';