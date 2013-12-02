<h2><?php eh($thread->title) ?></h2>

<p class="alert alert-success">
    You successfully wrote this comment.
</p>

<a href="<?php eh(url('thread/index')) ?>">
    &larr; Back to thread
</a>

<?php// eh(url('thread/index', array('thread_id' => $thread->id))) 
?>
