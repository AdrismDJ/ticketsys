<?php

$title = 'Success';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    //extract values from the $_POST array
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];
    //Call function to insert and track if success or not
    $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);

    if ($isSuccess) {
        include 'includes/successmessage.php';
    } else {
        include 'includes/errormessage.php';
    }
}
?>



<!-- No longer using the $_GET super variable, but using $_POST for more security -->

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $_POST['firstname'] . " " . $_POST['lastname']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['specialty']; ?></h6>
        <p class="card-text">
            Date of Birth: <?php echo $_POST['dob']; ?><br>
            Email: <?php echo $_POST['email']; ?><br>
            Contact Number: <?php echo $_POST['phone']; ?>
        </p>
    </div>
</div>

<!-- Usage of GET "just for demostration as the site is using POST now"
<?php

// echo $_GET['firstname'];
// echo $_GET['lastname'];
// echo $_GET['specialty'];
// echo $_GET['dob'];
// echo $_GET['email'];
// echo $_GET['phone'];

?>
-->


<?php
require_once "includes/footer.php";
?>