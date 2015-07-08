<!--Booking Events that user havent booked Yet-->
<div id="newsid1">
    <?php // List User events for booking ?>
    <?php if (isset($listEventsForBooking)): ?>
    <h1>Book Upcomming Events</h1>
    <form name="form2" method="post" action="schedule/book">
        <?php foreach ($rows_no as $val1): ?>
        <p class="event_date">
            <?php echo $val1 ?>
        </p>
        <table border="1">
            <?php foreach ($listEventsForBooking as $val): ?>
            <?php if ($val1==$val[ 'date']): ?>
            <tr>
                <td>
                    <p class="event_input">
                        <input class="checks" type="checkbox" name="vehicle[]"
                        value="<?php echo $val['eventid']; ?>">
                </td>
                <td>
                    <?php echo $val[ 'eventid'];?>
                </td>
                <td>
                    <?php echo $val[ 'title']; ?>
                </td>
                <td>
                    <?php echo $val[ 'starttime'] ?>
                    </p>
                </td>
            </tr>
            <?php endif;?>
            <?php endforeach;?>
        </table>
        <?php endforeach;?>
        <input type="submit" name="submit" value="Book">
    </form>
    <?php endif; ?>
</div>
</div>
