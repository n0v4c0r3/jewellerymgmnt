<?php 
include('common/header.php');
include('common/navbar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Available Employee</h1>
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

          <!-- cat table -->
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">Employee </h5>
            </div>
            <div class="card-body">

              <!-- available category -->
              <!-- start prod list -->
              <table id="example" class="table table-hover responsive nowrap emptable" style="width:100%">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Employee Name</th>
                    <th>Positon</th>
                    <th>Address </th>
                    <th>City</th>
                    <th>Zip</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // add  

                  $sql = "SELECT * from `employee`";
                  $result = $conn->query($sql);

                  while($row = $result->fetch_assoc()){
                    echo '
                    <tr>
                    <td id="eid">'.$row["id"].'</td>
                    <td>
                      <a href="#">
                        <div class="d-flex align-items-center">
                          <!-- <div class="avatar avatar-blue mr-3"></div> -->
                          <img id="prodimg" class="mr-3" src="/img/profile/'.$row["img"].'">

                          <div class="">
                            <p class="font-weight-bold mb-0"><span id="fname">'.$row["fname"].'</span> <span id="lname">'.$row["lname"].'</span></p>
                            <p class="text-primary font-weight-normal" id="phone">'.$row["phone"].'</p>
                          </div>
                        </div>
                      </a>
                    </td>
                    <td id="position">'.$row["position"].'</td>
                    <td id="address">'.$row["address"].'</td>
                    <td id="city">'.$row["city"].'</td>
                    <td id="zip">'.$row["zip"].'</td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                            title="Actions"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                          <button class="dropdown-item" type="buttton" id="moredata" data-toggle="modal" data-target="#moredeatils"><i class="bx bxs-info-circle mr-2" ></i> More Details</button>
                          <button class="dropdown-item" type="buttton" id="editdata" data-toggle="modal" data-target="#updateemp"><i class="bx bxs-pencil mr-2"></i> Edit Profile</button>
                          <button class="dropdown-item  type="submit" text-danger" href="#" id="deletedata"><i class="bx bxs-trash mr-2"></i> Remove</button>
                        </div>
                      </div>
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
        <h5 class="modal-title" id="moredeatils">Employee Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- details -->
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            <img  class="mr-3" id="profileimg" src="">
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">

            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Full Name </label>
              </div>
              <div class="col-6"><span id="efname" style="font-weight: 700; text-transform: uppercase;"></span> <span id="elname" style="font-weight: 700; text-transform: uppercase;"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Email </label>
              </div>
              <div class="col-6"><span id="eemail"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class=" col-5">
                <label style="font-weight:bold;">Phone </label>
              </div>
              <div class=" col-6" id="ephone"></div>
            </div>
            <hr />
            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Address </label>
              </div>
              <div class="col-6"> <span id="eaddress"></span> ,<br><span id="ecity"></span>,<span id="estate"></span>,<span id="ezip"></span>.</div>
            </div>
            <hr />
            <div class="row">
              <div class=" col-5">
                <label style="font-weight:bold;">position </label>
              </div>
              <div class="col-6" id="epos"> </div>
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


<!--emp data update modal -->
<!-- Modal -->

<div class="modal fade datamodal" id="updateemp" tabindex="-1" role="dialog" aria-labelledby="updateemp"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="myForm">
      <div class="modal-header">
        <h5 class="modal-title" id="updateemp">User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- details -->
        <div class="row">
          
          <div class="col-12">
              <!-- fname -->
              <div class="form-group row">
                <label for="efname" class="col-sm-2 col-form-label">First name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="uefname" required >
                  <input type="hidden" class="form-control" id="euid" required >
                </div>
              </div>
              <!-- lname -->
              <div class="form-group row">
                <label for="elname" class="col-sm-2 col-form-label">Last name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="uelname" required >
                </div>
              </div>

              <!-- phone -->
              <div class="form-group row">
                <label for="ephone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="uephone" required >
                </div>
              </div>
              <!-- email -->
              <div class="form-group row">
                <label for="ephone" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="ueemail" required>
                </div>
              </div>

              <!-- address -->
              <div class="form-group row">
                <label for="eaddress" class="col-sm-2 col-form-label">address</label>
                <div class="col-sm-10">
                  <textarea type="text" cols="40" rows="5" class="form-control" id="ueaddress" required ></textarea>
                </div>
              </div>

              <!-- city -->
              <div class="form-group row">
                <label for="ecity" class="col-sm-2 col-form-label">city</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="uecity" required>
                </div>
              </div>

              <!-- state -->
              <div class="form-group row">
                <label for="estate" class="col-sm-2 col-form-label">state</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="uestate" required>
                </div>
              </div>

              <!-- zip -->
              <div class="form-group row">
                <label for="ezip" class="col-sm-2 col-form-label">Zip</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="uezip" required >
                </div>
              </div>

              <!-- position -->
              <div class="form-group row">
                <label for="epos" class="col-sm-2 col-form-label">Position</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="uepos" required 
                    >
                </div>
              </div>
          </div>
        </div>

        <!-- end -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="submitupdate">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end update details  -->
<?php
include('common/footer.php');
?>
<script>
  $(document).ready(function () {
    var element = document.getElementById("emp");
    var element2 = document.getElementById("openemp");
    element2.classList.add("menu-open");
    element.classList.add("active");

  });

  // delete data
  $(document).ready(function () {

    $('#example').on('click', '#deletedata', function (e) {
      e.preventDefault();

      var eid = $(this).closest("tr").find("#eid").text();
      // console.log(eid)

      $.ajax({
        type: "post",
        url: "common/api.php",
        data: {
          'deletedata': true,
          'eid': eid
        },
        success: function (response) {
          swal
          ({
            title: "Details deleted",
            icon: "success"
          }).then(function () {
            location.reload();
          });
        }
      });

    });
  });



  // show data to modal

  // user data
$(document).ready(function(){

  $('.emptable').on('click', '#moredata', function(e){
    e.preventDefault();

    var eid = $(this).closest("tr").find("#eid").text();

    // shwo to modal
    $.ajax({
            type: 'POST',
            url:'common/api.php',
            data: {
                'empdata':true,
                'eid': eid,
            },
            success: function(response){
                $.each(response, function (key, value) { 
                    path = "/img/profile/";

                    $('#profileimg').attr("src", path.concat(value['img']) );
                    $('#efname').text(value['fname']);
                    $('#elname').text(value['lname']);
                    $('#eemail').text(value['email']);
                    $('#ephone').text(value['phone']);
                    $('#eaddress').text(value['address']);
                    $('#ecity').text(value['city']);
                    $('#estate').text(value['state']);
                    $('#ezip').text(value['zip']);
                    $('#epos').text(value['position']);
                    
                });
            }
        });

  });
});

// edit data


$(document).ready(function(){

$('.emptable').on('click', '#editdata', function(e){
  e.preventDefault();

  var eid = $(this).closest("tr").find("#eid").text();

  // shwo to modal
  $.ajax({
          type: 'POST',
          url:'common/api.php',
          data: {
              'empdata':true,
              'eid': eid,
          },
          success: function(response){
              $.each(response, function (key, value) { 

                  $('#euid').val(value['id']);

                  $('#uefname').val(value['fname']);
                  $('#uelname').val(value['lname']);
                  $('#ueemail').val(value['email']);
                  $('#uephone').val(value['phone']);
                  $('#ueaddress').val(value['address']);
                  $('#uecity').val(value['city']);
                  $('#uestate').val(value['state']);
                  $('#uezip').val(value['zip']);
                  $('#uepos').val(value['position']);
                 
                  
              });
          }
      });

});
});


// update employee

// update details

$(document).ready(function () {


$('#submitupdate').click(function (e) {
  e.preventDefault();

  var uid = $('#euid').val();

  var fname = $('#uefname').val();
  var lname = $('#uelname').val();
  var phone = $('#uephone').val();
  var address = $('#ueaddress').val();
  var city = $('#uecity').val();
  var state = $('#uestate').val();
  var zip = $('#uezip').val();
  var email = $('#ueemail').val();
  var pos = $('#uepos').val();



  $.ajax({
    type: "post",
    url: "/common/api.php",
    data: {
      'empsubmitupdate': true,
      'euid': uid,
      'efname': fname,
      'elname': lname,
      'ephone': phone,
      'eaddress': address,
      'ecity': city,
      'estate': state,
      'eemail': email,
      'ezip': zip,
      'epos': pos,
    },
    success: function (response) {
      // console.log(response)
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

</script>