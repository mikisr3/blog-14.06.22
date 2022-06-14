<?php
defined('BASEPATH') OR exit('No direct script access allowed');




$route['bars'] = 'charts/index12';

$route['ajax-post']['post'] = 'posts/output';
$route['posts/output1'] = 'posts/output1';
$route['posts/update'] = 'posts/update';
$route['posts/create'] = 'posts/create';
$route['pages/view'] = 'pages/view';
$route['pages/change_marker'] = 'pages/change_marker';
$route['pages/view11'] = 'pages/view11';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts/posts_images/(:any)'] = 'posts/images/$1';

$route['posts'] = 'posts/index';
$route['ajax-post1'] = 'posts/likes';
$route['ajax-post2'] = 'pages/slider';






$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';

$route['exercise'] = 'exercise/index';


$route['categories/create'] = 'categories/create';

$route['categories/posts/(:any)'] = 'categories/posts/$1';




$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
