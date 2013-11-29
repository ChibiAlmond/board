<?php if (isset($_POST) && $user->hasError()) : ?>
    <div class="alert alert-block">
    <h4 class="alert-heading">Validation error!</h4>
    <?php if (!empty($user->validation_errors['username']['length'])): ?>
        <div><em>Username length</em> must be between
            <?php eh($user->validation['username']['length'][1]) ?> and
            <?php eh($user->validation['username']['length'][2]) ?> characters in length.
        </div>
    <?php endif ?>
    <?php if ($user->isUserExisting() === false): ?>
        <div><em>Username Already Exist</em>  
        </div>
    <?php endif ?>
    <?php if ($user->isPasswordSame() === false ): ?>
        <div><em>Password Not Match</em>
        </div>
    <?php endif ?>
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