<div id="news">
    <div id="news_mini">
        <h1> Log out status!!</h1>
        <br/>
        <?php if (empty($_SESSION ['valid_user'])): ?>
            You have been succesfuly logged Out. Thank you for choosing our services!
            <br/>
        <?php else: ?>
            You are already logged out! Pleass come back again!
            <br/>
        <?php endif; ?>
        <a href="home">Return to the main page!</a>
    </div>
</div>
</body>

</html>
