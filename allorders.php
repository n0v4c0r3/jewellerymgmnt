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
          <h1 class="m-0">All Orders</h1>
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
                <th>Invoice Id</th>
                <th>Customer Details</th>
                <th>phone</th>
                <th>City</th>
                <th>order Date</th>
                <th>Product Name</th>
                <th>order Total</th>
                <th>Actions</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php

              // delete order
              if(isset($_POST["ordid"]))
              {
                $oid = $_POST["ordid"];

                $sql = "DELETE FROM `orders` WHERE `id` = $oid";
                $conn->query($sql);
                echo '<meta http-equiv="refresh" content= "1;URL=?deleted" />';

              }

              // load data
             

              $sql = 'SELECT * FROM `orders` WHERE `ordstatus` = 1 || `ordstatus` = 2 ORDER BY `ord_date` ASC';
              $res = $conn->query($sql);
              while($row = $res->fetch_assoc())
              {
                $sql2 = "SELECT * FROM `products` WHERE `id`= {$row["pid"]}";
                $res2 = $conn->query($sql2);
                $row_prod = $res2->fetch_assoc();
              
                if($row["ordstatus"] == 1)
                {
                  $status = '<p class="badge badge-success">Complete</p>';
                }
                elseif($row["ordstatus"] == 2)
                {
                  $status = '<p class="badge badge-danger">Rejected</p>';
                }
              
              echo '<tr>
                <td id="itmid">'.$row["invoice"].'</td>
       
                <td>
                  <a href="#">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="font-weight-bold mb-0">'.$row["cfname"]."  ".$row["clname"].'</p>
                        <p class="badge badge-secondary text-dark ">'.$row[""].'</p>
                      </div>
                    </div>
                  </a>
                </td>
                <td>'.$row["cphone"].'</td>
                <td>'.$row["ccity"].'</td>
                <td>'.$row["ord_date"].'</td>
                <td>'.$row_prod["title"].'</td>
                <td>₹'.$row["psubtotal"].'</td>
                <td>
                <form action="orderdetails.php" method="post" class="d-inline">
                <input type="hidden" name="ordid" value="'.$row["id"].'">
                <input type="hidden" name="pordid" value="'.$row["pid"].'">
                <input type="submit" class="btn btn-warning mx-1" name="orerdetails" value="View Details">
                </form>
                <form action="allinv.php" method="post" class="d-inline">
                <input type="hidden" name="invoiceid" value="'.$row["invoice"].'">
                <input type="submit" class="btn btn-danger mx-1" name="generatebill" value="Generate Bill">
                </form>
                <form action="" method="post" class="d-inline">
                <input type="hidden" name="ordid" value="'.$row["id"].'">
                <input type="submit" class="btn btn-danger mx-1" name="rmvorder" value="Remove order">
                </form>
                  
                </td>
                <td>'.$status.'</td>
              </tr>';
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
</script>