<?php
session_start();
if(!isset ($_SESSION['mySession'])){
	
header("Location: doctor(login).php");
session_write_close();
exit();
}
?>