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
          <h1 class="m-0">Access Users</h1>
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
          <!-- add new user -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">New user access</h5>
            </div>
            <div class="card-body">
              <?php
              // PICTURE UPLOAD

              if(isset($_REQUEST["adduser"]))
              {
                $file = $_FILES['pimg'];
                $photo_name = $_FILES['pimg']['name'];
                $file_tmp_loc = $_FILES['pimg']['tmp_name'];
                $file_store_path = "img/profile/".$photo_name;
                move_uploaded_file($file_tmp_loc,$file_store_path);
          
                // field data
                $Fname = $_REQUEST["ufname"];
                $Lname = $_REQUEST["ulname"];
                $Uname = $_REQUEST["uuname"];
                $phone = $_REQUEST["uphone"];
                $email = $_REQUEST["uemail"];
                $address = $_REQUEST["uaddress"];
                $city = $_REQUEST["ucity"];
                $state = $_REQUEST["ustate"];
                $password = $_REQUEST["upnpass"];
                $role = $_REQUEST["urole"];

                // dont pass data if allavaialbe
                $chk = "SELECT * FROM `admin` WHERE `username` = '{$uname}' OR `email` = '{$email}'";
                $chkres = $conn->query($chk);


                if($chkrow = mysqli_num_rows($chkres) > 0 )
                {
                    echo '<script>
			              swal({
			              	title: "Account already Exists! ",
			              	button: "Add Again",
			              	type: "error"
			              }).then(function() {
                              window.location = "users.php";
                          });
			              </script>';
                }
                else
                {
                   // pass data 
                  $sql = "INSERT INTO `admin` ( `fname`, `lname`, `username`, `email`, `phone`, `address`, `city`, `state`, `password`, `img`, `role`)
                  VALUES ( '$Fname', '$Lname', '$Uname', '$email', '$phone', '$address', '$city', '$state', '$password', '$photo_name', '$role')";
                  
                  $conn->query($sql);

                  echo '<script>
								  		swal({
								  			title: "User Access Added",
								  			icon: "success",
								  			button: "close",
								  			type: "success"
								  		});
								  		</script>';
								  		echo '<meta http-equiv="refresh" content= "1;URL=?UserAdded" />'; 

                }

              }

               
								

              ?>
              <form action="" method="POST" enctype="multipart/form-data">
                <!-- image -->

                <div class="form-group row">
                  <label for="exampleFormControlFile1"> Profile Image</label>
                  <div class="col-sm-5">
                    <input type="file" class="form-control-file file-input" name="pimg" accept=".jpg,.png" required>
                  </div>
                  <div class="col-sm-5">
                    <div id="divImageMediaPreview"></div>
                  </div>
                </div>
                <!-- fname -->

                <div class="form-group row">
                  <label for="ufname" class="col-sm-2 col-form-label">Fname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ufname" required>
                  </div>
                </div>
                <!-- ulname -->
                <div class="form-group row">
                  <label for="ulname" class="col-sm-2 col-form-label">Lname</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ulname" required>
                  </div>
                </div>

                <!-- uuname -->
                <div class="form-group row">
                  <label for="uuname" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="uuname" id="uusername" required>
                    <span id="usermsg" class="mb-4"></span>
                  </div>
                </div>

                <!-- uphone -->
                <div class="form-group row">
                  <label for="uphone" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="uphone" required>
                  </div>
                </div>
                <!-- uemail -->
                <div class="form-group row">
                  <label for="uemail" class="col-sm-2 col-form-label">email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="uemail" id="uemail" required>
                    <span id="Emailmsg" class="mb-4"></span>
                  </div>
                </div>
                <!-- uaddress -->
                <div class="form-group row">
                  <label for="uaddress" class="col-sm-2 col-form-label">address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="uaddress" required>
                  </div>
                </div>
                <!-- ucity -->
                <div class="form-group row">
                  <label for="ucity" class="col-sm-2 col-form-label">city</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ucity" required>
                  </div>
                </div>
                <!-- ustate -->
                <div class="form-group row">
                  <label for="ustate" class="col-sm-2 col-form-label">state</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ustate" required>
                  </div>
                </div>
                <!-- urole -->
                <div class="form-group row">
                  <label for="urole" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10">
                    <select class="custom-select" aria-label="Access role Select" name="urole" required>
                      <option value="0">Admin</option>
                      <option value="1">Sales</option>
                    </select>
                  </div>
                </div>
                <!-- uPassword -->
                <div class="form-group row">
                  <label for="upnpass" class="col-sm-2 col-form-label">New Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="upnpass" name="upnpass" required>
                  </div>
                </div>
                <!--uConfirm Password -->
                <div class="form-group row">
                  <label for="upcnfpass" class="col-sm-2 col-form-label">Confirm Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="upcnfpass" name="upcnfpass" required>
                    <span class="text-success" id="passcnf"></span>
                  </div>
                </div>


                <button type="submit" class="btn btn-primary" id="adduser" name="adduser">ADD EMPLOYEE</button>
              </form>
            </div>
          </div>
          <!-- end add user -->
          <!-- cat table -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Availabe Users </h5>
            </div>
            <div class="card-body">

              <!-- available category -->
              <!-- start prod list -->
              <table id="example" class="table table-hover responsive nowrap usertable" style="width:100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email </th>
                    <th>Address </th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // check if username available
                 
                    // delete data
                    if(isset($_REQUEST["deletebtn"]))
                    {
                      $sql ="DELETE FROM `admin` where `id` = '{$_REQUEST['id']}'";
                      $conn->query($sql);
                      
                    }

                      $sql = "SELECT * FROM `admin`";
                      $result = $conn->query($sql);
                      while($row = $result->fetch_assoc())
                    {
                      // logic

                      if($row["role"]==0)
                      {
                        $role =  "ADMIN";
                        $color = "badge-danger";

                      }elseif($row["role"]==1){
                        $role = "SALES";
                        $color = "badge-success";
                      }
              
                      echo '
                      <tr>
                      <td class="uid">'.$row["id"].'</td>
                    <td>
                      <a href="#">
                        <div class="d-flex align-items-center">
                          <!-- <div class="avatar avatar-blue mr-3"></div> -->
                          <img id="prodimg" class="mr-3" src="'.imgs.$row["img"].'">

                          <div class="">
                            <p class="font-weight-bold mb-0">'.$row["fname"].' '.$row["lname"].'</p>
                            <p class="text-primary font-weight-normal">'.$row["phone"].'</p>
                          </div>
                        </div>
                      </a>
                    </td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["address"].'</td>
                    <td>
                      <div class="badge '.$color.' badge-danger-alt">'.$role.'</div>
                    </td>
                    <td>
                    <button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#moredeatils" id="userdetail"><i class="fas fa-info-circle"></i> Details</button>
                    
                    <form action="" method="post" class="d-inline">
                      <input type="hidden" name="id" value='.$row["id"].'>
                      <button type="submit" class="btn btn-danger mx-3" name="deletebtn" id="dltbtn"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                    </td>
                  </tr>

                      ';
                    }
                  ?>


                </tbody>
              </table>

              <!-- end prod list -->

            </div>
            <!-- end table -->
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

<!-- more daetails modal -->
<!-- Modal -->

<div class="modal fade" id="moredeatils" tabindex="-1" role="dialog" aria-labelledby="moredeatils" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="moredeatils">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- details -->
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            <img class="mr-3" id="profileimg" src="">
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">

            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Username </label>
              </div>
              <div class="col-md-5 col-6"><span for="username" id="username"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Full Name </label>
              </div>
              <div class="col-6"><span id="fname"></span> <span id="lname"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Email </label>
              </div>
              <div class="col-6"><span id="email"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class=" col-5">
                <label style="font-weight:bold;">Phone </label>
              </div>
              <div class=" col-6"><span id="phone"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Address </label>
              </div>
              <div class="col-6"> <span id="address"></span> ,<br><span id="city"></span>,<span id="state"></span>.
              </div>
            </div>
            <hr />
            <div class="row">
              <div class=" col-5">
                <label style="font-weight:bold;">role </label>
              </div>
              <div class="col-6"> <span id="role"></span></div>
            </div>
            <hr />

          </div>
        </div>

        <!-- end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end more details  -->
<?php
include('common/footer.php');
?>
<script>
  // set menu active
  $(document).ready(function () {
    var element2 = document.getElementById("opensettings");
    element2.classList.add("menu-open");
    var element = document.getElementById("settings");
    element.classList.add("active");
  });

  // user data
  $(document).ready(function () {
    $('.usertable').on('click', '#userdetail', function (e) {
      e.preventDefault();
      var uid = $(this).closest("tr").find(".uid").text();
      // console.log(uid);

      // shwo to modal
      $.ajax({
        type: 'POST',
        url: 'common/api.php',
        data: {
          'viewbtn': true,
          'uid': uid,
        },
        success: function (response) {
          $.each(response, function (key, value) {
            path = "/img/profile/"
            $('#profileimg').attr("src", path.concat(value['img']));
            $('#username').text(value['username']);
            $('#fname').text(value['fname']);
            $('#lname').text(value['lname']);
            $('#email').text(value['email']);
            $('#phone').text(value['phone']);
            $('#address').text(value['address']);
            $('#city').text(value['city']);
            $('#state').text(value['state']);

            if (value["role"] == 0) {
              $('#role').text("ADMIN").addClass("badge badge-danger badge-danger-alt ");

            } else if (value["role"] == 1) {
              $('#role').text("SALES").addClass("badge badge-primary badge-primary-alt ");
            }


          });
        }
      });

    });
  });


  $(document).ready(function () {
    var userrole = "<?php  echo $_SESSION["userrole "] ?>";

    if (userrole == 0) {
      $('#dltbtn').attr('disabled', true)
    } else {
      $('#dltbtn').attr('disabled', false)
    }
  });


  // check username
  $(document).ready(function () {
    $('#uusername').blur(function () {
      var username = $(this).val();
      $.ajax({
        url: 'common/api.php',
        method: "POST",
        data: {
          user_name: username
        },
        success: function (data) {
          if (data != '0') {
            $('#usermsg').html(
              '<span class="text-danger mb-3">Username Not available</span>'
            );
            $('#adduser').attr('disabled', true)
          } else {
            $('#usermsg').html(
              '<span class="text-success mb-3">Username available</span>'
            );
            $('#adduser').attr('disabled', false)
          }
        }
      })
    })
  });

  // check email
  $(document).ready(function () {
    $('#uemail').blur(function () {
      var email = $(this).val();
      $.ajax({
        url: 'common/api.php',
        method: "POST",
        data: {
          user_email: email
        },
        success: function (data) {
          if (data != '0') {
            $('#Emailmsg').html(
              '<span class="text-danger">Email Alredy Registered</span>'
            );
            $('#adduser').attr('disabled', true)

          } else {
            $('#Emailmsg').html(
              '<span class="text-success">email available</span>');
            $('#adduser').attr('disabled', false)
          }
        }
      })
    })
  });
</script>