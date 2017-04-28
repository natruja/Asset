<!DOCTYPE html>
<html>
<head>

	<?php
		include_once('header.php');
	?>
</head>
<body>
	<?php
include_once('conn.php');
session_start();
ini_set('display_errors', TRUE);
  $_SESSION["ro10_app"] = "natruja.k@jasmine.com";

 $ro10_app  =  $_SESSION["ro10_app"];


$tage_num2 = $_POST["tage_num2"];
$chk_value = $_POST["chk_value"];

$remask_rechek = $_POST["remask_rechek"];

switch ($chk_value) {
	case 'Y':
		$update = "UPDATE asset_ro SET  date_update = NOW(), user_check = '".$ro10_app."', recheck = '".$chk_value."'  WHERE tage_num = '".$tage_num2."' ";
		$query = mysqli_query($conn, $update) or die ("Error".mysqli_error());
		break;
	case 'N':
		$update = "UPDATE asset_ro SET  date_update = NOW(), user_check = '".$ro10_app."', recheck = '".$chk_value."', remask_recheck = '".$remask_rechek."'  WHERE tage_num = '".$tage_num2."' ";
		$query = mysqli_query($conn, $update) or die ("Error".mysqli_error());
		break;
	default:
		# code...
		break;
}

		if($query){

				header("Location: index.php");
				exit();


		}else{
			 echo' <script type="text/javascript">
				swal("ไม่สามารถบันทึกข้อมูลได้");
				window.location.href="index.php";
				</script> ';
		}




?>
</body>
</html>
