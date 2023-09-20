<?php 
session_start();
if(isset($_SESSION['user'])) {
    include('conn.php');
    $user_email = $_SESSION['user'];
    $appointment_id = $_GET['appointment_id'];

    $sql = "SELECT a.appointment_id, a.appointment_status, u.prescription_bill
            FROM appointment a, user u
            WHERE a.user_email = u.user_email AND a.user_email = '$user_email' AND a.appointment_id = $appointment_id";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_array($result);

    $status = $rows['appointment_status'];
    $bill = $rows['prescription_bill'];

    if ($status == 'booked') {
        $status = 'Appointment Booked';
    } elseif ($status == 'cancelled') {
        $status = 'Appointment Cancelled';
    } elseif ($status == 'completed') {
        $status = 'Appointment Completed';
    } else {
        $status = 'Unknown';
    }

    if ($bill != null) {
        $filename = "prescription_bill_" . $appointment_id . ".pdf";
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        echo $bill;
        exit();
    }
    mysqli_close($con);
} else {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointment Status</title>
</head>
<body>
    <h1>Appointment Status</h1>
    <p>Appointment ID: <?php echo $appointment_id; ?></p>
    <p>Status: <?php echo $status; ?></p>
    <?php if ($bill != null) { ?>
        <a href="view_status.php?appointment_id=<?php echo $appointment_id; ?>&download=true">Download Prescription Bill</a>
    <?php } ?>
</body>
</html>
