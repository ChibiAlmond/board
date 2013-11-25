<?php
class UserController extends AppController
{
	public function index()
    {
        $users = User::getAll();
        $this->set(get_defined_vars());
    }
	
	public function show()
	{
	    $name = Param::get('username');
		$row = User::getUserFromName($username);
		$this->set('row',$row);
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
        $page = Param::get('page_next', 'register');

		switch ($page) {
		case 'write':
        break;
        case 'write_end':
            $comment->username = Param::get('username');
            $comment->body = Param::get('body');
			try {
                $thread->write($comment);
			} catch (ValidationErrorException $e) {
			    $page = 'write';
			}
            break;
        default:
            throw new NotFoundException("{$page} is not found");
            break;
        }
		
        $this->set(get_defined_vars());
        $this->render($page);
    }
    public function create()
    {
        $thread = new Thread;
        $comment = new Comment;
        $page = Param::get('page_next', 'create');

		switch ($page) {
        case 'create':
            break;
        case 'create_end':
            $thread->title = Param::get('title');
            $comment->username = Param::get('username');
            $comment->body = Param::get('body');
            try {
			    $thread->create($comment);
            } catch (ValidationException $e) {
                $page = 'create';
            }
            break;
        default:
            throw new NotFoundException("{$page} is not found");
             break;
        }
		
        $this->set(get_defined_vars());
        $this->render($page);
    }


    public function view()
    {
        $thread = Thread::get(Param::get('thread_id'));
        $comments = $thread->getComments();
	
        $this->set(get_defined_vars());
    }
}
