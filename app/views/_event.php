<div id="news">
    <div class="news_left2">
        <h1><?PHP echo $rows[1]?></h1></br><div class="underline3"></div>
        <h3>Date: <?PHP echo $rows[2]?></h3>
        <h3>Event time: <?PHP echo $rows[3],' - ',$rows[4]?></h3>
        <h3>Venue: <?PHP echo $rows[5]?></h3><div class="underline3"></div>
         <h3>Event detail:</h3>
        <?PHP if (isset($rows[8])){ ?>
            <img class="event_img" src="../images/'.$rows[8].'.jpg">
        <?php } ?>
            <?php echo $rows[6]; ?>
            <?php if (isset($rows[7])){ ?>
               <div class="underline3"></div>
               <?php echo $rows[7]; ?>
            <?php } ?>      
        <div class="underline3"></div>

        <h2>Return to: <h2>
        <h3><a href="<?php echo URL;?>schedule">Get back to the schedule!</a></h3>
        <h3><a href="<?php echo URL;?>home">Home page!</a></h3>
    </div>
</div>
