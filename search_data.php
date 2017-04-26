<?php
include_once('conn.php');

ini_set('display_errors', TRUE);

		$asset_code = $_POST["asset_code"];
		// $serial_num = $_POST["serial_num"];

		$sql = "SELECT
				asset_ro.id_asset,
				asset_ro.tage_num,
				asset_ro.category_name,
				asset_ro.brand,
				asset_ro.model,
				asset_ro.serial_num,
				asset_ro.emp_no,
				asset_ro.emp_name,
				asset_ro.location_name,
				asset_ro.shop_code,
				asset_ro.shop_name,
				asset_ro.division_emp,
				asset_ro.visible_y,
				asset_ro.change_own,
				asset_ro.remark_name,
				asset_ro.date_update,
				asset_ro.user_check,
				asset_ro.recheck
				FROM
				asset_ro
				WHERE asset_ro.tage_num LIKE '%".$asset_code."%'  ";
		$query = mysqli_query($conn, $sql) or die ("error".mysqli_error());
		$num = mysqli_num_rows($query);
		if($num >= 1){
		while($row = mysqli_fetch_array($query)){
				 		$tage_num = $row["tage_num"];
				 		$category_name = $row["category_name"];
				 		$brand = $row["brand"];
				 		$model = $row["model"];
				 		$serial_num = $row["serial_num"];
				 		$emp_no = $row["emp_no"];
				 		$emp_name = $row["emp_name"];
				 		$location_name = $row["location_name"];
				 		$shop_code = $row["shop_code"];
				 		$shop_name = $row["shop_name"];

			}


						 $array = array("tage_num" => $tage_num,
			        	 			   "category_name" => $category_name,
			        	 			   "brand" => $brand,
			        	 			   "model" => $model,
			                          "serial_num" => $serial_num,
			                          "emp_no" => $emp_no,
			                          "emp_name" => $emp_name,
			                          "location_name" => $location_name,
			                          "shop_name" => $shop_name,
			                          "tage_num2" => $tage_num);



		}else{
				echo "ไม่พบข้อมูล";
		}


		 echo json_encode($array);






?>