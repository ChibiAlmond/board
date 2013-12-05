<?php
class UserController extends AppController
{	
	public function login()
	{
		$user = new User;
	    $page = Param::get('page_next', 'login');
		
		switch($page){
		    case 'login':
			    break;
			case 'login_success':
			    $user->username = Param::get('username');
				$user->password = Param::get('password');
				try {
                    if ($user->login()) {
					    $_SESSION['username'] = Param::get('username');
						$page = 'login_success';
			        }
					else {
					    $page = 'login_failed';
					}
				}catch (ValidationException $e) {
				    $page = 'login';
				}
				
				break;
			 default:
                throw new NotFoundException("{$page} is not found");
                break;
		}
		$this->set(get_defined_vars());
		$this->render($page);
	}
	
    public function register()
    {
		$invalid_passFormat = false;
		$user_exists = false;
		$invalid_user = false;
		$invalid_pass = false;
        $user = new User;
		$user->password2 = Param::get('password2');
        $page = Param::get('page_next', 'register');
		switch ($page) {
        case 'register':
            break;
        case 'register_end':
            $user->username = Param::get('username');
            $user->password = Param::get('password');
		
				if(!input_check($user->username,8)){
				    $invalid_user = true;
					$page='register';
				}
				if(!input_check($user->password,6)){
				    $invalid_passFormat = true;
					$page='register';
				}
				
				if(!$user->isPasswordSame()) {
					$invalid_pass = true;
			        $page='register';
				}
				
				if($user->isUserExisting()) {
				    $user_exists = true;
					$page='register';
				}
	
				if($page != "register") {
					 $user->register();
					 $_SESSION['username'] = Param::get('username');
				}
            break;
        default:
            throw new NotFoundException("{$page} is not found");
             break;
        }
		
        $this->set(get_defined_vars());
        $this->render($page);
    }

    public function logout()
	{
	    session_destroy();
	}
}
