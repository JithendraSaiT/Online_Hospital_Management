<?php
include 'protected.php';

$db = new mysqli('localhost', 'root', '', 'ehc appointment system');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


$doctor_id = $_POST['doctor_id'];

$doctor_name = $db->real_escape_string($_POST['doctor_name']);
$doctor_specialist = $db->real_escape_string($_POST['doctor_specialist']);
$doctor_edu_level = $db->real_escape_string($_POST['doctor_edu_level']);
$doctor_experience = $db->real_escape_string($_POST['doctor_experience']);
$doctor_about = $db->real_escape_string($_POST['doctor_about']);

if (isset($_FILES['new_portrait']) && $_FILES['new_portrait']['error'] == UPLOAD_ERR_OK) {
    $portrait_data = file_get_contents($_FILES['new_portrait']['tmp_name']);

    $sql = "UPDATE doctor SET doctor_name = '$doctor_name', doctor_specialist = '$doctor_specialist', doctor_edu_level = '$doctor_edu_level', doctor_experience = '$doctor_experience', doctor_about = '$doctor_about', doctor_portrait = ? WHERE doctor_id = '$doctor_id'";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('b', $portrait_data);
    $stmt->execute();
} else {
    $sql = "UPDATE doctor SET doctor_name = '$doctor_name', doctor_specialist = '$doctor_specialist', doctor_edu_level = '$doctor_edu_level', doctor_experience = '$doctor_experience', doctor_about = '$doctor_about' WHERE doctor_id = '$doctor_id'";
    $db->query($sql);
}
echo "<script>alert('Successfully updated!'); window.location='doctor_list.php?doctor_id=$doctor_id';</script>";
exit();
?>
