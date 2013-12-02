<?php
class Comment extends AppModel
{

	public static function getAll($page,$id)
    {
		$comments = array();
        $db = DB::conn();
		$max_comments = 5;
        $row_count = $db->value('SELECT COUNT(*) FROM comment WHERE thread_id = ?', array($id));
        $last_page = ceil($row_count/$max_comments);
        $offset = ($page - 1) * $max_comments;

        $rows = $db->rows('SELECT * FROM comment WHERE thread_id = ? ORDER BY created DESC
                            LIMIT '.$max_comments. ' OFFSET '.$offset, array($id)
        );
		
        foreach ($rows as $row) {
            $comments[] = new Comment($row);
        }
		 
	    return array(
            'comments' => $comments,
            'last_page' => $last_page,
            'offset' => $offset,
            'pagenum' => $page
        );
    }
	
	public function write()
    {
	 $thread_id = Param::get('id');
	 $body = Param::get('body');
	 $username = Param::get('username');
	 
	    if (!$comment->validate()) {
            throw new ValidationException('invalid comment');
        }
		
        $db = DB::conn();
        $db->query(
            'INSERT INTO comment SET thread_id = ?, username = ?, body = ?, created = NOW()',
		    array($thread_id, $username, $body)
        );
    }
	
}