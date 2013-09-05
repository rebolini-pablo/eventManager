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
		
		
		// Creamos un nuevo objeto SQLDataMapper para el DAO
		$ar = new SqlDataMapper();
		
		// Creamos el DAO
		$dao = new EventDAO($dbConfig, $ar);
		
		// Creamos el evento.
		$dao->create($event);

		unset($event);

		$event = new EventVO();
		$event->id = 666;
		
		print_r($dao->getByID($event));		
		// Retorna:
		// Array ( [id] => 666 [title] => Test title event [date] => 05/09/1969 21:45:00 )
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	catch(Exception $e){
		die($e->getMessage());
	}
?>