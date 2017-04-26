<?php
include_once('conn.php');

ini_set('display_errors', TRUE);
  $_SESSION["ro10_app"] = "natruja.k@jasmine.com";

 $ro10_app  =  $_SESSION["ro10_app"];


$tage_num2 = $_POST["tage_num2"];
$chk_value = $_POST["chk_value"];


		$update = "UPDATE asset_ro SET  date_update = NOW(), user_check = '".$ro10_app."', recheck = '".$chk_value."'  WHERE tage_num = '".$tage_num2."' ";
		$query = mysqli_query($conn, $update) or die ("Error".mysqli_error());

		if($query){
			 echo "<script>
				alert('บันทึกข้อมูลแล้วค่ะ');
				window.location.href='index.php';
				</script>";

		}else{
			echo "no";
		}




?>