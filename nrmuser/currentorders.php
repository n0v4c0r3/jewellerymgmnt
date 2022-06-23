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
      <div class="row">
        <div class="col-sm-12">
        <button class="btn btn-primary float-right" id="takeorder">Take New Order</button>
        </div>
      </div>
      <!-- /.row -->
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
                <th>Invoice Id</th>
                <th>Customer Details</th>
                <th>phone</th>
                <th>City</th>
                <th>order Date</th>
                <th>Product Name</th>
                <th>order Total</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // deliver order
              if(isset($_REQUEST["deliverditm"]))
              {
                $ordnum =$_POST["ordid"];

                $sql = "UPDATE `orders` SET `ordstatus`='1' WHERE `id` = $ordnum";
                $conn->query($sql);
                echo '<meta http-equiv="refresh" content= "1;URL=?updated" />';

              }
              // cancel order
              if(isset($_REQUEST["cancelorder"]))
              {
                $ordnum =$_POST["ordid"];

                $sql = "UPDATE `orders` SET `ordstatus`='2' WHERE `id` = $ordnum";
                $conn->query($sql);
                echo '<meta http-equiv="refresh" content= "1;URL=?updated" />';

              }

              $sql = 'SELECT * FROM `orders` WHERE `ordstatus` = 0';
              $res = $conn->query($sql);
              while($row = $res->fetch_assoc())
              {

                // get product name
                $sql2 ="SELECT * FROM `products` WHERE `id` = '{$row["pid"]}'";
                $res2 = $conn->query($sql2);
                $row_prod = $res2->fetch_assoc();
            

                  echo '<tr>
                    <td id="itmid">'.$row["invoice"].'</td>

                    <td>
                      <a href="#">
                        <div class="d-flex align-items-center">
                          <div class="">
                            <p class="font-weight-bold mb-0">'.$row["cfname"]."  ".$row["clname"].'</p>

                          </div>
                        </div>
                      </a>
                    </td>
                    <td>'.$row["cphone"].'</td>
                    <td>'.$row["ccity"].'</td>
                    <td>'.$row["ord_date"].' G</td>
                    <td>'.$row_prod["title"].'</td>
                    <td>₹'.$row["psubtotal"].'</td>
                    <td>

                    <form action="orderdetails.php" method="post" class="d-inline">
                    <input type="hidden" name="ordid" value="'.$row["id"].'">
                    <input type="hidden" name="pordid" value="'.$row["pid"].'">
                    <input type="submit" class="btn btn-warning mx-1" name="orerdetails" value="View Details">
                    </form>

                    <form action="" method="post" class="d-inline">
                    <input type="hidden" name="ordid" value="'.$row["id"].'">
                    <button type="submit" class="btn btn-success mx-1" id="isbillgen" name="deliverditm">Deliver Order</button>
                    <button type="submit" class="btn btn-danger mx-1" id="isbillgen2" name="cancelorder">cancel Order</button>
                    </form>

                    <form class="d-inline">
                    <input type="hidden" id="ordid" value="'.$row["id"].'">
                    <button type="button" class="btn btn-primary mx-1" id="generateinv">generate Invoice</button>
                    </form>
                    
                    </td>
                  </tr>';

                //check if bill avail diable btn
                $query = "SELECT * FROM `invoice` WHERE `invnum` = '{$row["invoice"]}'";
                $res1 = $conn->query($query);
                $isavail = mysqli_num_rows($res1);

                if($isavail == 0)
                {
                  echo "<script>console.log('this row is 0')</script>";
                  echo "
                  <script>;
                  document.getElementById('isbillgen').disabled = true;
                  document.getElementById('isbillgen2').disabled = true;
                  </script>";
                }
                else if($isavail ==1)
                {
                  echo "<script>console.log('this row is 1')</script>";
                  echo "<script>
                  document.getElementById('isbillgen').disabled = false;
                  document.getElementById('isbillgen2').disabled = false;
                  </script>";
                 
                }
                
              }
              ?>
            </tbody>
          </table>

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
            <img class="mr-3" id="itmimg" src="">
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
  $(document).ready(function () {
    var element = document.getElementById("orders");
    var element2 = document.getElementById("openord");
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
  $(document).ready(function () {
    $('.itmtable').on('click', '#orerdetails', function (e) {
      e.preventDefault();
      var pid = $(this).closest("tr").find("#itmid").text();


      // shwo to modal
      $.ajax({
        type: 'POST',
        url: 'common/api.php',
        data: {
          'ordview': true,
          'pid': pid,
        },
        success: function (response) {
          $.each(response, function (key, value) {
            path = "/img/product/"
            $('#itmimg').attr("src", path.concat(value['img']));

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

    $('.itmtable').on('click', "#placeorder", function (e) {
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

  // send generate bill
  $(document).ready(function () {

    $('.itmtable').on('click', "#generateinv", function (e) {
      // e.preventDefault();

      var oid = $('#ordid').val();

      var invid = $(this).closest("tr").find("#itmid").text();

      $.ajax({
        type: "POST",
        url: "common/api.php",
        data: {
          "geninv": true,
          "invid": invid,
        },
        success: function (response) {
            if (response != '0') {
           
            swal
            ({
              title: "Invoice Available Already",
              icon: "success"
            }).then(function () {
              window.location = "allorders.php";
               
            });
          } else {
            swal
            ({
              title: "Invoice Generated",
              icon: "success"
            }).then(function () {
              window.location = "allinv.php";
            });
            
          }
         
        }
      });

    });
  });


  // clear browser
  $('#takeorder').click(function (e) { 
    e.preventDefault();
    window.location.href = "allproduct.php"
    
  });


 
</script>