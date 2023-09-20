<?php
    session_start();
?>
<?php
    include("../conn.php");


    $id = $_GET['appointment_id'];

    $result = mysqli_query($con,"DELETE FROM appointment WHERE appointment_id=$id");

    mysqli_close($con); 
    header('Location: ../appointment.php'); 

?>