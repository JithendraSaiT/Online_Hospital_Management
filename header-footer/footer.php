<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>footer</title>
    <style>
        * {
            font-family: "Microsoft yahei";
            margin: 0px;
        }
        .footer-container {
            width: 75%;            
            height: 40%;
            display: flex;
            flex-direction: column;
            margin: 0px auto;
        } 
        .footer-logo img {
            height: 70px;
            display: inline-block;
        }
        .footer-link {
            display: flex;
            height: auto;
            width: 100%;
        }
        .footer-link>div {
            width: 30%;
        }
        .footer-link ul {
            padding: 0;
        }
        .footer-link li {
            list-style-type: none;
            line-height: 45px;
        }
        .footer-link a,
        .footer-link a:visited {
            text-decoration: 0;
            color: #275A84;
            height: 45px;
        }
        .footer-link a:hover {
            background-color: lightgray;
            color: black;
        }
        #mostright {
            width: auto;
        }
        .fcontainer{
            display:flex;
            margin:0px 50px 10px 50px;
            flex-wrap:wrap;
        }
        .fcontainer div{
            padding:10px;
            width:auto;
            height:auto;
            margin:20px;
        }
        .ftext-col{
            flex:3;
            line-height:1.5;
            text-align: justify;
        }
        .ftext-col p{
            color: #999999;
            font-family: 'Cabin', sans-serif;
        }
        .fcenter{
            text-align:center;
        }
        .fbox{
            border-radius:15px;
            background-color:#275A84;
            max-width:350px;
        }
    </style>
</head>
<body>
    <hr><br>
        <div class="footer-link">
            <div>
                <ul>
                    <li><a disabled>Medical Service</a></li>
                    <li><a href="common_med.php">Common Medications</a></li>
                </ul>
            </div>
            <div>
                <ul>
                   <li><a href="appointment.php">Appointment</a></li>
                    <li><a href="appointment.php">My&nbsp;appointment</a></li>
                    <li><a href="makeappointment.php">Make&nbsp;appointment</a></li> 
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </div>
            <div class="h1">Our social media</div><br>
        <div class="fcontainer" style="justify-content:center">
            <div class="ftext-col fcenter fbox"><a target="_blank" href="https://www.instagram.com" style="color:white">Follow us on Instagram</a></div>
            <div class="ftext-col fcenter fbox"><a target="_blank" href="https://www.facebook.com" style="color:white">Follow us on Facebook</a></div>
        </div><br><br>
        </div>
    </div>
    <br><br>
</body>
</html>
