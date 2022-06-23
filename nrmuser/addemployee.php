<?php 
include('../nrmuser/common/header.php');
include('../nrmuser/common/navbar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Employee Data</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Employee ID: 123456</h5>
            </div>
            <div class="card-body">
              <?php
              if(isset($_REQUEST["addemp"]))
              {
                $file = $_FILES['eimg'];
                $photo_name = $_FILES['eimg']['name'];
                $file_tmp_loc = $_FILES['eimg']['tmp_name'];
                $file_store_path = "img/profile/".$photo_name;
                move_uploaded_file($file_tmp_loc,$file_store_path);
          
                // field data
                $Fname = $_REQUEST["efname"];
                $Lname = $_REQUEST["elname"];
                $email = $_REQUEST["eemail"];
                $phone = $_REQUEST["ephone"];
                $address = $_REQUEST["eaddress"];
                $city = $_REQUEST["ecity"];
                $state = $_REQUEST["estate"];
                $zip = $_REQUEST["ezip"];
                $pos = $_REQUEST["epos"];

               

                // send data
                $sql = "
                INSERT INTO `employee` ( `fname`, `lname`, `email`, `phone`, `address`, `city`, `state`, `zip`, `position`, `img`)
                VALUES ( '$Fname', '$Lname', '$email', '$phone', '$address', '$city', '$state', '$zip', '$pos', '$photo_name')";
                $conn->query($sql);

                echo '<script>
										swal({
											title: "Employee Added",
											icon: "success",
											button: "close",
											type: "success"
										});
                    
										</script>';
                    
										echo '<meta http-equiv="refresh" content= "1;URL=?UserAdded" />'; 

              }

              ?>
              <form action="" method="POST" enctype="multipart/form-data">
              <!-- image -->
	          
              <div class="form-group row">
                <label for="exampleFormControlFile1"> Profile Image</label>
                <div class="col-sm-5">
                  <input type="file" class="form-control-file file-input"  accept=".jpg,.png" name="eimg"  required>
                </div>
                <div class="col-sm-5">
                  <div id="divImageMediaPreview"></div>
                </div>
              </div>
              <!-- fname -->
              
              <div class="form-group row">
                <label for="efname" class="col-sm-2 col-form-label">Fname</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="efname" required>
                </div>
              </div>
              <!-- lname -->
              <div class="form-group row">
                <label for="elname" class="col-sm-2 col-form-label">Lname</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="elname" required>
                </div>
              </div>
             
              <!-- phone -->
              <div class="form-group row">
                <label for="ephone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="ephone" required>
                </div>
              </div>
              <!-- email -->
              <div class="form-group row">
                <label for="eemail" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="eemail" required>
                </div>
              </div>
              <!-- Address -->
              <div class="form-group row">
                <label for="eaddress" class="col-sm-2 col-form-label">Addreess</label>
                <div class="col-sm-10">
                  <textarea id="textarea" cols="40" rows="5" class="form-control" name="eaddress" required></textarea>
                </div>
              </div>
              <!-- city -->
              <div class="form-group row">
                <label for="ecity" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ecity" required>
                </div>
              </div>
              <!-- state -->
              <div class="form-group row">
                <label for="estate" class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="estate" required>
                </div>
              </div>
              <!-- Zip -->
              <div class="form-group row">
                <label for="ezip" class="col-sm-2 col-form-label">Zip</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="ezip" required>
                </div>
              </div>
              <!-- position -->
              <div class="form-group row">
                <label for="eposition" class="col-sm-2 col-form-label">position</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="epos" required>
                </div>
              </div>
              
             
              <button type="submit" name="addemp" class="btn btn-primary">ADD EMPLOYEE</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include('../common/footer.php');
?>
<script>
$( document ).ready(function() {
    var element = document.getElementById("emp");
    var element2 = document.getElementById("openemp");
    element2.classList.add("menu-open");
    element.classList.add("active");
});
</script>