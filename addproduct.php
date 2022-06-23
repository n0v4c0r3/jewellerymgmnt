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
          <h1 class="m-0">Add Products</h1>
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
              if(isset($_REQUEST["addproduct"]))
              {

                $file = $_FILES['itmimg'];
                $itmphoto_name = $_FILES['itmimg']['name'];
                $file_tmp_loc = $_FILES['itmimg']['tmp_name'];
                $file_store_path = "img/product/".$itmphoto_name;
                move_uploaded_file($file_tmp_loc,$file_store_path);

                // product item

                $title = $_REQUEST['prodname'];
                $qty = $_REQUEST['qty'];
                $size = $_REQUEST['size'];
                $price = $_REQUEST['price'];

                $unescpdesc = $_REQUEST['proddesc'];
                $desc = $conn->real_escape_string($unescpdesc);
                $weight = $_REQUEST['weight'];

                echo '<script>alert('.$material.')</script>';

                $sql = "INSERT INTO `products`( `title`, `qty`, `size`, `price`, `description`, `weight`, `img`) 
                VALUES ('$title','$qty','$size','$price','$desc','$weight','$itmphoto_name')";
                $conn->query($sql);

                echo '<script>
										swal({
											title: "Product Added",
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

              
              ?>
              <form action="" method="POST" enctype="multipart/form-data">
              <!-- image -->
              <div class="form-group row">
                <label for="exampleFormControlFile1">Image</label>
                <div class="col-sm-5">
                  <input type="file" class="form-control-file file-input"  accept=".jpg,.png" name="itmimg" required> 
                </div>
                <div class="col-sm-5">
                  <div id="divImageMediaPreview"></div>
                </div>
              </div>
              <!-- Title -->
              
              <div class="form-group row">
                <label for="prodname" class="col-sm-2 col-form-label">Product Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="prodname" required>
                </div>
              </div>
              <!-- Qty -->
              <div class="form-group row">
                <label for="qty" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="qty" required>
                </div>
              </div>
              <!-- Size -->
              <div class="form-group row">
                <label for="size" class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="size" required>
                </div>
              </div>

              <!-- Weight -->
              <div class="form-group row">
                <label for="weight" class="col-sm-2 col-form-label">Material Weight(g)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="weight" id="weight" step="any" required>
                </div>
              </div>

              <!-- Price -->
              <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Current price(RS)</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="price" id="calcprice" step="any" required>
                </div>
              </div>
              <!-- Description -->
              <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                  <textarea id="textarea" name="proddesc" cols="40" rows="5" class="form-control"
                    id="description" required></textarea>
                </div>
              </div>

              <button type="submit" name="addproduct" class="btn btn-primary">ADD PRODUCT</button>
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