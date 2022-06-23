<?php 
include('common/header.php');
include('common/navbar.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // order details
   $invoicesrc = $_REQUEST["invoiceid"];
    
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Invoices</h1>
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
          <table id="example" class="table table-hover responsive nowrap" style="width:100%">
            <thead>
              <tr>
                <th>Invoice Id</th>
                <th>Customer name</th>
                <th>phone</th>
                <th>order Date</th>
                <th>Product Name</th>
                <th>order Total</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $quy = "SELECT * FROM `invoice`";
              $d = $conn->query($quy);
              while($row = $d->fetch_assoc())
              {

                $q = " SELECT * from `products` WHERE `id` = {$row['prodid']}";
                $dc = $conn->query($q);
                $row_prod = $dc->fetch_assoc();

                $q2=  "SELECT * FROM `orders` WHERE `invoice` = '{$row['invnum']}' ";
                $dc2 = $conn->query($q2);
                $row_prod2 = $dc2->fetch_assoc();

              echo '
              <tr>
                <td>'.$row["invnum"].'</td>

                <td>
                  <a href="#">
                    <div class="d-flex align-items-center">
                      <div class="">
                        <p class="font-weight-bold mb-0">'.$row_prod2["cfname"]." ".$row_prod2["clname"].'</p>
                      </div>
                    </div>
                  </a>
                </td>
                <td>'.$row_prod2["cphone"].'</td>
                <td>'.$row["generatedate"].'</td>
                <td>'.$row_prod["title"].'</td>
                <td>₹'.$row["ordertotal"].'</td>

                <td>
                  <form action="invoicedownload.php" method="post" class="d-inline">
                    <input type="hidden" name="ordid" value="'.$row["ordid"].'">
                    <input type="hidden" name="pordid" value="'.$row["prodid"].'">
                    <input type="submit" class="btn btn-danger mx-1" name="orerdetails" value="Download Bill">
                  </form>
                </td>
                
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
    var element = document.getElementById("bill");
    var element2 = document.getElementById("openbill");
    element2.classList.add("menu-open");
    element.classList.add("active");
  });
 
$(document).ready(function () {
  var src = "<?php echo $invoicesrc?>";
  console.log(src);

$('input[type=search]').val(src)
$("input[type=search]").focus();
var e = $.Event("keyup", { which: 32 });

$("input[type=search]").trigger( e );

});
</script>