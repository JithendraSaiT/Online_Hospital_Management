<?php
include 'protected.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Doctor</title>
<style>
header {
  background-color: #f2f2f2;
  padding: 20px;
}

form {
  margin: 20px auto;
  width: 60%;
  border: 1px solid #ddd;
  padding: 20px;
}

input[type=text], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

img {
  max-width: 100%;
  height: auto;
  margin-bottom: 10px;
}

#main-content {
  width: 88%;
				display: inline-block;
				margin-left: 12%;
  margin-top: 20px;
  text-align: center;
}

h1 {
  font-size: 36px;
  margin-bottom: 20px;
}

footer {
  background-color: #f2f2f2;
  padding: 20px;
  margin-top: 20px;
  text-align: center;
}

</style>
</head>
<body>
<div><?php include_once('doctorheader.php');?></div>
	<div id="main-content">
	
	<div >
	<p style="text-align:center">Edit Doctor Information</p>

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
$db = new mysqli('localhost', 'root', '', 'ehc appointment system');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$doctor_id = $_GET['doctor_id'];

$sql = "SELECT doctor_id, doctor_name, doctor_specialist, doctor_edu_level, doctor_experience, doctor_about, doctor_portrait
        FROM doctor
        WHERE username = '$doctor'";

$result = $db->query($sql);

if ($result->num_rows == 0) {
    die("Doctor not found.");
}

$row = $result->fetch_assoc();
$doctor_id = $row['doctor_id'];
$doctor_name = $row['doctor_name'];
$doctor_specialist = $row['doctor_specialist'];
$doctor_edu_level = $row['doctor_edu_level'];
$doctor_experience = $row['doctor_experience'];
$doctor_about = $row['doctor_about'];
$doctor_portrait = base64_encode($row['doctor_portrait']); 

echo '<form method="post" action="doctor-update.php" enctype="multipart/form-data">';
echo '<input type="hidden" name="doctor_id" value="'.$doctor_id.'">';
echo 'Name: <input type="text" name="doctor_name" value="'.$doctor_name.'"><br>';
echo 'Specialist: <input type="text" name="doctor_specialist" value="'.$doctor_specialist.'"><br>';
echo 'Education Level: <input type="text" name="doctor_edu_level" value="'.$doctor_edu_level.'"><br>';
echo 'Experience: <input type="text" name="doctor_experience" value="'.$doctor_experience.'"><br>';
echo 'About: <textarea name="doctor_about">'.$doctor_about.'</textarea><br>';
echo 'Portrait: <img src="data:image/jpeg;base64,'.$doctor_portrait.'" width="100"><br>';
echo 'New Portrait: <input type="file" name="new_portrait"><br><br>';
echo '<input type="submit" name="save" value="Save">';
echo '</form>';

$db->close();
?>
</body>
</html>