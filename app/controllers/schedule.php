<?php
class Schedule  extends Controller {
    public function index() {
        $datesOnly = array();
        $listEventsForBooking;
        $searchEvents;

        // Get all events to display for everybody
        $allEvents = $this->model->getAllEvents();
        // Get only dates
        foreach ($allEvents as $event) {
            $datesOnly[] = $event[0];
        }
        // Unique dates for tab name
        $dates_unique = array_values(array_unique($datesOnly));

        // Instanciate Logic for schedule
        // The Overlap class puts overlapping events into separate arrays
        $mono = new Overlap($allEvents);
        // Get the result array
        $overlap_array = $mono->overlap;

        // Set for testing
        /* $listEventsForBooking = $this->model->listEventsForBooking('dave'); */
        // Display available events only for the logged in user
        if (isset($_SESSION['valid_user'])) {
            $listEventsForBooking = 
                $this->model->listEventsForBooking($_SESSION['valid_user']);
            // List User events for booking
            $rows_array = array();
            foreach ($listEventsForBooking as $var1) {
                $rows_array[] = $var1['date'];
            }
            $rows_no = array_unique($rows_array);
        }


        // Sidebar input search for events
        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        // Require the schedule view
        require(TEMPLATES_PATH . "head.php");
        require(TEMPLATES_PATH . "navigation.php");
        require APP . 'views/schedule_section1.php';
        require APP . 'views/schedule_section2.php';
        require TEMPLATES_PATH . 'sidebar_other.php';
        require(TEMPLATES_PATH . "footer.php");
    }

    // Book Events for the User
    public function book() {
        if (isset($_SESSION['valid_user'])) {
            if (!empty($_POST['vehicle'])){
                // When is it success or not?
                $bookingSuccess = $this->model->bookUserEvents($_SESSION['valid_user'],
                    $_POST['vehicle']);
            }
        }
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/eventsadd.php';
    }
}

