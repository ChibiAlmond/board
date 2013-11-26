<?php
class UserController extends AppController
{
	public function index()
    {
        $users = User::getAll();
        $this->set(get_defined_vars());
    }
	
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

        $user = new User;
        $page = Param::get('page_next', 'register');

		switch ($page) {
        case 'register':
            break;
        case 'register_end':
			var_dump($_POST);
            $user->username = Param::get('username');
            $user->password = Param::get('password');
			try {
			    $user->register();
				$_SESSION['username'] = Param::get('username');
            } catch (ValidationException $e) {
                $page = 'register';
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
