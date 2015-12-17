<div id="news">
    <div class="news_left">
        <h2>Event Schedule</h2>
        <!-- twitter bootstrap tabs-->
        <ul id="myTab" class="nav nav-tabs">
            <?PHP // Make first tab active ?>
            <?php foreach ($dates_unique as $key=>$tab_date): ?>
            <li <?php if ($key==0 ) echo 'class="active"';?>>
                <a data-toggle="tab" href="#section<?php echo $key + 1;?>">
                    <?php echo $tab_date; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content">
            <?php // Display pannel content dynamically according to the received data ?>
            <?php // TODO simplify template ?>
            <?php foreach ($dates_unique as $key=>$dates): ?>
            <div id="section<?php echo $key + 1;?>" class="tab-pane fade <?php if($key == 0) echo 'in active';?>">
                <?php foreach ($overlap_array as $row): ?>
<?php
// If Event date matches with the date from the dates_unique array
// create a row
// If Not this will be skipped and a new section will be created
?>
                    <?php if ($dates == $row[0][0]): ?>
                    <div class="rows">
                        <?php foreach ($row as $event): ?>
                            <?php $left=(($event[3] - 36000) / 468) + 0.1; $width=(($event[4] / 468) - 0.4); ?>
                            <?php if ($event[4]>9000): ?>
                                <a href="event/<?php echo $event[6];?>">
                                <div style="width:<?php echo $width;?>%; left:<?php echo $left;?>%;" class="collumn">
                                    <?php echo $event[5] . ' ' . $event[1] . ' - ' . $event[2].  ' ' . $event[0];?>
                                </div></a>
                            <?php else: ?>
                                <a href="event/<?php echo $event[6];?>"><div style="width:<?php echo $width; ?>%; left:<?php echo $left;?>%;
                                    text-overflow: ellipsis; -o-text-overflow: ellipsis; font-size:0.8em;  " class="collumn">
                                <?php echo $event[5]; ?>
                                </div></a>
                            <?php endif; ?>
                        <?php endforeach;?>
                        <br>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <ul class="ruler">
            <li>10h</li><li>11h</li><li>12h</li><li>13h</li><li>14h</li><li>15h</li><li>16h</li><li>17h</li><li>18h</li><li>19h</li><li>20h</li><li>21h</li><li>22h</li> <li>23h</li>
        </ul>
