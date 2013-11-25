<?php
class User extends AppModel
{
    public static function getAll()
	{
		$users = array();
		
	    $db = DB::conn(); //establishes connection to the DB
	    $rows = $db->rows('SELECT * FROM user');	
		foreach ($rows as $row){
	  	    $users[] = new User($row);
		}
		
		return $users;
	}
	
	public function login()
	{
	    $db = DB::conn();
		$row = $db->row(
		    'SELECT 1 FROM user WHERE username = ? AND password = ?',
			array(
			    $this->username,
				$this->password
			)
		);
	    return $row ? true : false;
	}
	
}

?>