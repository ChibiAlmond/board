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
		'password' => array(
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
	
	public function register()
	{
	    if(!$this->validate() || $this->isUserExisting() || $this->isPasswordSame()){
		    throw new ValidationException('Invalid Input');
		}

	    $db = DB::conn();
		$pass = md5($this->password);
        $db->query(
		    'INSERT INTO user SET username =?, password =?',
		    array(
			    $this->username, $pass
			));
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
	    return strcmp($this->password1,$this->password2)? true : false;
	}


}

?>