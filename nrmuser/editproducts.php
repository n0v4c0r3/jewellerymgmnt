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
          <h1 class="m-0">Update Products</h1>
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
              <h5 class="m-0">Product Details</h5>
              <span>Live Gold Price(pergram): <h4 class="text-success" id="gprice"> <?php echo $_SESSION["goldprice"]?> ₹</h4>
            </div>
            <div class="card-body">
              
              <?php

              if(isset($_REQUEST["edititm"]))
              {
                $uiid = $_POST["itmid"];
                
                $sql = "SELECT * FROM `products` where `id` = $uiid";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                
              

              }

                
              // update Item

              if(isset($_REQUEST["updateproduct"]))
              {

               

                $file = $_FILES['itmimg'];
                $itmphoto_name = $_FILES['itmimg']['name'];
                $file_tmp_loc = $_FILES['itmimg']['tmp_name'];
                $file_store_path = "img/product/".$itmphoto_name;
                move_uploaded_file($file_tmp_loc,$file_store_path);

                // product item

                $pid = $_REQUEST['proid'];

                $title = $_REQUEST['prodname'];
                $qty = $_REQUEST['qty'];
                $size = $_REQUEST['size'];
                $price = $_REQUEST['price'];

                $unescpdesc = $_REQUEST['proddesc'];
                $desc = $conn->real_escape_string($unescpdesc);

                $weight = $_REQUEST['weight'];

                // if photo available

                if($itmphoto_name == "")
                {

                $sql = "UPDATE `products` SET `title`='$title',`qty`='$qty',`size`='$size',`price`='$price',`description`='$desc',`weight`='$weight' WHERE `id` = $pid";
                // echo $sql;die();
                $conn->query($sql);

                echo '<script>
										swal({
											title: "Product Updated",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
										echo '
                    <script>
                    window.setTimeout(function() {
                      window.location.href = "/allproduct.php";
                    }, 2000);
                    </script>'; 
                

                }

                if($itmphoto_name != "")
                {
                $sql = "UPDATE `products` SET `title`='$title',`qty`='$qty',`size`='$size',`price`='$price',`description`='$desc',`weight`='$weight',`img`='$itmphoto_name' WHERE `id` = $pid";
                // echo $sql;die();
                $conn->query($sql);

                echo '<script>
										swal({
											title: "Product Updated",
											icon: "success",
											button: "close",
											type: "success"
										});
										</script>';
										echo '
                    <script>
                    window.setTimeout(function() {
                      window.location.href = "/allproduct.php";
                    }, 2000);
                    </script>'; 

                }

              }
              ?>

              <form action="" method="POST" enctype="multipart/form-data">
              <!-- image -->
              <div class="form-group row">
                <label for="exampleFormControlFile1">Image</label>
                <div class="col-sm-5">
                  <input type="file" class="form-control-file file-input"  accept=".jpg,.png" id="tesdt" name="itmimg"> 
                </div>
                <div class="col-sm-5">
                  <div id="divImageMediaPreview"></div>
                </div>
              </div>
              <!-- Title -->
              <div class="form-group row">
                <label for="prodname" class="col-sm-2 col-form-label">Product Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="prodname" value="<?php echo $row["title"]?>" required>
                  <input type="hidden" name="proid" value="<?php echo $row["id"]?>">
                </div>
              </div>
              <!-- Qty -->
              <div class="form-group row">
                <label for="qty" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="qty" value="<?php echo $row["qty"]?>" required>
                </div>
              </div>
              <!-- Size -->
              <div class="form-group row">
                <label for="size" class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="size" value="<?php echo $row["size"]?>" required>
                </div>
              </div>
              <!-- Weight -->
              <div class="form-group row">
                <label for="weight" class="col-sm-2 col-form-label">Weight(g)</label>
                <div class="col-sm-10">
                  <input type="number" step="any" class="form-control" name="weight" id="weight" value="<?php echo $row["weight"]?>" required>
                </div>
              </div>
              <!-- Price -->
              <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">price(RS)</label>
                <div class="col-sm-10">
                  <input type="number" step="any" class="form-control" name="price" id="calcprice" value="<?php echo $row["price"]?>" required>
                </div>
              </div>
              <!-- Description -->
              <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                  <textarea id="textarea" name="proddesc" cols="40" rows="5" class="form-control" id="description" required><?php echo $row["description"]?></textarea>
                </div>
              </div>
              

              <button type="submit" name="updateproduct" class="btn btn-primary">UPDATE PRODUCT</button>
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
include('common/footer.php');
?>
<script>
$( document ).ready(function() {
    var element = document.getElementById("product");
    var element2 = document.getElementById("openprod");
    element2.classList.add("menu-open");
    element.classList.add("active");
});

// calculate price

$(document).ready(function () {
  var goldprice = $('#gprice').text().replace(" ₹", '');
  $('#weight').keyup(function (e) { 
    e.preventDefault();
    var weight = $('#weight').val();
    var calcprice = parseFloat(goldprice)*parseFloat(weight);
    $('#calcprice').val(calcprice);
  });
});

</script>