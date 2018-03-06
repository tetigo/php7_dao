<?php
	
	function teste($class_name){

		$dirName = 'dao/classes'.DIRECTORY_SEPARATOR;
		$filename = $dirName.$class_name.'.php';

		if(file_exists($filename)){
			require_once($filename);
		}
	}

	spl_autoload_register('teste');

?>