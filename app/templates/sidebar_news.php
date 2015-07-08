<div id="news_mini">
    <h3>Account settings</h3>
    <?php if (isset($_SESSION[ 'valid_user'])): ?>
        <h2>You are logged in as:
            <span id="logname"><?php echo $_SESSION['valid_user']; ?></span>
        </h2>
        <div class="underline"></div>
        <ul class="list-unstyled">
        <li><a href="<?php echo URL;?>myevents">View your tickets</a>
            </li>
            <li><a href="<?php echo URL;?>logout">Logout out</a>
            </li>
        </ul>
    <?php else: ?>
        You are not logged in Please login <a href="index.php">here</a>
    <?php endif; ?>
    <h3>Search for Your favorite events</h3>
    <form action="" method="get">
        <input type="text" id="search" name="search"></input>
        <input type="submit" value="Search">
        <?php if (!(empty($_GET[ 'search']))): ?>
            <?php if ($searchEvents): ?>
                Searched for:
                <?php echo $_GET[ 'search']; ?>
                </br>
                <?php foreach($searchEvents as $event):?>
                    <a href="event/<?php echo $event[4];?>">
                        <?php echo $event[0], ' ', $event[1], ' ', $event[2]; ?>
                    </a>
                    </br>
                <?php endforeach;?>
            <?php endif; ?>
            Nothing was found
        <?php endif; ?>
    </form>
    <h3>Download brochure</h3>
    <a href="files/sonic_fusion_brochure.pdf" class="sprite" id="sprite4"></a>
    <a href="files/sonic_fusion_table.pdf" class="sprite" id="sprite5"></a>
    <h3>Stay connected</h3>
    <a href="https://www.facebook.com/events/164169230401723" class="sprite" id="sprite1"></a>
    <a href="https://twitter.com/SonicFusionFest" class="sprite" id="sprite2"></a>
    <a href="https://soundcloud.com/sonicfusionfestival" class="sprite" id="sprite3"></a>
    <h3>Latest tweets</h3>
    <a class="twitter-timeline" href="https://twitter.com/nettuts" data-widget-id="442833825635110912">Tweets by @nettuts</a>
</div>
</div>
