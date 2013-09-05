<?php 
	/**
	 * @author Rebolini Pablo <Rebolini.pablo@gmail.com>
	 */
	// Autoload
	require 'Libraries/loader.php';
	
	try{
		$dbConfig = [
			'host' => 'localhost',
			'user' => 'root',
			'pass' => '',
			'name' => 'eventManager'
		];		
		
		$event = new EventVO();
		$event->id = 666;
		$event->title = 'Test title event';
		$event->date = '05/09/1969 21:45:00';
		
		$ar = new SqlDataMapper();
		$dao = new EventDAO($dbConfig, $ar);
		$dao->create($event);

		unset($event);

		$event = new EventVO();
		$event->id = 666;
		//print_r($dao->getByID($event));		
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	catch(Exception $e){
		die($e->getMessage());
	}
?>