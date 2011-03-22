<?php
$dirname = __DIR__;

//Include all of the folders that need to be included to run the plugin.
add_include_directory($dirname . '/app/controllers');
add_include_directory($dirname . '/app/helpers');
add_include_directory($dirname . '/app/models');
add_include_directory($dirname . '/app/views');
add_include_directory($dirname . '/lib');

include_all_in_folder($dirname . '/app/helpers');

spl_autoload_register('help_autoload', true, true);

function help_autoload($class_name){
	$ns = 'net\\mediaslave\\help\\';

	$class_parts = explode('\\', $class_name);

	$class_name = array_pop($class_parts);

	$cpi = implode('\\', $class_parts);
	$cpi =	str_replace($ns, '', $cpi);
	$class = strtolower(preg_replace('%\\\\-%', '\\', preg_replace('/([^\s])([A-Z])/', '\1-\2', $cpi)));
	$file =  '/' . str_replace('\\', '/', $class) . '/' . $class_name . '.php' ;

	if(file_exists(__DIR__ . $file)) {
		require_once(__DIR__ . $file);
	}
}


include($dirname . '/config/environment.php');