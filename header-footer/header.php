<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <style>
        body {
            font-family: "Microsoft yahei";
            margin: 0;
        }
        #fixedheader {
            position: fixed;
            width: 100%;
        }
        a, a:visited {
            text-decoration: none;
            color:#275A84;
        }
        .header1 {
            height: 60px;
            background-color: #2C2C2C;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .header1 div:nth-child(1) {
            margin-left: 8%;            
            font-size: 14px;
        }
        .w{
            color: beige;            
            line-height: 60px; 
            text-decoration: solid;     
        }
        .header1 div:nth-child(2) {
            margin-right: 8%;            
        }
        .header1 a, .header1 a:visited {
            height: 60px;      
            width: auto;
            padding: 0px 20px;
            line-height: 60px;
            background: blue;        
            text-align: center;
            color: white;
            display: inline-block;
        }
        .header2 {
            background-color: white;
            border-bottom-style: solid;
            border-bottom-width: 1px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .home {
            margin-left: 8%;

        }
        .home img {
            height: 70px;
            width: 110px;
            border-radius: 50%;
        }
        .headernav {
            margin-right: 8%;
        }
        .headernav a {
            line-height: 70px;
            padding: 0px 20px;
            height: 70px;
            display: inline-block;
        }
        .headernav a:hover{
            background-color: lightgray;
            color: black;
        }
        .dropdown {

            display: inline-block;
        }
        .dropdown a {
            padding: 0px 20px;
        }
        #dropdown_content {
            display: none;
            position: absolute;
        }
        #dropdown_content>a {
            display: block;
            background-color: white;
            color: #275A84;
        }
        #dropdown_content>a:hover {
            background-color: lightgray;
            color: black;
        }
        .dropdown:hover #dropdown_content {display: block;}
    </style>
</head>
<body>
    <div id="fixedheader">
        <div class="header1">
            <div>
                <h2><span class="w">WELCOME TO OUR WEBSITE</span><br></h2>
            </div>
            <div>
                <?php 
                if (isset($_SESSION['user'])) {
                    include('conn.php');
                    $user_email = $_SESSION['user'];
                    $sql = "SELECT user_first_name, user_last_name
                            FROM user WHERE user_email = '$user_email'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    echo "<a href='user_profile.php'>".$row['user_first_name']. " " . $row['user_last_name']."</a>";
                    mysqli_close($con);
                } else {
                    echo "<a href='login.php'>Login (or) Sign up</a>";
                }
                ?>
                
            </div>
        </div>

        <div class="header2">
            <div class="home">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="index.php"><img src="media\home.png"></a>
            </div>
            
            <div class="headernav">
                <div class="dropdown">
                <a href="appointment.php">Your Appointments</a>
                    <div id="dropdown_content">
                        <a href="makeappointment.php">Make&nbsp;appointment</a>
                    </div>
                </div>
                <div class="dropdown">
                <a disabled>Medical service</a>
                    <div id="dropdown_content">
                        <a href="common_med.php">Common Medications</a>
                    </div>
                </div>
                <a href="faq.php">FAQ</a>
            </div>
        </div>
    </div>
</body>
</html>