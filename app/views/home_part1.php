<!-- part1 = header-->
<div id="part1" class="row">
    <div class="hidden-xs col-sm-6">
        <h2 id="part1_text1">21st - 24th of March</h2>
        <h2 id="part1_text2">University of Salford</h2>
    </div>
    <div class="col-sm-6">
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
            <?php $_SESSION[ 'orderss']=$row->orderid; ?>
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
        <!-- <h3 class="text-center"><a href="login">Login</a> or <a href="login">Register</a> to get tickets</h3> -->
        <!-- <a href="register"><h2>Register</h2></a> -->
        <ul id="tabMiddle" class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#login">Login</a>
            </li>
            <li><a data-toggle="tab" href="#register">Register</a>
            </li>
        </ul>
        <!-- <div class="underline"></div> -->
        <div class="tab-content">
            <div id="login" class="tab-pane fade in active">
                <fieldset>
                    <form name="form2" method="post" action="index.php">
                        <input type="text" name="form_nickname" maxlength="20" placeholder="Username"/>
                        <input type="password" name="form_password" maxlength="20" placeholder="Password"/>
                        <input type="submit" name="submit" value="Log in" />
                        <?php if(isset($_POST[ 'form_nickname'])): ?>
                        <p>Could not log you in. Or you need to <a href="register.php"> Register</a>
                        </p>
                    </form>
                    <a href="passforget">Forgot your password?</a>
                    <br>
                    <a href="passforget">Forgot your username? </a>
                    <?php else: ?>
                    </form>
                    <?php endif;?>
                </fieldset>
            </div>
            <div id="register" class="tab-pane fade">
                <fieldset>
                    <form name="registration" action="register.php" method="post">
                        <input type="text" name="form_nickname" placeholder="Username"/>
                        <input type="password" name="password" placeholder="Password"/>
                        <input type="password" name="password_confirm" placeholder="Confirm Password"/>
                        <input type="email" name="email" placeholder="Email address"/>
                        <input type="submit" name="submit" value="Register" />

                    </form>
                </fieldset>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>
