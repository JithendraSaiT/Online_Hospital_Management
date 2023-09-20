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
<!DOCTYPE html>
<html>
<head>

		<title>Doctor Information List</title>
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

			#doctor {
			border-collapse: collapse;
			width: 100%;
			}
			#doctor td, #doctor th {
			border: 1px solid #ddd;
			padding: 8px;
			}
			#doctor tr{
				background-color: #f2f2f2;
			}
			
			
			#doctor th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #48b1bd;
			color: white;
			}
			
			.box {
				display: flex;
				justify-content: space-between;
				margin: 20px;
			}
			
			button{
				padding: 10px 20px;
			}
			
			a{
				text-decoration: none;
				display: block; 
				width: 100px;
				text-align: center;
				line-height: 40px;
				height: 40px; 
				color: white;
				border-radius: 7px;
			}
			
			a:visited{
				color: white;
			}
		</style>
</head>

<body>
	<div id="headerspace"><?php include_once('doctorheader.php');?></div>
    <div id="main-content">
	<form method="post"> 
		<?php 
			include("conn.php");
			$result=mysqli_query($con,"SELECT* FROM doctor WHERE username = '$doctor'");
		?>
		<table id="doctor">
			<tr>
				<th>Doctor ID</th>
				<th>Doctor Name</th>
				<th>Specialist</th>
				<th>Education Level</th>
				<th>Year of Experiences</th>
				<th>View More</th>
				<th>Edit</th>
			</tr>

			<?php 
			while($row = mysqli_fetch_array($result))
			{
			echo"<tr bgcolor=\"#99FF66\">";

			echo"<td>";
			echo $row['doctor_id'];
			echo"</td>";

			echo"<td>";
			echo $row['doctor_name'];
			echo"</td>";

			echo"<td>";
			echo $row['doctor_specialist']; 
			echo"</td>";

			echo"<td>";
			echo $row['doctor_edu_level'];
			echo"</td>";

			echo"<td>";
			echo $row['doctor_experience'];
			echo"</td>";


			echo"<td ><a style='background-color:#89CFF0;' class='button' href=\"view_doctor.php?doctor_id="; 
			echo $row['doctor_id'];
			echo"\">View More</a></td>";

			echo"<td><a style='background-color:#FFA500;' class='button' href=\"edit_doctor.php?doctor_id="; 
			echo $row['doctor_id'];
			echo"\">Edit</a></td>";
			}
			mysqli_close($con);
			?>
		</table>
	</form>
</body>
</html>