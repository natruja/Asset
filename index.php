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

  <script type="text/javascript">
     $(document).ready(function(e) {
      var show_data = $('#show_data').hide();
      var error = $('#error').hide();

      var meet_data = $('#meet_data').hide();

        $('#btn_seach').on('click', function(e) {
          var form_data = $('#form_data').serialize();
          $.ajax({
            type: "POST",
              url: "search_data.php",
              data: form_data,
              dataType: 'json',
              success: function(data){
                 console.log(data);

                 $('#tage_num').html(data.tage_num);
                 $('#category_name').html(data.category_name);
                 $('#brand').html(data.brand);
                 $('#model').html(data.model);
                 $('#serial_num').html(data.serial_num);
                 $('#emp_no').html(data.emp_no);
                 $('#emp_name').html(data.emp_name);
                 $('#location_name').html(data.location_name);
                 $('#shop_name').html(data.shop_name);
                 $('#recheck').val(data.recheck);


                 if($('#recheck').val() === 'Y') {
                    meet_data.show();
                    show_data.hide();
                 }else if ($('#recheck').val() === '') {
                  show_data.show();
                  meet_data.hide();
                 }



                  $('#tage_num2').val(data.tage_num2);

               },
               error:function(data){
                console.log(data);
                $("#error").show();
                  //bootbox.alert("ไม่มีข้อมูลที่ท่านค้นหา");
            }

          });

          e.preventDefault();
        });


        $("#index a:contains('Re-check')").parent().addClass('active');

     });

  </script>
</head>
<body id="index">
<div class="container">
  <?php
    include_once('navbar.php');
    include_once('conn.php');
  ?>
<div class="container-fluid">
      <div class="jumbotron">
      <form action="#" method="POST" id="form_data" name="form_data" enctype="multipart/form-data"  accept-charset="utf-8">
        <h1> RO10 Asset </h1>
        <p> รหัสทรัพย์สิน :   <input type="text" name="asset_code" value="" placeholder="" class="form-control" autofocus="true"  ></p>
      <!--   <p> Serial Num :   <input type="text" name="serial_num" value="" placeholder="" class="form-control" ></p> -->
      <button  name="btn_seach" value="" id="btn_seach" class="btn btn-primary">ค้นหาข้อมูล</button>
      <button  name="rest" value="" id="btn_reset" class="btn "> Reset </button>
  </form>
      </div>
  <form action="form_update.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data" >

      <div id="show_data">
        <table class="table table-striped table-bordered" id="">
          <thead>
            <tr>
              <th>TAG NUM</th>
              <th>CATEGORY NAME</th>
              <th>BRAND</th>
              <th>MODEL</th>
              <th>SERIAL NUM</th>
              <th>EMP NO</th>
              <th>EMP NAME</th>
              <th>LOCATION NAME</th>
          </tr>
          </thead>
          <tbody>
            <tr>
        <input type="hidden" name="recheck" id="recheck" value="">
            <input type="hidden" name="tage_num2" id="tage_num2" value="">
              <td><span for="textfield"  for="textfield" class="control-label" id="tage_num" align="left"></span></td>
              <td><span for="textfield" class="control-label" id="category_name" align="left"></span></td>
              <td><span for="textfield" class="control-label" id="brand" align="left"></span></td>
              <td><span for="textfield" class="control-label" id="model" align="left"></span></td>
              <td><span for="textfield" class="control-label" id="serial_num" align="left"></span></td>
              <td><span for="textfield" class="control-label" id="emp_no" align="left"></span></td>
              <td><span for="textfield" class="control-label" id="emp_name" align="left"></span></td>
              <td><span for="textfield" class="control-label" id="location_name" align="left"></span></td>
              <td><span for="textfield" class="control-label" id="shop_name" align="left"></span></td>
            </tr>
          </tbody>
        </table>
        <input type="submit" name="submit_update" value="อัพเดตข้อมูล" class="btn btn-primary">

        </form>
      </div>
      <div id="error">
    ไม่พบข้อมูล
      </div>

       <div id="meet_data">
      <h2>รหัสทรัพย์สินนี้ท่านได้ตรวจสอบแล้ว</h2>
      </div>


    </div>
    </div>

    <?php
        mysqli_close($conn);
     ?>
</body>
</html>