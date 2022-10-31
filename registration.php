<?php
$title = 'Index';
require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

$results = $crud->getSpecialties();
?>

<!--
    - First Name. 
    - Last Name. 
    - Date of Birth (Use DatePicker). 
    - Speciality (Database Admin, Software Developer, Web Administrator, Other). 
    - Email Address. 
    - Contact Number. 
-->

<h1 class="text-center">Registrar Ticket </h1>

<!-- GET and POST need the property name to recognize the value that was submitted -->
<!-- Using GET will post it in the URL, but is really insecure to use this, better use POST -->
<form method="post" action="success.php">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input required type="text" class="form-control" id="firstName" name="firstname">
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input required login attempstype="text" class="form-control" id="lastName" name="lastname">
    </div>
    <div class=" mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob">
    </div>

    <div class="mb-3">
        <label for="specialty" class="form-label">Area of Expertise</label>
        <select class="form-select" aria-label="Default select example" id="specialty" name="specialty">

            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name']; ?></option>
            <?php } ?>
            <!--
            <option value="1">Database Admin</option>
            <option value="2">Software Developer</option>
            <option value="3">Web Administrator</option>
            <option value="4">Other</option>

            -->
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="d-grid gap-2">
        <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
</form>



<?php
require_once "includes/footer.php";
?>