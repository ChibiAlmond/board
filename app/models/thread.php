<?php
class Thread extends AppModel
{
	public static function get($id)
    {
        $db = DB::conn();
        $row = $db->row('SELECT 1 FROM thread WHERE id = ?', array($id));
		var_dump($row);
        return new self($row);
    }
	
   public static function getAll($page)
    {	
        $threads = array();
        $db = DB::conn();

		$max_threads = 5;
        $row_count = $db->value('SELECT COUNT(*) FROM thread');
        $last_page = ceil($row_count/$max_threads);
        $offset = ($page - 1) * $max_threads;

        $rows = $db->rows('SELECT * FROM thread ORDER BY created DESC, id DESC
                            LIMIT '.$max_threads. ' OFFSET '.$offset
        );
        foreach ($rows as $row) {
            $threads[] = new Thread($row);
        }
		 
	    return array(
            'threads' => $threads,
            'last_page' => $last_page,
            'offset' => $offset,
            'pagenum' => $page
        );
    }

	public function getComments()
    {
        $comments = array();
        $db = DB::conn();
        $rows = $db->rows(
            'SELECT * FROM comment WHERE thread_id = ? ORDER BY created ASC',
            array($this->id)
        ); 
    foreach ($rows as $row) {
        $comments[] = new Comment($row);
    }

	    return $comments;
    }
	
	public function create(Comment $comment)
    {
        $this->validate();
        $comment->validate();
        if ($this->hasError() || $comment->hasError()) {
            throw new ValidationException('invalid thread or comment');
        }
	
        $db = DB::conn();
        $db->begin();
        $db->query('INSERT INTO thread SET title = ?, created = NOW()', array($this->title));
        $this->id = $db->lastInsertId();
    
	    // write first comment at the same time
        $this->write($comment);
    
	    $db->commit();
    }
	
	public function write(Comment $comment)
    {
	    if (!$comment->validate()) {
            throw new ValidationException('invalid comment');
        }
		
        $db = DB::conn();
        $db->query(
            'INSERT INTO comment SET thread_id = ?, username = ?, body = ?, created = NOW()',
		    array($this->id, $comment->username, $comment->body)
        );
    }
	
}