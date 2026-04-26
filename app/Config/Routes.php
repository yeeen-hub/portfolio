<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/menu', 'Menu::index');
$routes->get('/home', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/projects', 'Projects::index');
$routes->get('/contact', 'Contact::index');
$routes->get('/login', 'Login::index');
$routes->get('/admin', 'Admin::index');
$routes->get('admin', 'Admin::admin');
$routes->get('editcontent','Editcontent::index');
$routes->get('editproject','Editproject::index');
$routes->get('admin/landing', 'Landing::edit');
$routes->post('admin/landing/update', 'Landing::update');
$routes->get('uploads/(:segment)', 'Image::show/$1');
$routes->get('admin/project', 'Project::index');
$routes->post('admin/project/store', 'Project::store');

$routes->get('admin/project/edit/(:num)', 'Project::edit/$1');
$routes->post('admin/project/update/(:num)', 'Project::update/$1');

$routes->get('admin/project/delete/(:num)', 'Project::delete/$1');
$routes->get('projects/(:num)', 'Projects::view/$1');
$routes->post('login/authenticate', 'Login::authenticate');

$routes->post('admin/resume/upload', 'Admin::uploadResume');
$routes->get('admin/resume/delete', 'Admin::deleteResume');

$routes->get('logout', 'Login::logout');