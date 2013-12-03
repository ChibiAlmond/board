<h2 class="h2-header_top">Log In</h2>
<form class="well" method="post" action="#">
    <label>Username</label>
    <input type="text" class="span3" name="username"  value="<?php eh(Param::get('username')) ?>">
    <label>Password</label>
    <input type="password" class="span3" name="password" value="<?php eh(Param::get('password')) ?>">
    <br />
    <input type="hidden" name="page_next" value="login_success">
    <button type="submit" class="btn btn-primary">Log In</button>
    <a class="btn btn-primary" href="<?php eh(url('user/register')) ?>">Not yet a Member?</a>
</form>