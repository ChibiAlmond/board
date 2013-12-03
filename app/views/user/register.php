<?php if ($user_exists || $invalid_pass) :?>
    <div class="alert alert-block">
        <h4 class="warning">Errors!</h4>
            <div class="alert-error">
			   
				    <?php
					
					    if ($user_exists) {
					        echo "Username Already Exist</br>";
						}
					    if ($invalid_pass) {
			                echo "Password Did Not Match</br>";
						}
						if ($invalid_user) {
							echo "Invalid Username use only A-Z a-z 0-9 and must have at least 8 valid characters</br>";
						}
						if ($invalid_pass) {
							echo "Invalid Password Format use only A-Z a-z 0-9 and must have at least 6 valid characters</br>";
						}
					?>
				
			</div>
    </div>
<?php endif ?>
<h1>Register</h1>
<form class="well" method="post" action="#">
    <label>Username </label>
    <input type="text" class="span3" name="username" maxlength="16" value="<?php eh(Param::get('username')) ?>">
    <label>Password </label>
    <input type="password" class="span3" name="password" maxlength="12" value="<?php eh(Param::get('password')) ?>">
    <label>Confirm Password</label>
    <input type="password" class="span3" name="password2" maxlength="12" value="<?php eh(Param::get('password2')) ?>">
    <br />
    <input type="hidden" name="page_next" value="register_end">
    <button type="submit" class="btn btn-primary">Register</button>
    <a class="btn btn-primary" href="<?php eh(url('user/login'))?>">Back to login</a>
</form>