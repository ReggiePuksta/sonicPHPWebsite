<?php
class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    /**
     * Check if user exists
     * @param string $userName
     * @param string $userPass
     * return user object
     */
    public function getUserSession($userName, $userPass) {
        $query = 'SELECT * FROM users WHERE username=:nickname AND password=:pass';
        $result = $this->db->prepare($query);
        $result->execute(array(
            ':nickname' => $userName,
            ':pass' => sha1($userPass)
        ));
        return $result->fetch();
    }

    /*
     * Get User Avatar URL
     * @param string $sessionUser
     * return string Avatar picture URL
     */
    public function getUserAvatarUrl($sessionUser) {
        $query = 'SELECT users.avatar FROM users WHERE username=:nickname and users.avatar IS NOT NULL';
        $result= $this->db->prepare($query);
        $result -> execute(array(':nickname' => $sessionUser));
        return $result -> fetch();
    }

    /*
     * Insert User Avatar URL into the Users database
     * @param string $sessionUser
     * return string Avatar picture URL
     */
    public function insertUserAvatarUrl($userName, $avatarUrl) {
        $query = 'UPDATE users SET avatar = :avatar WHERE username=:nickname';
        $result = $this->db->prepare($query);
        return $result->execute(array(':nickname' => $userName,
            ':avatar' => $avatarUrl));
    }

    public function getEventsData($userName) {
        $query = 'SELECT events.title, orders.orderid, events.starttime, events.date'
            .' FROM events, orders, users WHERE events.eventid = orders.eventid'
            .' AND users.customerid=orders.customerid AND username=:user'
            .' ORDER BY events.date, events.starttime LIMIT 1';
        $result2 = $this->db->prepare($query);
        $result2->execute(array(':user' => $userName));
        return $result2->fetchAll();
    }

    // Sidebar search
    public function searchEvents($searchInput) {
        $query = 'SELECT title, date, starttime, endtime, eventid FROM events WHERE title LIKE :search';
        $result = $this->db->prepare($query);
        $result->execute(array(':search' => '%' . $searchInput . '%'));
        return $result->fetchAll(PDO::FETCH_NUM);
    }

    /**** Schedule Page ****/

    // Gather all events formated into an Array with the following keys:
    // ['date'] - Event date in the "2014-04-21" format
    // ['starttime'] - Event starting time as "10:00:00"
    // ['endtime'] - Event ending time as "14:00:00"
    // ['starttime_in_sec'] Event startime expressed in seconds "36000"
    // ['difference_in_sec'] - Event duration in seconds "14400"
    // ['title'] - Event title eg. "Listening cities"
    // ['eventid'] - Event ID used for creating dynamic event pages. eg. "1"
    public function getAllEvents() {
        $query = 'SELECT events.date, events.starttime, events.endtime,'
            . ' TIME_TO_SEC(events.starttime) AS starttime_in_sec,'
            . ' TIME_TO_SEC(Timediff(events.endtime, events.starttime))'
            . ' AS diffrence_in_sec,'
            . ' events.title, events.eventid FROM events'
            . ' ORDER BY events.date, events.starttime';
        $result = $this->db->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_NUM);
    }

    public function listEventsForBooking($userName) {
        $query = 'SELECT events.eventid, events.title, events.starttime, events.date'
            . ' FROM events WHERE'
            . ' NOT EXISTS (SELECT orders.eventid FROM orders, users'
            . ' WHERE username=:user AND users.customerid = orders.customerid'
            . ' AND events.eventid = orders.eventid) ORDER BY events.eventid';
        $result = $this->db->prepare($query);
        $result->execute(array(':user' => $userName));
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    // Registration Page
    public function checkUserNameExists($userName) {
        $query = 'SELECT users.username FROM users WHERE username = :user';
        $result = $this->db->prepare($query);
        $result->execute(array(':user'=> trim($userName)));
        return $result->fetch();
    }

    public function createUser($userName, $userPassword, $userFirstName,
        $userLastName, $userEmail) {
            $query = 'INSERT INTO users(username, password, firstname, lastname, email)
                VALUES (:nickname, :pass, :firstname, :lastname, :email)';
            $result = $this->db->prepare($query);
            $result->execute(array(':nickname' => trim($_POST['form_nickname']),
                ':pass' => sha1(trim($_POST['form_password'])),
                ':firstname' => trim($_POST['form_firstname']),
                ':lastname' => trim($_POST['form_lastname']),
                ':email' => trim($_POST['form_email'])));
        }

    // Single Event Page
    public function getEventById($id) {
        $query = 'SELECT * FROM events WHERE eventid=:id';
        $result = $this->db->prepare($query);
        $result->execute(array(':id' =>$id));
        return $result->fetch(PDO::FETCH_NUM);
    }

    public function getUserEvents($userName) {
        $result2 = $this->db->prepare('SELECT events.title, orders.orderid,'
            .' events.starttime FROM events, orders, users'
            .' WHERE events.eventid = orders.eventid'
            .' AND users.customerid=orders.customerid AND username=:user');
        $result2->execute(array(':user' => $userName));
        return $result2->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteUserEvent($event){
        $result = $this->db->prepare('DELETE FROM orders WHERE orders.orderid =:orderid');
        $result->execute(array(':orderid' =>$_SESSION['orderss']));
    }

    public function bookUserEvents($userName, $eventIdsArray) {
        // Build a query for multiple SELECTs
        // Use INSERT INTO SELECT statement as replacement for two separate
        // queries for SELECT and then INSERT
        $length = count($eventIdsArray);
        $query ='INSERT INTO orders (customerid, eventid)';
        for ($i = 0 ; $i < $length ; $i++) {
            // Dont append UNION on the last SELECT statement
            $union = ($i + 1 < $length) ? ' UNION': '';
            $query .= ' SELECT customerid, eventid FROM users, events'
                .' WHERE users.username=:user AND events.eventid=:eventid'.$i
                /* .' AND NOT EXISTs (SELECT eventid FROM orders' */
                /* .' WHERE orders.eventid=:eventid'.$i.' AND orders.customerid=:user)' */
                . $union;
        }
        var_dump($eventIdsArray);
        var_dump($query);
        $result1 = $this->db->prepare($query);
        $result1->bindValue(':user', $userName);
        for ($i= 0; $i < $length; $i++) {
            $result1->bindValue(':eventid'.$i, $eventIdsArray[$i]);
        }
        return $result1->execute();
    }

    public function getUserPass($userName) {
        $this->db = db_connect('localhost', 'sonic_fusion', 'DAtReggie', 'pass([secure])');
        $query = "SELECT users.password FROM users WHERE username=:user";
        $result = $this->db->prepare($query);
        $result->execute(array(':user' => $userName));
        return $result->fetch()[0];
    }

    public function updateUserPass($userName, $newUserPass) {
        $query = "UPDATE users SET password = :newpass WHERE username=:user";
        $result = $this->db->prepare($query);
        return $result->execute(array(
            ':user' => $userName,
            ':newpass' => trim(sha1($newUserPass))
        ));

    }

}

?>
