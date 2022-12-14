<?php
$title = 'TicketSys';

require_once "includes/header.php";
require_once "db/conn.php";

//If data was submitted via a form POST request, then... 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $new_password = md5($password . $username);

    //$result = $user->getUser($username, $new_password); //With extre security
    $result = $user->getUser($username, $password);
    if (!$result) {
        echo '<div class="alert alert-danger">Username or Password is incorrect: Please try again. </div>';
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['id'];
        header("Location: dashboard.php");
    }
}

?>

<h1 class="text-center"><?php echo $title ?> </h1>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <table class="table table-sm">
        <tr>
            <td><label for="username">Usuario: * </label></td>
            <td><input type="text" name="username" class="form-control" id="username" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
            </td>
        </tr>
        <tr>
            <td><label for="password">Contraseña: * </label></td>
            <td><input type="password" name="password" class="form-control" id="password">
            </td>
        </tr>
    </table><br /><br />
    <div class="d-grid gap-2">
        <input type="submit" value="Acceder" class="btn btn-primary btn-block">
    </div><br />
    <a href="#"> Recuperar Contraseña </a>

</form>

<?php include_once "includes/footer.php" ?>

