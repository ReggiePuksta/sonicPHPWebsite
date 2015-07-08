<div id ="news">
    <div id="news_left">
        <?php if (isset($_SESSION['valid_user'])) {
            if (!empty($_POST['vehicle'])){
                $rc = count($_POST['vehicle']);?>
                <p>You are logged in as: <?php echo $_SESSION['valid_user']; ?>
                    </p><h2>You have booked <?php echo $rc; ?> event(s)</h2>
                        <p><a href ="<?php echo URL?>schedule">Go back to Events</a></p>
                <?php } else { ?>
               You didnt not select any events
               <p><a href ="<?php echo URL;?>schedule">Go back to events</a></p>
               <?php }?>
       <?php } else { ?>
           <div id="news_mini">
                <h1>You are not logged in!</h1>
                <p>You need to <a href ="home">Log in</a>
                to order the tickets! If you need to register please go 
                <a href ="<?php echo URL; ?>registration"> Here</a></p>
                <h2><a href ="<?php echo URL; ?>home">Go back to Home page</a></h2>
            </div>
       <?php } ?>
   </div>
</div>
