<?php 
    session_start();
?>
<!DOCTYPE html>
    <head>
        <title>EHC HOSPITAL</title>

        <style>
        div#headerspace {
                height: 130px;
        }
        .main_page_img {
            display:block;
            margin:10px auto;
            width:1000px;
            max-width: 100%;
            height: auto;
            border-radius:10px;
        }
        div.h1{
            font-family: "Microsoft yahei";
            font-size:30px;
            font-weight: 900;
            text-align:center;
        }
        .container{
            display:flex;
            margin:0px 50px 10px 50px;
            flex-wrap:wrap;
        }
        .container div{
            padding:10px;
            width:auto;
            height:auto;
            margin:20px;
        }
        .img-col{
            flex:2;
        }
        .img-col img{
            max-width: 100%;
            max-height: 100%;
            min-width:100px;
        }
        .text-col{
            flex:3;
            line-height:1.5;
            text-align: justify;
        }
        .text-col p{
            color: #999999;
            font-family: 'Cabin', sans-serif;
        }
        .center{
            text-align:center;
        }
        .box{
            border-radius:15px;
            background-color:#275A84;
            max-width:350px;
        }
        .patientview{
            flex-direction:column;
        }
        .star{
            color:orange;
        }
        </style>
        
        <div id="headerspace"><?php include_once("header-footer/header.php"); ?> </div>
    </head>

    <body>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Cabin:ital@1&display=swap" rel="stylesheet">

        <img class="main_page_img" src="media/mainpage.png" alt="Picture1"><br><br>

        <div class="h1">How to make an appointment</div>
        <div class="container">
            <div class="img-col center">
              <img src="media/circle1.png" alt=""><br>
              <img src="media/step-img1.png" alt="" style="height:auto; max-width:100%"><br>
              Get an account
            </div>
            <div class="img-col center">
              <img src="media/circle2.png" alt="">
              <img src="media/stepimg2.png" alt="" style="height:auto; max-width:100%"><br><br><br><br>
              Go make appointment page
            </div>
            <div class="img-col center">
              <img src="media/circle3.png" alt="">
              <img src="media/stepimage3.png" alt="" style="height:auto; max-width:100%"><br><br><br><br><br><br><br>
              Choose your doctor, preferred date and time
            </div>
            <div class="img-col center">
              <img src="media/circle4.png" alt="">
              <img src="media/step-img4.png" alt="" style="height:auto; max-width:100%"><br>
              Done. Your appointment is confirmed
            </div>
        </div><br><br>
        <?php 
                if (isset($_SESSION['user'])) { ?>
                <div class="container" style="justify-content:center">
                    <div class="text-col center box"><a href="makeappointment.php" style="color:white;">Make an Appointment</a></div>
                </div><br><br><br>
                <?php 
                } else { ?>
                    <div class="container" style="justify-content:center">
                        <div class="text-col center box"><a href="login.php" style="color:white;">Make an Appointment</a></div>
                        <div class="center">Or</div>
                        <div class="text-col center box"><a href="login.php" style="color:white;">Login | Sign up</a></div>
                    </div><br><br><br>
                <?php } ?>

<br><br>
        <div><?php include_once("header-footer/footer.php"); ?></div>
    </body>
</html>