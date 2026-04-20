<?php

$routes->get('/', 'Tasks::index');
$routes->post('tasks/store', 'Tasks::store');
$routes->get('tasks/delete/(:num)', 'Tasks::delete/$1');
$routes->get('tasks/updateStatus/(:num)/(:any)', 'Tasks::updateStatus/$1/$2');
