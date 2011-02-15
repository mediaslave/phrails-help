<?php

//Load the correct environment off the bat.
//include $dirname . '/config/environments/' . Registry::get('pr-environment') . '.php';

$plugin_paths = Registry::get('pr-plugin-paths');
add_include_directory(__DIR__ . '/../../../../lib/help');
$array = array(realpath(__DIR__ . '/../../../../lib/help'));
foreach($plugin_paths as $path) {
	add_include_directory($path . '/lib/help');
	$array[] = $path . '/lib/help';
}

use net\mediaslave\help\app\controllers\HelpController as Help;
Help::setPaths($array);