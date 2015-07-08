<div id="news">
    <div id="news_mini">
        <?php if (isset($_SESSION[ 'orderss'])): ?>
        You have successfully deleted your event
        <p><a href="<?php echo URL;?>myevents">My events list</a>
        </p>
        <p><a href="<?php echo URL;?>home">Go back to the main page</a>
        </p>
        <?php endif; ?>
    </div>
</div>
