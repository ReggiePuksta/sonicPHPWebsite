<div id="news">
    <div id="news_mini">
<!--<h1> Picture Status!!</h1>
       <a href="word.pdf">Add type all PDF</a>
       <form action="upload.php" method="POST" enctype="multipart/form-data"/>
       <label>User FIle</label>
       <input type="hidden" name="MAX_FILE_SIZE" value="4000000"/>
       <input type="file" name="userfile" id="userfile"/>
       <input type="submit" value="Send File">
    </form>-->
        <?php if (!empty($_SESSION ['valid_user'])): ?>
            <h3>Please choose your image: </h3>
            <form name='upload' action='uploadAvatar/save' method='post'
                enctype='multipart/form-data'>
                    <input id="fileup" name='file' type='file' />
                    <input type='submit' value='Add Image'/>
            </form>
        <?php else: ?>
            You are currently not logged in! <br>
        <?php endif; ?>
        <h3>
            <a href="home">Return to the main page!</a>
        </h3>
    </div>
</div>
