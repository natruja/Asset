<?php
 session_start();

  $_SESSION["ro10_app"] = "natruja.k@jasmine.com";

 $ro10_app  =  $_SESSION["ro10_app"];

?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include_once('header.php');
	?>
<body>

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


?>
	<table  class="table table-striped table-bordered" width="80%">
		 	<tbody>
			<tr>
				<td width="150px;">TAG NUM</td>
				<th><?php echo $tage_num ?></th>
			</tr>
			<tr>
				<td width="150px;">CATEGORY NAME</td>
				<th><?php echo $category_name ?></th>
			</tr>
			<tr>
				<td width="150px;">BRAND</td>
				<th><?php echo $brand ?></th>
			</tr>
			<tr>
				<td width="150px;">MODEL</td>
				<th><?php echo $model ?></th>
			</tr>
			<tr>
				<td width="150px;">SERIAL NUM</td>
				<th><?php echo $serial_num ?></th>
			</tr>
			<tr>
				<td width="150px;">EMP NO</td>
				<th><?php echo $emp_no ?></th>
			</tr>
			<tr>
				<td width="150px;">EMP NAME</td>
				<th><?php echo $emp_name ?></th>
			</tr>
			<tr>
				<td width="150px;">LOCATION NAME</td>
				<th><?php echo $location_name ?></th>
			</tr>
			<tr>
				<td width="150px;">Shope Code</td>
				<th><?php echo $shop_code ?></th>
			</tr>
			<tr>
				<td width="150px;">Shope Name</td>
				<th><?php echo $shop_name ?></th>
			</tr>
			<tr>
				<td width="150px;">ผลการตรวจจากหน่วยงาน</td>
				<th><?php echo $visible_y ?></th>
			</tr>
			<tr>
				<td width="150px;">หมายเหตุ</td>
				<th><?php echo $remark_name ?></th>
			</tr>
		</tbody>
	</table>
		<form action="update_data.php" method="POST" accept-charset="utf-8">
			<input type="hidden" name="tage_num2" value="<?php echo $tage_num ?>">
		<h2>ผลการตรวจครั้งนี้</h2>

<div class="alert alert-danger">
	<div class="pretty">
		 <input type="radio" id="checkbox" name="chk_value" value="N"><label><i class="mdi mdi-check"></i>  &nbsp;  ไม่เจอ </label> &nbsp;
		 <input type="radio" id="checkbox" name="chk_value" value="Y"><label><i class="mdi mdi-check"></i> &nbsp;   เจอ</label>
	</div>
</div>


		<br>
		<br>

				<input type="submit" name="" value="ยืนยันข้อมูลถูกต้อง" class="btn btn-primary">

		</form>


		</div>

</div>





</body>
</html>