<?php 
	/**
	 * 
	 * @author hermes
	 */
	interface DataMapperInterface{
		/*private $from;
		private $where;
		private $query;
		private $select;
		private $orderBy;*/
	
		public function get();
			
		public function reset();
				
		public function select($fields);
		
		public function from($table);
			
		public function where($field, $operator, $value);
		
		public function order_by($field, $order);
	}
?>