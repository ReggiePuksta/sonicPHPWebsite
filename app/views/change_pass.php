<div id="news">
    <div id="news_mini">
        <h1> Change Password!</h1>

        <form method="post" action="changePass"
            name="password-form" id="form-password">
            <label>Old Password:</label><br>
            <input type="password" name="password" id="password" value="" size="32" />
            <label>New Password:</label> <br>
            <input type="password" name="password-check" id="password-check" value="" size="32" />
            <label>Re-Enter New Password:</label> <br>
            <input type="password" name="password-check" id="password-check" value="" size="32" />
            <input type="submit" value="Submit" id="passsubmit">
        </form>
    <?php if (isset($passwordChange)): ?>
        <?php if ($passwordChange): ?>
            You have changed Your password successfully.
        <?php else:?>
            Something went wrong, please check if your details are correct.
        <?php endif;?>
    <?php endif;?>
        <a href="index.php"><h3>Return to the main page!</h3></a>
    </div>
</div>
</html>
</body>
