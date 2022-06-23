<?php 
include('common/header.php');
include('common/navbar.php');

// card 1
$sql1 = "SELECT sum(`psubtotal`) as totalincm FROM `orders` WHERE `ordstatus` = '1';";
$res1 =$conn->query($sql1);
$data1 = $res1->fetch_assoc();
$total_earnings = $data1["totalincm"];

// card 2

$sql2 = "SELECT count(id) FROM `orders` WHERE ordstatus = 0";
// echo $sql2;die();
$data2= $conn->query($sql2);
$result2 = mysqli_fetch_row($data2);
$num = $result2[0];

if( $num > 0)
{
    $ongoingno = $result2[0];
}
else{
    $ongoingno = 0;
}

// card 3

$sql3 = "SELECT count(id) FROM `orders` WHERE ordstatus = 1";
// echo $sql2;die();
$data3 = $conn->query($sql3);
$result3 = mysqli_fetch_row($data3);
$num3 = $result3[0];

if( $num > 0)
{
    $ordnum = $result3[0];
}
else{
    $ordnum = 0;
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>₹ <?php echo $_SESSION["goldprice"]?></h3>

                            <p>Today Gold Price</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <div class="card card-primary p-3">
                        <span>Calender</span>
                        <h1><?php echo date("d-M") ?></h1>
                    </div>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-4">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>₹ <?php echo $total_earnings; ?></h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="currentorders.php" class="small-box-footer">Check Now <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-4">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $ongoingno; ?></h3>

                            <p>Current No of Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="currentorders.php" class="small-box-footer">Check Now <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-4">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $ordnum; ?></h3>

                            <p>Total Sales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="allorders.php" class="small-box-footer">Check Now <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">


                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Recent Orders</h3>

                            <div class="card-tools">
                                <a href="currentorders.php" class="btn btn-success p-2">VIEW ORDER</a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-2">
                            <table id="example" class="table table-hover responsive nowrap itmtable" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Invoice Id</th>
                                        <th>Purchase Date</th>
                                        <th>Customer Name</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php
                    $sql = 'SELECT * FROM `orders` WHERE `ordstatus` = 0';
                    $res = $conn->query($sql);
                    while($row = $res->fetch_assoc())
                    {
                        echo '
                        <tr>
                        <td><span class="badge badge-success">New ORDER</span></td>
                        <td>'.$row["invoice"].'</td>
                        <td>'.$row["ord_date"].'</td>
                        <td>'.$row["cfname"].$row["clname"].'</td>
                        <td>'.$row["psubtotal"].'</td>
                        </tr>
                        ';

                    }
      
                    ?>


                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <!-- /.col-md-6 -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include('common/footer.php');
?>
<script>
    $('#inline-picker').mobiscroll().datepicker({
        controls: ['calendar'],
        display: 'inline',
        touchUi: true
    });

    $(document).ready(function () {
        var element = document.getElementById("dash");
        element.classList.add("active");
    });
</script>