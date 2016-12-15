<?php
	/**
	 * Prepare the SELECT statment for a table excluding some value by the $remove variable
	 * @param  String $table  the name of the table
	 * @param  Array/String $remove  You can pass a string "ID" or an array of value Array("ID","description")...
	 * @param  Boolean Return an array of the string fot the select statement.
	 * @return String         The select statment
	 */
	public function getColsExcept($table,$remove,$array=false)
	{
		$result = 0;
	    $columns = $this->CI->db->list_fields($table);
	    
	    $remove_values = (array)$remove;
	    foreach ($remove_values as $key => $value) 
	    {
	    	if (in_array($value, $columns))
	    	{
	    		$columns = array_diff($columns, array($value));
	    	}
	    }

	    foreach ($columns as &$column) {
	    	$column = "`".$table."`.`".$column."`";
	    }

        return $array ? $columns : implode(",",$columns);
	}
}
