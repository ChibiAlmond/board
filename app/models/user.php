<?php
class User extends AppModel
{	
	public $password2;
    public $page;

	public function login()
	{
	    $db = DB::conn();
		$pass = md5($this->password);
		$row = $db->row(
		    'SELECT 1 FROM user WHERE username = ? AND password = ?',
			array($this->username, $pass
			)
		);
	
		return $row ? true : false;
	}
	public function isUserExisting()
	{
	    $db = DB::conn();
		$row = $db->row(
		        'SELECT 1 FROM user	 WHERE username = ?', 
			    array(
		            $this->username
			    ));
		
		return $row ? true : false; 
	}
	
	public function isPasswordSame() 	
	{
		if($this->password === $this->password2) {
		return true;
		}
	return false;
	}
	
	public function register()
	{	
	    $db = DB::conn();
		$pass = md5($this->password);
        $db->query(
		    'INSERT INTO user SET username = ?, password = ?',
		    array( $this->username, $pass)
			);
    }

}

?>