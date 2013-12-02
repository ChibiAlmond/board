<?php
class CommentController extends Controller {

	
	public function index() {
	$array = Comment::getAll(Param::get('page',1),Param::get('thread_id'));//set default value 1 in case null
	$comments = $array['comments'];
    $last_page = $array['last_page'];
    $offset = $array['offset'];
    $pagenum = $array['pagenum'];
    $pagination_ctrl = pagination($last_page, $pagenum, 4);
    $this->set(get_defined_vars()); 

	}
	
public function write()
    {
        $comment = new Comment;
        $page = Param::get('page_next', 'write');

		switch ($page) {
        case 'write':
            break;
        case 'write_end':
            $comment->username = Param::get('username');
            $comment->body = Param::get('body');
			$comment->thread_id = Param::get('thread_id');
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





}





?>