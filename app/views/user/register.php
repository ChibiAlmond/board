<?php if ($user_exists || $invalid_pass) :?>
    <div class="alert alert-block">
        <h4 class="alert-heading">Validation Errors!</h4>
            <div>
			    <em>
				    <?php
					if ($user_exists && $invalid_pass) { 
					    echo "Username Already Exist and Password Not Match";
					}
					else{
					    if ($user_exists)
					        echo "Username Already Exist";
					    else
			                echo "Password Did Not Match";
					}
					?>
				</em>  
			</div>
    </div>
<?php endif ?>
<h1>Register</h1>
<form class="well" method="post" action="#">
    <label>Username</label>
    <input type="text" class="span3" name="username" value="<?php eh(Param::get('username')) ?>">
    <label>Password</label>
    <input type="password" class="span3" name="password" value="<?php eh(Param::get('password')) ?>">
    <label>Confirm Password</label>
    <input type="password" class="span3" name="password2" value="<?php eh(Param::get('password2')) ?>">
    <br />
    <input type="hidden" name="page_next" value="register_end">
    <button type="submit" class="btn btn-primary">Register</button>
    <a class="btn btn-primary" href="<?php eh(url('user/login'))?>">Back to login</a>
</form>