<?php 
?>
<h1>Register</h1>
<form class="well" method="post" action="#">
    <label>Username</label>
    <input type="text" class="span3" name="username" value="<?php eh(Param::get('username')) ?>">
    <label>Password</label>
    <input type="password" class="span3" name="password1" value="<?php eh(Param::get('password1')) ?>">
    <label>Confirm Password</label>
    <input type="password" class="span3" name="password2" value="<?php eh(Param::get('password2')) ?>">
    <br />
    <input type="hidden" name="page_next" value="register_end">
    <button type="submit" class="btn btn-primary">Register</button>
    <a class="btn btn-primary" href="<?php eh(url('user/login'))?>">Back to login</a>
</form>