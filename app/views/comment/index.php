<h1>All Comments</h1>
<ul>
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
    <?php echo $pagination_ctrl; ?>
</div>
