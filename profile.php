<?php
include('common/header.php');
include('common/navbar.php');

$sql = "SELECT * FROM `admin` WHERE `role` = 0";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 // logic

 if($row["role"]==0)
 {
   $role =  "ADMIN";

 }elseif($row["role"]==1){
   $role = "STAFF";
 }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile </h1>
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
            <div class="card-body">
              <div class="card-title mb-4">
                <div class="d-flex justify-content-start">
                  <div class="image-container">
                    <img src="/img/profile/<?php echo $row["img"]; ?>" id="imgProfile"
                      style="width: 150px; height: 150px" class="img-thumbnail" />

                  </div>

                  <div class="ml-auto">
                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab"
                        aria-controls="basicInfo" aria-selected="true">User Info</a>
                    </li>
                  </ul>
                  <div class="tab-content ml-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
                      aria-labelledby="basicInfo-tab">


                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">Name </label>
                        </div>
                        <div class="col-md-8 col-6">
                          <?php echo $row["fname"];?> <?php echo $row["lname"];?>
                        </div>
                      </div>
                      <hr />

                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">Email</label>
                        </div>
                        <div class="col-md-8 col-6">
                          <?php echo $row["email"];?>
                        </div>
                      </div>
                      <hr />


                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">Phone</label>
                        </div>
                        <div class="col-md-8 col-6">
                          <?php echo $row["phone"];?>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">Position</label>
                        </div>
                        <div class="col-md-8 col-6">
                          <?php echo $role;?>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">Address</label>
                        </div>
                        <div class="col-md-8 col-6">
                          <?php echo $row["address"];?>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">City</label>
                        </div>
                        <div class="col-md-8 col-6">
                          <?php echo $row["city"];?>
                        </div>
                      </div>
                      <hr />
                      <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                          <label style="font-weight:bold;">State</label>
                        </div>
                        <div class="col-md-8 col-6">
                          <?php echo $row["state"];?>
                        </div>
                      </div>
                      <hr />
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatedetails" id="updateprofile"><i
                          class="fas fa-pen"></i> Update Details</button>
                      <button type="button" class="btn btn-danger mx-3" data-toggle="modal"
                        data-target="#password-modal" id="passwordreset"><i class="fas fa-key"></i> Change Password</button>
                    </div>

                  </div>


                </div>

              </div>
            </div>
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

<!-- password Update -->
<!-- Modal -->

<div class="modal fade" id="password-modal" tabindex="-1" role="dialog" aria-labelledby="password-modal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="password-modal">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label for="upnpass" class="col-md-6 col-form-label">New Passowrd</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="upnpass">
          </div>
        </div>
        <div class="form-group row">
          <label for="upcnfpass" class="col-md-6 col-form-label">Confirm Passowrd</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="upcnfpass">
            <span class="text-success" id="passcnf"></span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updatepassword">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- end password update -->

<!-- data update modal -->
<!-- Modal -->

<div class="modal fade datamodal" id="updatedetails" tabindex="-1" role="dialog" aria-labelledby="updatedetails"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updatedetails">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- details -->
        <div class="row">
          <div class="col-12">


            <form action="" method="POST" enctype="multipart/form-data">
              <!-- fname -->

              <div class="form-group row">
                <label for="ufname" class="col-sm-2 col-form-label">Fname</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ufname" required value="<?php echo $row["fname"]; ?>"
                    required>
                  <input type="hidden" id="uid" value="<?php echo $row["id"]; ?>">
                </div>
              </div>
              <!-- ulname -->
              <div class="form-group row">
                <label for="ulname" class="col-sm-2 col-form-label">Lname</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ulname" required value="<?php echo $row["lname"]; ?>"
                    required>
                </div>
              </div>

              <!-- uphone -->
              <div class="form-group row">
                <label for="uphone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="uphone" required value="<?php echo $row["phone"]; ?>"
                    required>
                </div>
              </div>

              <!-- uaddress -->
              <div class="form-group row">
                <label for="uaddress" class="col-sm-2 col-form-label">address</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="uaddress" required value="<?php echo $row["address"]; ?>"
                    required>
                </div>
              </div>

              <!-- ucity -->
              <div class="form-group row">
                <label for="ucity" class="col-sm-2 col-form-label">city</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ucity" required value="<?php echo $row["city"]; ?>"
                    required>
                </div>
              </div>

              <!-- ustate -->
              <div class="form-group row">
                <label for="ustate" class="col-sm-2 col-form-label">state</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ustate" required value="<?php echo $row["state"]; ?>"
                    required>
                </div>
              </div>

            </form>
          </div>
        </div>

        <!-- end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="submitupdate">Update</button>
      </div>
    </div>
  </div>
</div>
<!-- end update details  -->

<?php
include('common/footer.php');
?>

<script>
  $(document).ready(function () {
    var element = document.getElementById("settings");
    var element2 = document.getElementById("opensettings");
    element2.classList.add("menu-open");
    element.classList.add("active");
  });

  // update details

  $(document).ready(function () {


    $('#submitupdate').click(function (e) {
      e.preventDefault();

      var uid = $('#uid').val();

      var fname = $('#ufname').val();
      var lname = $('#ulname').val();
      var phone = $('#uphone').val();
      var address = $('#uaddress').val();
      var city = $('#ucity').val();
      var state = $('#ustate').val();



      $.ajax({
        type: "post",
        url: "/common/api.php",
        data: {
          'submitupdate': true,
          'uid': uid,
          'fname': fname,
          'lname': lname,
          'phone': phone,
          'address': address,
          'city': city,
          'state': state,
        },
        success: function (response) {
          swal
          ({
            title: "Details Updated",
            icon: "success"
          }).then(function () {
            location.reload();
          });
        }
      });

    });
  });


  // update password
  $(document).ready(function () {
    $('#updatepassword').click(function (e) {
      e.preventDefault();

      var uid = $('#uid').val();

      var password = $('#upcnfpass').val();

      $.ajax({
        type: "post",
        url: "/common/api.php",
        data: {
          'newpassword': true,
          'uid': uid,
          'newpass': password,

        },
        success: function (response) {
          swal({
            title: "Password Updated",
            text: " please login again",
            icon: "success"
          }).then(function () {
            location.reload();
          });
        }
      });

    });
  });

</script>