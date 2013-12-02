<?php foreach ($comments as $k => $v): ?>
<div class="comment">
    <div class="meta">
       Comment <?php eh($k + 1) ?> :
		 <?php eh($v->body) ?></br>
		By:<?php eh($v->username) ?></br>
		On:<?php eh($v->created) ?></br>
    </div></br>
</div>
<?php endforeach ?>
<div class="pager page-header">
    <?php //echo $pagination_ctrl;
	?>
</div>
<hr>
    <form class="well" method="post" action="<?php eh(url('comment/write')) ?>">
    <label>Your name</label>
    <input type="text" class="span2" name="username" value="<?php eh(Param::get('username')) ?>">
    <label>Comment</label>
    <textarea name="body"><?php eh(Param::get('body')) ?></textarea>
    <br />
    <input type="hidden" name="thread_id" value="<?php eh($thread->id) ?>">
    <input type="hidden" name="page_next" value="write_end">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
	<a class="btn btn-primary" href="<?php eh(url('thread/index'))?>">Back to Home</a>
	
