<?php 
include('/nrmuser/common/header.php');
include('/nrmuser/common/navbar.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // order details
   $orderid = $_REQUEST["ordid"];

   $sql = "SELECT * FROM `orders` WHERE `id`= $orderid";
   $res =$conn->query($sql);
   $data = $res->fetch_assoc();

  //  product details

   $prodid = $_REQUEST["pordid"];
   $sql2 = "SELECT * FROM `products` WHERE `id`= $prodid";
   $res2 =$conn->query($sql2);
   $data2 = $res2->fetch_assoc();
    
}
?>
 <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'left=0,top=0,width=700,height=920,toolbar=1,scrollbars=1,status=0');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body style="font-size:2px !important;" ></html>');
            a.document.close();
            a.print();
        }
    </script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Order Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="currentorders.php" class="btn btn-primary">BACK</a>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <button type="button" class="btn-danger btn p-3 m-3" onclick="printDiv()">DOWNLOAD BILL OR PRINT</button>
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
          <div id="GFG">
          <div class="card card-primary card-outline" >
            <div class="card-header">
              <h5 class="m-0">Invoice ID: <?php echo $data["invoice"]?></h5>
            </div>
            <div class="card-body">
              <!-- details -->
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <img class="mr-3" id="itmimg" src="<?php echo "/img/product/".$data2["img"]?>">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-12">

                  <div class="row">
                    <div class="col-5">
                      <label style="font-weight:bold;">Customer Name </label>
                    </div>
                    <h5 class="col-md-5 col-6"><?php echo $data["cfname"]."  ".$data["clname"]?></h5>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-5">
                      <label style="font-weight:bold;">phone</label>
                    </div>
                    <h5 class="col-6"><?php echo $data["cphone"]?></h5>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-5">
                      <label style="font-weight:bold;">email</label>
                    </div>
                    <h5 class="col-6"><?php echo $data["cemail"]?></h5>
                  </div>
                  <hr />
                  <div class="row">
                    <div class=" col-5">
                      <label style="font-weight:bold;">address</label>
                    </div>
                    <h5 class=" col-6">
                      <?php echo $data["caddress"].",".$data["caddresssecond"].",</br>".$data["ccity"].",".$data["cregion"].",".$data["czip"].",".$data["ccountry"]?>
                    </h5>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-5">
                      <label style="font-weight:bold;">order Date </label>
                    </div>
                    <h5 type="date" class="col-6"><?php echo date("d-M-Y",strtotime($data["ord_date"]))?></h5>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-5">
                      <label style="font-weight:bold;">order Item </label>
                    </div>
                    <h5 class="col-6"><?php echo $data2["title"]?></h5>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-5">
                      <label style="font-weight:bold;">product cost </label>
                    </div>
                    <h5 class="col-6">₹ <?php echo $data["pcost"]?></h5>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-5">
                      <label style="font-weight:bold;">Gst: </label>
                    </div>
                    <h5 class="col-6">₹ <?php echo $data["pgst"]."(".$data["pgstpercent"]."%)"?></h5>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-5">
                      <label style="font-weight:bold;">Subtotal </label>
                    </div>
                    <h5 class="col-6 text-danger">₹ <?php echo $data["psubtotal"]?></h5>
                  </div>
                  <hr />
                </div>
              </div>

              <!-- end -->
            </div>

          </div>
          </div>
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
    var element = document.getElementById("product");
    var element2 = document.getElementById("openprod");
    element2.classList.add("menu-open");
    element.classList.add("active");
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