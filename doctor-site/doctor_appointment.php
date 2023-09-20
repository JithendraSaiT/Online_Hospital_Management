<?php include 'protected.php'; ?>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        body {
            height: 100%;
            margin: 0;
        }
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

        h1 {
            background-color: blue;
            color: aliceblue;
            margin-top: 0px;
            font-size: 36px;
            font-family: 'Times New Roman', Times, serif;
        }

        table,
        th,
        td {
            font-family: 'Times New Roman', Times, serif;
            font-size: 18px;
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 95%;
            margin: 0 auto;
        }

        th {
            height: 70px;
        }

        td {
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="headerspace"><?php include_once('doctorheader.php');?></div>
    <div id="main-content">
    <div>
        <h1><br>Appointment List</h1>
    </div>

    <table>
        <tr>
            <th>Appointment ID</th>
            <th>User Email</th>
            <th>Doctor Schedule ID</th>
            <th>Appointment Time</th>
            <th>Appointment Status</th>
            <th>User Reason</th>
            <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($con, "SELECT a.*
        FROM appointment a
        JOIN doctor_schedule ds ON a.doc_schedule_id = ds.doc_schedule_id
        JOIN doctor d ON ds.doctor_id = d.doctor_id
        WHERE d.username = '$doctor'");

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";

            echo "<td>";
            echo $row['appointment_id'];
            echo "</td>";

            echo "<td>";
            echo $row['user_email'];
            echo "</td>";

            echo "<td>";
            echo $row['doc_schedule_id'];
            echo "</td>";

            echo "<td>";
            echo $row['appointment_time'];
            echo "</td>";

            echo "<td>";
            echo $row['appointment_status'];
            echo "</td>";

            echo "<td>";
            echo $row['user_reason'];
            echo "</td>";

            echo "<td>";
            echo "<a href=\"../doctor-site/prescription.php?appointment_id=";
            echo $row['appointment_id'];
            echo "\">Consult<br></a>";
        }
        mysqli_close($con);
        ?>
    </table>
    </div>
</body>

</html>