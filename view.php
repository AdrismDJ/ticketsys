<?php
$title = 'View Tickets';

require_once 'includes/header.php';
require_once 'includes/auth_check.php'; 
require_once 'db/conn.php';

// Get attendee by Id
if (!isset($_GET['folio'])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $folio = $_GET['folio'];
    $result = $crud->getTicketDetails($folio); 
?>


    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">Folio: <?php echo $result['folio']; ?></h5>
            <h6 class="card-subtitle mb-3 text-muted">Cliente: <?php echo $result['cliente']; ?></h6>
            <p class="card-text">
                Correo: <?php echo $result['correo']; ?><br>
                Teléfono: <?php echo $result['telefono']; ?>
                Equipo: <?php echo $result['correo']; ?><br>
                Número de Serie: <?php echo $result['correo']; ?><br>
                Servicio: <?php echo $result['correo']; ?><br>
                Precio Estimado: <?php echo $result['correo']; ?><br>
                Descripción: <?php echo $result['correo']; ?><br>
                Actualizado: <?php echo $result['actualizado']; ?><br>
                Estatus: <?php echo $result['correo']; ?><br>
                
            </p>
        </div>
    </div>

    <br>
    <a href="dashboard.php" class="btn btn-info">Regreso</a>

<?php } ?>

<?php require_once 'includes/footer.php'; ?>