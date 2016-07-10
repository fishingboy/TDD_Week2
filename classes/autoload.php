<?php
/**
 * CLASS 自動載入
 */
spl_autoload_register(function ($class_name) 
{
	$file = 'classes/' . $class_name . '.php';
	if (file_exists($file)) {
    	include $file;
	}
});