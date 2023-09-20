<?php include('protected.php');?>
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
<head>
  <style>
    tr {
      height:50px;
    }
    #form{
      height:auto;
      width:400px;
      margin:30px auto 30px auto;
      border:2px #73AD21 solid;
      border-radius:20px;
      padding:0px 20px 20px 20px;
    }
    button{
      border-radius:20px;
      border:2px #73AD21 solid;
      width:100px;
      flex:2;
      height:30px;
      cursor: pointer;
    }
    .blank{
      flex:1;
    }
    .cancel,
        .cancel:visited {
            color: black;
        }
    #container{
      display:flex;
    }
  </style>
</head>
<body>
  <form action="doctor-schedule-insert.php" class="form-container" method="post">
    <div id="form">
      <h1>Add Doctor Schedule Data</h1>
      <table>
        <tr>
          <td><label for="Doctor"><b>Select Doctor</b></label></td>       
          <td><select id="Doctor" name="doctor_id">
              <?php
                  include("conn.php");
                  $doctor_detail = mysqli_query($con,"SELECT doctor_id, doctor_name
                  FROM doctor
                  WHERE username = '$doctor'");
                  while($row = mysqli_fetch_array($doctor_detail))
                  {
                      echo"<option value=\"".  $row['doctor_id']. "\">";
                      echo $row['doctor_id'];
                      echo ".  " .$row['doctor_name'];
                      echo"</option>";
                  }
              ?>
              </select></td>
        </tr>
                  
        <tr>
          <td><label for="Sch_date"><b>Schedule Date</b></label></td>
          <td><input type="date" id="Sch_date" required name="schedule_date"></td>
        </tr>

        <tr>
          <td><label for="start_time"><b>Start Time</b></label></td>
          <td><input type="time" id="start_time" name="sche_start_time"  required></td>
        </tr>

        <tr>
          <td><label for="end_time"><b>End Time</b></label></td>
          <td><input type="time" id="end_time" name="sche_end_time" required></td>
        </tr>

        <tr>
          <td><label for="average_consulting_time"><b>Average consulting time </b></label></td>
          <td><select id="average_consulting_time" name="average_time_slot">
              <?php
                  for($min = 5; $min <60; $min = $min + 5)
                  {
                      echo"<option value=\"". $min. "\">";
                      echo $min . " Minutes";
                      echo"</option>";
                  }
              ?>
          </select></td>
        </tr>
        
      </table><br>
      <div id="container">
        <button type="submit" name="add_schedule"> Submit</button>
        <div class="blank"></div>
        <button type="button"><a href="../doctor-site/doctor_schedule.php" style="text-decoration: none;" class="cancel">Cancel</a></button>
      </div>
    </div>
  </form>

</body>
</html>