<?php
class User extends AppModel
{	
	public $password2;
    public $page;


	public $validation = array(
	    'username' => array(
		    'length' => array(
			    'validate_between', 6, 15,
			),
		),
		'password1' => array(
		    'length' => array(
			    'validate_between', 8, 15,
				),
			),
		'password2' => array(
		    'length' => array(
			    'validate_between', 8, 15,
				),
			),
		);


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
	public function isUserExisting()
	{
	    $db = DB::conn();
		$row = $db->row(
		        'SELECT 1 FROM users WHERE username = ?', 
			    array(
		            $this->username
			    ));
		return $row ? true : false; 
	}
	
	public function isPasswordSame() 	
	{
		return strcmp($this->password1,$this->password2);
	}
	
	public function register()
	{	
		$user->password2 = Param::get('password2');
	
		if(!$this->validate() || $this->isUserExisting() || $this->isPasswordSame())
		throw new ValidationException('Invalid registration information');
		
	    $db = DB::conn();
		$pass = md5($this->password);
        $db->query(
		    'INSERT INTO user SET username =?, password =?',
		    array( $this->username, $pass)
			);
    }


}

?>