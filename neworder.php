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
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-sm-12">
        <button class="btn btn-primary float-right" id="clearallbtn">Take New Order</button>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      
      <div class="row">
        <form class="col-12">
        <!-- /.col-md-6 -->
        <div class="col-lg-12" id="orderplaceform">
            <div class="card card-primary card-outline">
              <div class="row p-4">
                <div class="col-12">
                  <h1>Order Details</h1>
                  <span>Live Gold Price(pergram):</span> 
                  <h4 class="text-success" id="atmgprice"> <?php echo $_SESSION["goldprice"]?> ₹</h4>
                  <hr class="mt-1">
                </div>
                <!--customer Details -->
                <div class="col-12">
                  <div class="row mt-3 mx-4">
                    <div class="col-12">
                      <label class="order-form-label">Invoice Number</label>
                    </div>
                    <div class="col-12">
                      <input class="order-form-input" id="invoicenum" disabled>
                    </div>
                  </div>

                  <div class="row mx-4">
                    <div class="col-12 mb-2">
                      <label class="order-form-label">Name</label>
                    </div>
                    <div class="col-12 col-sm-6">
                      <input class="order-form-input" placeholder="First" id="Cfname" required>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <input class="order-form-input" placeholder="Last" id="Clname" required>
                    </div>
                    <div class="col-12">
                      <label class="order-form-label">Customer Phone</label>
                    </div>
                    <div class="col-12">
                      <input class="order-form-input" type="number" placeholder="mobile number" id="cphone" required >
                    </div>
                    <div class="col-12">
                      <label class="order-form-label">Customer Email</label>
                    </div>
                    <div class="col-12">
                      <input class="order-form-input" type="email" placeholder="email address" id="cemail" >
                    </div>
                  </div>

                  <div class="row mt-3 mx-4">
                    <div class="col-12">
                      <label class="order-form-label" for="date-picker-example">Date of Purchase</label>
                    </div>
                    <div class="col-12">
                      <input class="order-form-input datepicker" type="date" id="cbdate" value ="<?php echo date('Y-m-d') ?>" disabled>
                    </div>
                  </div>

                  <div class="row mt-3 mx-4">
                    <div class="col-12">
                      <label class="order-form-label" for="date-picker-example">Time of Purchase</label>
                    </div>
                    <div class="col-12">
                      <input class="order-form-input datepicker" type="time" id="cbtime" value="<?= date('H:i'); ?>" disabled>
                    </div>
                  </div>

                  <div class="row mt-3 mx-4">
                    <div class="col-12">
                      <label class="order-form-label">Customer Adress</label>
                    </div>
                    <div class="col-12">
                      <input class="order-form-input" placeholder="Street Address" id="cadd1" required>
                    </div>
                    <div class="col-12 mt-2">
                      <input class="order-form-input" placeholder="Street Address Line 2" id="cadd2" >
                    </div>
                    <div class="col-12 col-sm-6 mt-2 pr-sm-2">
                      <input class="order-form-input" placeholder="City" id="ccity" required>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 pl-sm-0">
                      <input class="order-form-input" placeholder="Region" id="cregion" required>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 pr-sm-2">
                      <input class="order-form-input" placeholder="Postal / Zip Code" id="czip" required>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 pl-sm-0">
                      <input class="order-form-input" placeholder="Country" id="ccountry" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- customer detail end -->
            <!-- order product card -->
            <div class="card card-primary card-outline">
              <div class="row p-4">
                <div class="col-12">
                  <h1>Product Details</h1>
                  <hr class="mt-1">
                </div>
                <!--Product Details -->

                <div class="col-12">
                  <img src="" id="ord-pic">
                  <div class="row mx-4">
                    <div class="col-12 col-sm-6">
                      <span>product ID: </span>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <span class="font-weight-bold text-right" id="prodid"></span>
                    </div>
                    <div class="col-12 col-sm-6">
                      <span>product Title: </span>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <span class="font-weight-bold text-right" id="ptitle"></span>
                    </div>
                  </div>
                  
                  <div class="row mx-4">
                    <div class="col-12 col-sm-6">
                      <span>product Size: </span>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <span id="psize"></span>
                    </div>
                  </div>

                  <div class="row mx-4">
                    <div class="col-12 col-sm-6">
                      <span>Material Weight: </span>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <span id="pweight"></span>
                    </div>
                  </div>

                  <div class="row mx-4">
                    <div class="col-12 col-sm-6">
                      <span>product Cost: </span>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <span class="font-weight-bold text-danger" id="pcost"></span>
                    </div>
                  </div>

                  <div class="row mx-4">
                    <div class="col-12 col-sm-6">
                      <span>GST RATE: </span>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <div class="input-group ">
                        <div class="input-group-prepend">
                          <div class="input-group-text">%</div>
                        </div>
                        <input type="number" class="form-control col-5" id="gstin" value="18" required>
                      </div>
                    </div>
                  </div>
                  <div class="row mx-4">
                    <div class="col-12 col-sm-6">
                      <span>GST: </span>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <span class="font-weight-bold"></span>
                      <span class="font-weight-bold" id="gstrate"></span>
                    </div>
                  </div>

                  <div class="row mx-4">
                    <div class="col-12 col-sm-6">
                      <span>Total Cost: </span>
                    </div>
                    <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                      <span class="font-weight-bold" id="totcost"></span>
                    </div>
                  </div>

                </div>
              </div>
              <button type="submit" class="btn btn-danger m-4" id="placeorder">PLACE ORDER</button>
            </div>
            <!-- product details End -->
        </div>
        </form>
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

  // get order details
  $(document).ready(function () {
    var itemdata = JSON.parse(localStorage.getItem('orditemdata'));
    

    $.each(itemdata, function (key, value) {

      // set image
      path = "/img/product/"
      $('#ord-pic').attr("src", path.concat(value['img']) );

      // gold price
      var goldvalue = <?php echo $_SESSION['goldprice'] ?> ;

      $('#prodid').text(value['id']);
      $('#ptitle').text(value['title']);
      $('#psize').text(value['size']);
      $('#pweight').text(value['weight']).append(" Gram");
      var prodprice = goldvalue * value["weight"];
      var prodprice = prodprice.toFixed(2);
      $('#pcost').text(prodprice).append(" ₹");

      // total cost add Gst
      $(document).ready(function (e) {
          var gstval = $('#gstin').val();
          var price = prodprice;
          var gstsum =((price*gstval)/100) + parseFloat(price);
          var gstsum = gstsum.toFixed(2);
          $('#gstrate').text(parseFloat(gstsum-price).toFixed(2)).append(" ₹");
          $('#totcost').text(parseFloat(gstsum)).append(" ₹");
        
        $('#gstin').keyup(function () { 
         
          var gstval = $('#gstin').val();
          var price = prodprice;
          var gstsum =((price*gstval)/100) + parseFloat(price);
          var gstsum = gstsum.toFixed(2);
          $('#gstrate').text(parseFloat(gstsum-price).toFixed(2)).append(" ₹");
          $('#totcost').text(parseFloat(gstsum)).append(" ₹");
        });
        

      });
    
    });
  });

  // clear browser
  $('#clearallbtn').click(function (e) { 
    e.preventDefault();
    localStorage.clear();
    window.location.href = "allproduct.php"
    
  });

// generate invoice number

$(document).ready(function () {
var d = new Date(); 
var t = new Date().getTime();
var randomnum = Math.floor(Math.random() * (1000 -  500000)) + 1000;
randomnum = d.getFullYear() + (d.getMonth()+1) + (d.getDate()) + randomnum; 
randomnum = randomnum + t;
randomnum = "INVOICE-"+randomnum;
$('#invoicenum').val(randomnum);
});

// confirm order details

$(document).ready(function () {

  $('#orderplaceform').on('click', '#placeorder', function (e) {
    // get product id
    var prodid = $('#prodid').text()
    
    // get data values
    var gprice = $('#atmgprice').text().replace(" ₹","") ;

    var invnum = $('#invoicenum').val();

    var fname = $('#Cfname').val();
    var lname = $('#Clname').val();
    var phone = $('#cphone').val();
    var email = $('#cemail').val();
    var date = $('#cbdate').val();
    var time = $('#cbtime').val();
    var add1 = $('#cadd1').val();
    var add2 = $('#cadd2').val();
    var city = $('#ccity').val();
    var region = $('#cregion').val();
    var zip = $('#czip').val();
    var country = $('#ccountry').val();


    var pcost = $('#pcost').text().replace(" ₹","");
    var gstpercent = $('#gstin').val();
    var pgst = $('#gstrate').text().replace(" ₹","");
    var ptotal = $('#totcost').text().replace(" ₹","");

    if( fname == '' || lname == '' || phone == '' || add1 == '' || city == '' || region == '' || country == '' || gstpercent == '' )
    {
      alert("all empty");
      console.log("pass")
    }

    else{
      $.ajax({
      type: "POST",
      url: "common/api.php",
      data: {
        'orderplaced': true,

        'atmgprice': gprice,

        'invnum': invnum,

        'fname': fname,
        'lname': lname,

        'phone': phone,
        'email': email,

        'date': date,
        'time': time,

        'address1': add1,
        'address2': add2,
        'city': city,
        'region': region,
        'zip': zip,
        'country': country,

        'pid': prodid,

        'gstpercent': gstpercent, 
        'pgst': pgst,
        'pcost': pcost,
        'psub': ptotal,

      },
      success: function (response) {
        localStorage.clear();
        window.location = "currentorders.php";
          // swal({
          //       title: "Order Confirmed",
          //       text: "order procesing...",
          //       icon: "success",
          //       button: "View Order",
          //       type: "success"
          //   }).then(function() {
          //       window.location = "currentorders.php";
          //   });

       

      }
      
     
    });
    }

    
  });
});



</script>