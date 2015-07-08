<div id="news">
    <div id="news_mini2_version">
        <?php if (empty($_SESSION[ 'valid_user'])) {?>
        <fieldset>
                <Legend>Log In</legend>
            <form name="form2" method="post" action="">
                <table>
                    <tr>
                        <td>Nickname:</td>
                        <td>
                            <input type="text" name="form_nickname" size="15" maxlength="20" />
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="form_password" size="15" maxlength="20" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Log in" />
                        </td>

                    </tr>
                </table>
            </form>
        <a href="registration">Need to register?</a> 
        <br>
        <a href="passforget">Forgot your password?</a>
        <br>
        <a href="passforget">Forgot your username? </a>
        </fieldset>
        <?php } else {?>
        <p>You are currently logged in!</p>
        <br>
        <?php } ?>
        <h3><a href="home">Return to the main page!</a></h3>
    </div>
</div>
