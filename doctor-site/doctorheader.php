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
    <title>Doctor header</title>
    <style>
        
        html, body {
            margin: 0;
            height: 100%;
        }
        #doctor-header-container {
            height: 100%;
            width: 12%;
            background-color: #272635;
            text-align: center;
            color: #A6A6A8;
            position: fixed;
        }
        .doctor-detail {
            height: 5%;
            line-height: 30px;
        }
        nav a,
        nav a:visited {
            display: block;
            width: 100%;
            height: 60px;
            color: #E8E9F3;
            text-decoration: none;
            line-height: 60px;
            border-bottom: 0.3px solid #A6A6A8;
            box-sizing: border-box;
        }
        nav a:hover {
            background-color: #A6A6A8;
            color: #272635;
        }

        .main-content{
            width: 12%;
        }

        #logout-form {
            margin-top: 20%;
        }
        #logout-form button{
            display: inline-block;
            width: 70%;
            height: 30px;
            border-radius: 5px;
            border: 0;
            padding: 0;
            font-size: 18px;
            background-color: red;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
   
    <div id="doctor-header-container">
        <div class="doctor-detail"><h2><?php echo $doctor?></h2></div>
        <nav>
            <a href="doctor_list.php">Doctor</a>
            <a href="doctor_schedule.php">Doctor Schedule</a>
            <a href="doctor_appointment.php">Appointment</a>
        </nav>

        <form method="post" id="logout-form">
            <button name="logout">Logout</button>
        </form>
    </div>
    </div>
</body>
</html>