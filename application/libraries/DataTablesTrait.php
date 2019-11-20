<?php 
trait DataTablesTrait{
   private $CI;
   function __construct() {
       $this->CI =& get_instance();
       $this->CI->load->database();
   }
	public function InsertQ($fields = array(), $table)
	{
		$query = $this->CI->db->insert($table,$fields);
		return true;
	}

	public function SelectQ($fields = array(), $table = array(), $condition = "")
	{
		$this->CI->db->select($fields);
		if(!empty($condition)){
			$this->CI->db->where($condition);
		}
		$query = $this->CI->db->get($table);
		return $query->result_array();
	}

	public function UpdateQ($fields = array(), $table, $condition = array())
	{
		$this->CI->db->where($condition);
		$this->CI->db->update($table, $fields);
		return true;
	}

	public function SelectQJ($fields = array(), $table = array(), $condition = "",$relation = array())
	{
		$this->CI->db->select($fields);
		$this->CI->db->from($table[0]);		
		for ($i=1; $i < count($table) ; $i++) { 			
			$this->CI->db->join($table[$i],$relation[$i],'left');
		}
		if(!empty($condition)){
			$this->CI->db->where($condition);
		}
		$query = $this->CI->db->get();
		// var_dump($this->CI->db->last_query());die();
		return $query->result_array();
	}
}  

?>