<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ehc appointment system";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $specialist = $_POST['specialist'];
  $education_level = $_POST['education_level'];
  $year_of_experience = $_POST['year_of_experience'];
  $languages = implode(",", $_POST['language']);
  $about_doctor = $_POST['about_doctor'];
  $total_qualification = $_POST['total_qualification'];

		for($i=1;$i<=$total_qualification;$i++){
			$doc_qualification[] = $_POST['qualification'.$i];  
		}

        $image = $_FILES['picture']['tmp_name'];
        $img = file_get_contents($image);

		$sql= "INSERT INTO doctor (doctor_name, doctor_specialist, doctor_edu_level, doctor_experience, doctor_about, doctor_portrait)
        VALUES
        ('$_POST[name]','$_POST[specialist]','$_POST[education_level]','$_POST[year_of_experience]','$_POST[about_doctor]', ?)";
        
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"s",$img);
        mysqli_stmt_execute($stmt);

            $last_id = $conn->insert_id;

            foreach ($_POST['language'] as $value) {
				$sql = "INSERT INTO doctor_language (doctor_id, doctor_language) VALUES ('$last_id', '$value')";
				if (!mysqli_query($conn, $sql)){
					die('Error: ' . mysqli_error($conn));
				}
			}
			
			foreach ($doc_qualification as $value) {
				$insertqualification = "INSERT INTO doctor_qualification (doctor_id, doctor_qualification) VALUES ($last_id, '$value')";
                if (!mysqli_query($conn,$insertqualification)){
					die('Error: ' . mysqli_error($conn));
				}
            }

  if ($password == $cpassword) {
    $sql = "INSERT INTO login_doctor (doctor_username, doctor_password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Succesfully Registered!"); window.location.href= "../doctor-site/doctor(login).php"; </script>';exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Error: Password and Confirm Password fields do not match";
  }

  $conn->close();
}
?>