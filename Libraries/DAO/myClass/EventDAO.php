<?php 
	/**
	 * @author Rebolini Pablo <rebolini.pablo@gmail.com>
	 */	
	class EventDAO implements DAOInterface {
		
		private $dbConfig = [];
		private $db;
		private $dm; // Data Mapper
		
		public function __construct(array $dbConfig, DataMapperInterface $dm){
			try{
				// Agregar Driver
				$this->dbConfig['host'] = $dbConfig['host'];
				$this->dbConfig['user'] = $dbConfig['user'];
				$this->dbConfig['pass'] = $dbConfig['pass'];			
				$this->dbConfig['name'] = $dbConfig['name'];
				
				$this->db = new PDO("mysql:host={$this->dbConfig['host']};dbname={$this->dbConfig['name']}", $this->dbConfig['user'], $this->dbConfig['pass']);
				$this->dm = $dm; // Data Mapper
			}
			catch(PDOException $e){
				die($e->getMessage());				
			}
			catch(Exception $e){
				die($e->getMessage());
			}
		}
		
		public function query($sql, EventVO $bind, $return = PDO::FETCH_ASSOC){
			$query = $this->db->prepare($sql);
			
			// Eliminamos las propiedades vacias...
			foreach($bind as $k => $v){
				if(empty($bind->{$k})) unset($bind->{$k});
			}
			
			$query->execute((array)$bind);
			return $query->fetch($return);
		}
		
		public function create(EventVO $bind){
			if(empty($bind)) throw new InvalidArgumentException("Parametros erroneos");
			
			$sql = $this->dm->insert('eventos', $bind)->get();
			return $this->query($sql, $bind);
		}
		
		public function getByID(EventVO $bind){
			if(empty($bind)) throw new InvalidArgumentException("Parametros erroneos");

			$sql = $this->dm->select('*')->from('eventos')->where('id', '=', ':id')->get();
			return $this->query($sql, $bind);
		}
	}
	
?>