<?php 
	/**
	 * @author Rebolini Pablo <rebolini.pablo@gmail.com>
	 */
	class SqlDataMapper implements DataMapperInterface{
		
		private $from;
		private $where;
		private $query;
		private $select;
		private $insert;
		private $orderBy;

		public function get(){
			// Si tenemos una sentencia de tipo SELECT...
			if(!empty($this->select)){
				$this->query = "{$this->select} {$this->from} {$this->where} {$this->orderBy}";				
			}
			
			// Si en cambios es de tipo INSERT...
			if(!empty($this->insert)){
				$this->query = "{$this->insert}";
			}
			
			// Reseteamos las consultas
			$this->reset();
			
			// Retornamos Query...
			return $this->query;
		}
		
		public function reset(){
			$this->from 	= '';
			$this->where 	= '';
			$this->select 	= '';
			$this->insert 	= '';
			$this->orderBy 	= '';			
		}
		
		public function select($fields = '*'){
			$this->select = "SELECT {$fields} ";
			return $this;
		}
		
		public function from($table){
			$this->from = "FROM {$table} ";
			return $this;
		}
		
		public function where($field, $operator = '=', $value){
			$this->where = "WHERE {$field} {$operator} {$value}";
			return $this;
		}
		
		public function order_by($field, $order = 'DESC'){
			$this->orderBy = "ORDER BY {$field} {$order}";
			return $this;
		}

		public function insert($into, $values){
			$_fields;
			$_val;
			
			foreach($values as $k => $v){
				$_fields[] = chr(96).$k.chr(96);
				$_val[] = ':'.$k; // En lugar de asignar el valor, asiganamos el named placeholder. Para consultas con pdo bind
			} 
			
			$this->insert = "INSERT INTO `{$into}` (". implode(',', $_fields) .") VALUES (". implode(',', $_val) .");";
			return $this;
		}
	}
?>