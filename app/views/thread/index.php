<?php if(isset($_SESSION['username'])) : ?>
    <a class="btn btn-primary" href="<?php eh(url('user/logout')) ?>">Logout</a>
<?php endif ?>
<h1>All threads</h1>
<ul>
    <?php foreach ($threads as $v): ?>
    <li>
	    <a href="<?php eh(url('comment/index', array('thread_id' => $v->id))) ?>">
        <?php eh($v->title) ?>
        </a>
    </li>
    <?php endforeach ?>
	
</ul>
<div class="pager page-header">
    <?php echo $pagination_ctrl; ?>
</div>
<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create')) ?>">Create</a>
