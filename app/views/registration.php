<div id="news">
    <div class="news_left">
        <h2>User registration</h2>
        <p id="alert_text">
            <?php if ($userNameExists): ?>
                <?php if ($userNameExists): ?>
                    <h2>Username allready exists</h2> 
                <?php else: ?>
                <?php //validate empty fields ?>
                <?php if($inputsValidated): ?>
                <h2>You are registered successfully!</h2>
                <?php else: ?>
                <h2>You haven't filled all the form yet!</h2>
                <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </p>
        <fieldset>
            <form method="post" onSubmit="return validate(this)" action="">
                <label id="lbl0">Nickname:</label>
                <input type="text" name="form_nickname" size="15" maxlength="20">
                <label id="lbl1">Password:</label>
                <input type="password" name="form_password" size="15" maxlength="20">
                <label id="lbl2">First name:</label>
                <input type="text" name="form_firstname">
                <label id="lbl3">Last name:</label>
                <input type="text" name="form_lastname">
                <label id="lbl4">Email:</label>
                <input type="email" name="form_email">
                <input type="submit" name="submit" value="Registrate">
                <input type="reset" name="submit2" value="Reset">
            </form>
        </fieldset>
        <div id="valid_paragraph">
            <p id="hide">Rules of registration:</p>
            <ul>
                <li>Nickname has to be longer than 5 characters</li>
                <li>Password has to be at least 6 numbers and include number, lower
                    and uppercase letter</li>
                <li>You must fill in all fields in order to register</li>
            </ul>
            <a href="">Check our user policy and full details about your privacy</a>
        </div>
    </div>
