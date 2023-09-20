<?php
    include("../conn.php");
    $db = new mysqli('localhost', 'root', '', 'ehc appointment system');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $id = $_POST['doctor_id'];
    $doctor_name = $db->real_escape_string($_POST['doctor_name']);
    $doctor_specialist = $db->real_escape_string($_POST['doctor_specialist']);
    $doctor_edu_level = $db->real_escape_string($_POST['doctor_edu_level']);
    $doctor_experience = $db->real_escape_string($_POST['doctor_experience']);
    $doctor_about = $db->real_escape_string($_POST['doctor_about']);

    if (isset($_FILES['new_portrait']) && !empty($_FILES['new_portrait']['tmp_name'])) {
        $image = $_FILES['new_portrait']['tmp_name'];
        $img = file_get_contents($image);
        $sql = "UPDATE doctor SET 
            doctor_name='$doctor_name',
            doctor_specialist='$doctor_specialist',
            doctor_edu_level='$doctor_edu_level',
            doctor_experience='$doctor_experience',
            doctor_about='$doctor_about',
            doctor_portrait= ?
            WHERE doctor_id=$id";

        $stmt = mysqli_prepare($con,$sql);
        mysqli_stmt_bind_param($stmt,"s",$img);
        mysqli_stmt_execute($stmt);
    } else {
        $sql = "UPDATE doctor SET 
            doctor_name='$doctor_name',
            doctor_specialist='$doctor_specialist',
            doctor_edu_level='$doctor_edu_level',
            doctor_experience='$doctor_experience',
            doctor_about='$doctor_about'
            WHERE doctor_id=$id";
        mysqli_query($con,$sql);
    }
    
    echo '<script>alert("Record Updated!"); window.location.href= "doctor_list.php"; </script>';
?>
