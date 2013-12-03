<?php if(session_check()) :?>
    <a class="btn btn-primary" href="<?php eh(url('user/logout')) ?>">Logout</a>   
<?php endif ?>
<h1>All threads</h1>
<h2>Welcome <a><?php echo $_SESSION['username']; ?></a>!</h2></br></br>

<?php foreach ($threads as $v): ?>
    <a class = "a:hover" href="<?php eh(url('comment/index', array('thread_id' => $v->id))) ?> ">
        <?php eh($v->title) ?>
    </a></br>
<?php endforeach ?>

<div class="pager page-header">
    <?php echo $pagination_ctrl; ?>
</div>

<a class="btn btn-large btn-primary" href="<?php eh(url('thread/create'),array($_SESSION['username'])) ?>">Create</a>
