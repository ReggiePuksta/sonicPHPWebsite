<!-- part1 = header-->
<div id="part1" class="row">
    <div class="col-sm-6">
        <h2 id="part1_text1">21st - 24th of March</h2>
        <h2 id="part1_text2">University of Salford</h2>
    </div>
    <div class="hidden-xs col-sm-6">
        <?php if (isset($_SESSION[ 'valid_user'])): ?>
        <h3> You are logged in as: <span id="logname"> <?php echo $_SESSION['valid_user']; ?></span></h3>
        <div class="underline"></div>
        <?php if ($userAvatar): ?>
        <img src="serveImgUpload?image=<?php echo $userAvatar->avatar; ?>" id="avatar">
        <?php endif;?>
        <ul class="personal_menu">
            <li><a href="myevents">View your tickets</a>
            </li>
            <li><a href="uploadAvatar">Add a picture</a>
            </li>
            <li><a href="changePass">Change your password</a>
            </li>
            <li><a href="logout">Log out</a>
            </li>
        </ul>
        <div class="underline"></div>
        <?php if($eventsData): ?>
        <h3> Your upcoming events: </h3>
        <table border="1">
            <tr>
                <td>Event title</td>
                <td>Date</td>
                <td>Time</td>
            </tr>
            <?php foreach($eventsData as $row): ?>
            <?php $_SESSION['orderss']=$row->orderid; ?>
            <tr>
                <td>
                    <?php echo $row->title; ?></td>
                <td>
                    <?php echo $row->date; ?></td>
                <td>
                    <?php echo $row->starttime; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>---------None---------</p>
        <?php endif; ?>
        <?php else: ?>
        <fieldset>
            <Legend>Log In</legend>
            <form name="form2" method="post" action="index.php">
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
                            <input type="password" name="form_password" size="15"
                            maxlength="20" />
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            <input type="submit" name="submit" value="Log in" />
                        </td>
                        <?php if(isset($_POST['form_nickname'])): ?>
                        <td>
                            <p>Could not log you in. Or you need to <a href="register.php"> Register</a>
                            </p>
                        </td>
                    </tr>
                </table>
            </form>
            <a href="passforget">Forgot your password?</a>
            <br>
            <a href="passforget">Forgot your username? </a>
            <?php else: ?>
            <td>You are not logged in.</td>
            </tr>
            <tr>
                <td><a href="registration">Need to register?</a>
                    <td>
            </tr>
            </table>
            </form>
            <?php endif;?>
        </fieldset>
        <?php endif;?>
    </div>
</div>
