<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['tasks/create'] = 'tasks/create';
$route['tasks/update'] = 'tasks/update';
$route['tasks/(:any)'] = 'tasks/view/$1';
$route['tasks'] = 'tasks/index';

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
