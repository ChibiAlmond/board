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
        
    public function write(){
   //  $thread = new Thread;
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
                    $comment->write();
                } catch (ValidationException $e) {
                //$page = 'write';
				var_dump($comment);
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