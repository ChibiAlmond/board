<h2>Access Granted</h2>
<p class="alert alert-success">
   Successfully Logged In <?php echo $_SESSION['username']; ?>
</p>
<a href="<?php eh(url('thread/index'),array($_SESSION['username'])) ?>">Proceed to home page</a>