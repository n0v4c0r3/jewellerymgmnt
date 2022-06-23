<?php 
include('/nrmuser/common/header.php');
include('/nrmuser/common/navbar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Products</h1>
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
          <!-- start prod list -->
          <table id="example" class="table table-hover responsive nowrap itmtable" style="width:100%">
            <thead>
              <tr>
                <th>id</th>
                <th>Product details</th>
                <th>Qty </th>
                <th>size</th>
                <th>Weight(g)</th>
                <th>Price(RS)</th>
                <th>avialabe</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php
                  // add  

                  $sql = "SELECT * from `products`";
                  $result = $conn->query($sql);

                  while($row = $result->fetch_assoc())
                  {

                    if($row["qty"]>0)
                    {
                      $avl = '<div class="badge badge-success badge-success-alt">IN STOCK</div>';
                    }
                    else
                    {
                      $avl = '<div class="badge badge-danger badge-danger-alt">OUT OF STOCK</div>';

                    }
                    echo '
                    <tr>
                    <td id="itmid">'.$row["id"].'</td>
                <td>
                  <a href="#">
                    <div class="d-flex align-items-center">
                      <!-- <div class="avatar avatar-blue mr-3"></div> -->
                      <img id="prodimg" class="mr-3" src="/img/product/'.$row["img"].'">

                      <div class="">
                        <p class="font-weight-bold mb-0">'.$row["title"].'</p>
                        <p class="badge badge-secondary">GOLD</p>
                      </div>
                    </div>
                  </a>
                </td>
                <td>'.$row["qty"].'</td>
                <td>'.$row["size"].'</td>
                <td>'.$row["weight"].' G</td>
                <td>₹'.$row["weight"]*$_SESSION["goldprice"].'</td>
                <td>'.$avl.'</td>
                <td>';

                if($row["qty"]>0)
                    {
                      echo '<button type="button" class="btn btn-danger mx-1" id="placeorder"><i class="fas fa-cart"></i> Place Order</button>';
                    }
                    else
                    {
                      echo '<p class="badge badge-warning text-dark">Fill Stock</p>';
                    }

                echo
                    
                  '<div class="dropdown">
                    <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top" title="Actions"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    
                    <button type="button" class="dropdown-item  mx-1" data-toggle="modal" data-target="#moredeatils" id="itemdetails"><i class="fas fa-info-circle"></i> Details</button>
                    
                      
                    </div>
                  </div>
                </td>
              </tr>
                    ';
                  }
             ?>
            </tbody>
          </table>
          <!-- <form action="editproducts.php" method="post">
                      <input type="hidden" name="itmid" value="'.$row["id"].'">
                      <button type="submit" href="editproducts.php" id="edititm" class="dropdown-item" name="edititm" ><i class="bx bxs-pencil mr-2"></i> Edit Item</button>
                      </form>
                    <button type="button" id="rmvitm" class="dropdown-item text-danger"><i class="bx bxs-trash mr-2"></i> Remove</button> -->
          <!-- end prod list -->

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
            <img  class="mr-3" id="itmimg" src="">
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">

            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Item Name </label>
              </div>
              <div class="col-md-5 col-6"><span id="iname"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Qty</label>
              </div>
              <div class="col-6"><span id="iqty"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Size(g) </label>
              </div>
              <div class="col-6"><span id="isize"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class=" col-5">
                <label style="font-weight:bold;">Weight </label>
              </div>
              <div class=" col-6"><span id="iweight"></span></div>
            </div>
            <hr />
            <div class="row">
              <div class="col-5">
                <label style="font-weight:bold;">Price </label>
              </div>
              <div class="col-6"> <span id="iprice"></span>₹</div>
            </div>
            <hr />
            <div class="row">
              <div class=" col-5">
                <label style="font-weight:bold;">Item Description </label>
              </div>
              <div class="col-6"> <span id="idesc"></span></div>
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
$( document ).ready(function() {
    var element = document.getElementById("product");
    var element2 = document.getElementById("openprod");
    element2.classList.add("menu-open");
    element.classList.add("active");
});


// delete product
$(document).ready(function () {

$('#example').on('click', '#rmvitm', function (e) {
  e.preventDefault();

  var pid = $(this).closest("tr").find("#itmid").text();

  $.ajax({
    type: "post",
    url: "common/api.php",
    data: {
      'delitm': true,
      'pid': pid
    },
    success: function (response) {
      swal
      ({
        title: "product deleted",
        icon: "success"
      }).then(function () {
        location.reload();
      });
    }
  });

});
});

// eshow item
$(document).ready(function(){
  $('.itmtable').on('click', '#itemdetails', function(e){
    e.preventDefault();
    var pid = $(this).closest("tr").find("#itmid").text();

    // shwo to modal
    $.ajax({
            type: 'POST',
            url:'../nrmuser/common/api.php',
            data: {
                'viewitmprod':true,
                'pid': pid,
            },
            success: function(response){
              // console.log(response);
                $.each(response, function (key, value) { 
                 
                    path = "/img/product/"
                    $('#itmimg').attr("src", path.concat(value['img']) );

                    $('#iname').text(value['title']);
                    $('#iqty').text(value['qty']);
                    $('#isize').text(value['size']);
                    $('#iweight').text(value['weight']);
                    $('#idesc').text(value['description']);
                    $('#iprice').text(value['price']);

                    
                    
                });
            }
        });

  });
});


// click order place button
$(document).ready(function () {

  $('.itmtable').on('click', "#placeorder", function(e){
    e.preventDefault();

    var pid = $(this).closest("tr").find("#itmid").text();
    
    $.ajax({
      type: "POST",
      url: "common/api.php",
      data: {
        "placedbtn": true,
        "pid": pid,
      },
      success: function (response) {
       localStorage.setItem('orditemdata', JSON.stringify(response));
       window.location.href = 'neworder.php';
      }
    });

  });
});

</script>