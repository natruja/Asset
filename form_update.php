<?php
 session_start();

 $ro10_app  =  $_SESSION["ro10_app"];

?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include_once('header.php');
	?>
	<script>

		$(document).ready(function(e) {

			var check_unpass = $('#check_unpass').hide();

			 $('input[name="chk_value"]').click(function(){
			        var  radio_value = $(this).attr("value");

			        if( radio_value === 'N'){
			        		check_unpass.show();
			        }else{
			        	check_unpass.hide();
			        }


			    });

		});

		function zoom() {
            document.body.style.zoom = "85%"
        }


	</script>
	<style type="text/css" media="screen">

	</style>
<body onload="zoom()">

<div class="container">
<div class="container-fluid">
<?php

		include_once('navbar.php');
		include_once('conn.php');


	$tage_num2 = 	$_POST["tage_num2"];

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
				asset_ro.recheck,
				asset_ro.remark_name

				FROM
				asset_ro
				WHERE asset_ro.tage_num = '".$tage_num2."' ";
	$query = mysqli_query($conn, $sql) or die ("error".mysqli_error());
	$row = mysqli_fetch_array($query);

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
		$visible_y = $row["visible_y"];
		$remark_name = $row["remark_name"];
		$change_own = $row["change_own"];

		switch ($visible_y) {
			case 'Y':
					$message = "พบ";
				break;
			case 'N':
				$message = "ไม่พบ";
				break;

			default:
				$message = "ไม่ระบุข้อมูล";
				break;
		}


?>
	<table  class="table table-striped table-bordered" width="80%">
		 	<tbody>
			<tr>
				<td width="200px;">TAG NUM</td>
				<th><?php echo $tage_num ?></th>
			</tr>
			<tr>
				<td width="200px;">CATEGORY NAME</td>
				<th><?php echo $category_name ?></th>
			</tr>
			<tr>
				<td width="200px;">BRAND</td>
				<th><?php echo $brand ?></th>
			</tr>
			<tr>
				<td width="200px;">MODEL</td>
				<th><?php echo $model ?></th>
			</tr>
			<tr>
				<td width="200px;">SERIAL NUM</td>
				<th><?php echo $serial_num ?></th>
			</tr>
			<tr>
				<td width="200px;">EMP NO</td>
				<th><?php echo $emp_no ?></th>
			</tr>
			<tr>
				<td width="200px;">EMP NAME</td>
				<th><?php echo $emp_name ?></th>
			</tr>
			<tr>
				<td width="200px;">LOCATION NAME</td>
				<th><?php echo $location_name ?></th>
			</tr>
			<tr>
				<td width="200px;">Shope Code</td>
				<th><?php echo $shop_code ?></th>
			</tr>
			<tr>
				<td width="250px;">Shope Name</td>
				<th><?php echo $shop_name ?></th>
			</tr>
			<tr>
				<td width="250px;">ผลการตรวจจากหน่วยงาน</td>
				<th><?php echo $message ?></th>
			</tr>
			<tr>
				<td width="250px;">ชื่อผู้ถือครอง</td>
				<th><?php echo $change_own ?></th>
			</tr>
			<tr>
				<td width="250px;">หมายเหตุ</td>
				<th><?php echo $remark_name ?></th>
			</tr>
		</tbody>
	</table>
		<form action="update_data.php" method="POST" accept-charset="utf-8">
			<input type="hidden" name="tage_num2" value="<?php echo $tage_num ?>" id="tage_num2">
		<h2>ผลการตรวจครั้งนี้</h2>

<div class="alert alert-danger">
	<div class="pretty">
		 <input type="radio" id="checkbox" name="chk_value" value="N"><label><i class="mdi mdi-check"></i>  &nbsp;  ไม่เจอ </label> &nbsp;
		 <input type="radio" id="checkbox" name="chk_value" value="Y"><label><i class="mdi mdi-check"></i> &nbsp;   เจอ</label>
	</div>
</div>

<div class="alert alert-success" id="check_unpass">
<div class="form-group">
 		<textarea name="remask_rechek" id="remask_rechek" class="form-control custom-control" style="width: 390px; margin: 0px 687px 0px 0px; height: 98px;"  ></textarea>
 		</div>
</div>



		<br>

				<input type="submit" name="click" value="ยืนยันข้อมูลถูกต้อง" class="btn btn-primary">
			 	<input type="button" onclick="location.href='index.php';" value="Back" class="btn btn-default" />
		</form>


		</div>

</div>





</body>
</html>