<?php 
	/**
	 * @author hermes
	 */
	interface DAOInterface{

		/**
		 * Direct query
		 */
		public function query($sql, EventVO $bind, $return);
		
		/**
		 * C.R.U.D - Operations
		 */
		public function create(EventVO $bind);
		//public function read();
		//public function update();	
		//public function delete();

		/**
		 * Get by ID
		 * @param EventoVO $id
		 */
		public function getByID(EventVO $id);		
	
	}
?>