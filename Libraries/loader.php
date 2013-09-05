<?php 

	define('LIBS_PATH', dirname( __FILE__ ));

	function app_autoload($className){
		// Libraries Path
		$libs = [
			'DAO_CLASS_PATH'	=> LIBS_PATH.'/DAO/myClass/',
			'DAO_INTERFACE_PATH'=> LIBS_PATH.'/DAO/myInterface/',
			'VO_CLASS_PATH'		=> LIBS_PATH.'/VO/myClass/',
			'VO_INTERFACE_PATH' => LIBS_PATH.'/VO/myInterface/',
			'DM_CLASS_PATH'		=> LIBS_PATH.'/DataMapper/myClass/',
			'DM_INTERFACE_PATH' => LIBS_PATH.'/DataMapper/myInterface/',
		];
		
		foreach($libs as $p){
			if(file_exists("$p/$className.php")) require_once("$p/$className.php");
		}
	}
	spl_autoload_register('app_autoload');
?>