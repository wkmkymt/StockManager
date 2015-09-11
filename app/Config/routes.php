<?php

/* ==================================================
 *   Router
 * ================================================== */

Router::connect('/', array('controller' => 'posts', 'action' => 'index', 'home'));

Router::connect('/page/*', array('controller' => 'page', 'action' => 'display'));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
