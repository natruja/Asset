<?php
include_once('conn.php');
ini_set('display_errors', TRUE);

 ?>
<!DOCTYPE html>
<html>
<head>
<?php
    include_once('header.php');
  ?>
   <script>
  	$(document).ready(function() {
  		$("#nd a:contains('ข้อมูล ณ วันที่ 04-05-2017')").parent().addClass('active');
  		$("#Network Design a:contains('ข้อมูล ณ วันที่ 04-05-2017')").parent().addClass('active');
  	});
  	 function zoom () {
		document.body.style.zoom = "90%";
	}
  	</script>
</head>
<body id="nd" onload="zoom()">
<div class="container-fluid">
<?php
	include_once('navbar.php');

	$sql_not_count = "SELECT
asset_ro.id_asset,
COUNT(asset_ro.tage_num) as count_not
FROM
asset_ro
WHERE asset_ro.init_area = 'ND'
AND asset_ro.recheck = '' ";
$query_count_not = mysqli_query($conn, $sql_not_count) or die ("error".mysqli_error());
$row_count_not = mysqli_fetch_assoc($query_count_not);

	$count_not_count = $row_count_not["count_not"];

	$sql_count = "SELECT
asset_ro.id_asset,
COUNT(asset_ro.tage_num) as count_success
FROM
asset_ro
WHERE asset_ro.init_area = 'ND'
AND asset_ro.recheck = 'Y' ";
$query_count = mysqli_query($conn, $sql_count) or die ("error".mysqli_error());
$row_count = mysqli_fetch_assoc($query_count);

$count_date = $row_count["count_success"];
?>

		<div class="row">
				<div class="col-md-12">
				<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h2>ทีม Network Design</h2>
							<h3> <font color="red"> ยังไม่ได้นับ <?php echo $count_not_count ?> :::  นับแล้ว <?php echo $count_date ?></font>  </h3>
					</div>
				</div>

				<div class="col-md-12">
<div class="table-responsive">
	<table class="table table-hover table-striped  ">
		<thead>
		<tr>
			<th>No.</th>
			<th>TAG NUM</th>
			<th>CATEGORY NAME</th>
			<th>BRAND</th>
			<th>MODEL</th>
			<th>SERIAL</th>
			<th>EMP NO</th>
			<th>EMP NAME</th>
			<th>สถานที่ตั้ง</th>
			<th>SHOP Code</th>
			<th>SHOP NAME</th>
			<th>Division</th>
			<th>ผลการค้นหา</th>
			<th>เปลี่ยนผู้ถือครอง</th>
			<th>ลงนาม</th>
		</tr>
	</thead>
		<tbody>

	<?php

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
asset_ro.remask_recheck,
asset_ro.name_thai_area,
asset_ro.date_recheck,
asset_ro.init_area,
asset_ro.report_header
FROM
asset_ro
WHERE asset_ro.init_area = 'ND'
AND asset_ro.recheck = '' ";

$i = 1;
$query = mysqli_query($conn, $sql) or die ("error".mysqli_error());
while($row = mysqli_fetch_assoc($query)){

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
		$division_emp = $row["division_emp"];
		$visible_y = $row["visible_y"];
		$change_own = $row["change_own"];
		$remark_name = $row["remark_name"];

		switch ($visible_y) {
			case 'Y':
				 $msg = "เจอ";
				break;
			case 'N':
			 	$msg = "ไม่เจอ";
				break;
			default:
				# code...
				break;
		}




	?>
		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php echo $tage_num ?></td>
			<td><?php echo $category_name  ?></td>
			<td><?php echo $brand ?></td>
			<td><?php echo $model ?></td>
			<td><?php echo $serial_num ?></td>
			<td><?php echo $emp_no ?></td>
			<td><?php echo $emp_name ?></td>
			<td><?php echo $location_name ?></td>
			<td><?php echo $shop_code  ?></td>
			<td><?php echo $shop_name ?></td>
			<td><?php echo $division_emp ?></td>
			<td><?php echo $msg ?></td>
			<td><?php echo $change_own ?></td>
			<td><?php echo $remark_name ?></td>

		</tr>

	<?php
		}
	 ?>
		</tbody>
	</table>
</div>
				</div>

		</div>


</div>

</body>
</html>