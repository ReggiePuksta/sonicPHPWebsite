<div id="news">
    <div id="news_mini">
        <h1> Your Orders!!</h1>
        <table border="1">
            <?php if (isset($userEventData)): ?>
                <?php foreach ($userEventData as $row):?>
                <?php $_SESSION['orderss']=$row['orderid']; ?>
                <tr>
                    <td>
                        <?php echo $row[ 'title']; ?>
                    </td>
                    <td>
                        <?php echo $row[ 'starttime']; ?>
                    </td>
                    <td>
                        <form action="myevents/delete" method="post">
                            <input type="submit" name="upvot" value="Delete" />
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <br>
        <a href="schedule">Go back to Events</a> 
        <br>
        <a href="home">Return to Main Page</a>
    </div>
</div>
</body>
</html>
