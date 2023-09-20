<?php
include 'protected.php';
?>
<?php 
    if (isset($_SESSION['mySession'])) {
        include('conn.php');
        $doctor = $_SESSION['mySession'];
    } 
    else {
        header("location: doctor(login).php");
    }

    if(isset($_POST["logout"])){
        session_destroy();
        header("location: doctor(login).php");
    } 
?>
<?php 
    include_once 'conn.php';

    if (!isset($_SESSION['mySession'])) {
        header("location: doctor(login).php");
    }

    if (!isset($_GET['appointment_id'])) {
        header("location: doctor_appointment.php");
    }
    $appointment_id = $_GET['appointment_id'];

    $result = mysqli_query($con, "SELECT * FROM appointment WHERE appointment_id = '$appointment_id'");
    if (mysqli_num_rows($result) == 0) {
        header("location: doctor_appointment.php");
    }
    $row = mysqli_fetch_assoc($result);

    if ($row['appointment_status'] == 'completed') {
        echo "<script>
                  alert('This appointment has already been completed.');
                  window.location.href='doctor_appointment.php';
              </script>";
    }
    

    if(isset($_POST["submit"])){

        $prescription_details = mysqli_real_escape_string($con, $_POST['prescription_details']);
        $bill_amount = mysqli_real_escape_string($con, $_POST['bill_amount']);

        $result = mysqli_query($con, "SELECT user_email FROM appointment WHERE appointment_id = '$appointment_id'");
        $row = mysqli_fetch_array($result);
        $user_email = $row['user_email'];
        
        require_once('fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Username: '.$user_email);
        $pdf->Ln();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Prescription Details:');
        $pdf->Ln();
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0, 10, $prescription_details);
        $pdf->Ln();
        $pdf->Cell(40,10,'Bill Amount: RS ' . number_format($bill_amount, 2));
        $pdf_contents = $pdf->Output('', 'S');

        mysqli_query($con, "UPDATE appointment SET appointment_status = 'completed' WHERE appointment_id = '$appointment_id'");

        $user_email = $row['user_email'];
        $stmt = mysqli_prepare($con, "UPDATE user SET prescription_bill = ? WHERE user_email = ?");
        mysqli_stmt_bind_param($stmt, "ss", $pdf_contents, $user_email);
        mysqli_stmt_execute($stmt);


        header("location: doctor_appointment.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <style>
        div#headerspace {
				display: inline-block;
				width: 12%;
				position: fixed;
			}
        div#main-content {

				width: 88%;
				display: inline-block;
				margin-left: 12%;
			}
            form {
    border-radius: 5px;
    padding: 20px;
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
    font-size: 36px;
    margin-bottom: 30px;
}

label {
    display: block;
    font-size: 20px;
    margin-bottom: 10px;
}

textarea, input[type="number"] {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    font-size: 18px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 18px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
    </style>
</head>
<div id="headerspace"><?php include_once('doctorheader.php');?></div>
<body>
    <div id="main-content" >
    <h1 style="background-color:aquamarine; margin:0 " >Prescription</h1>
    <form method="post">
        <label for="prescription_details">Prescription Details:</label>
        <textarea id="prescription_details" name="prescription_details" rows="10" cols="50" required></textarea><br><br>
        <label for="bill_amount">Bill Amount:</label>
        <input type="number" id="bill_amount" name="bill_amount" required><br><br>
        <input type="submit" name="submit" value="Send Prescription">
    </form>
    </div>
</body>
</html>
