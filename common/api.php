<?php


include('database.php');

// users.php
if(isset($_POST['viewbtn']))
{
	$id = $_POST['uid'];
	$res_array = [];

	$sql = "SELECT * FROM `admin` WHERE `id` = '{$id}'";
	$result = $conn->query($sql);

	if(mysqli_num_rows($result) > 0){
		foreach($result as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}
	
}

// update profile details

if(isset($_POST["submitupdate"]))
{
	$id = $_POST['uid'];
	
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	
	$sql = "UPDATE `admin` SET `fname`='$fname',`lname`='$lname',`phone`='$phone',`address`='$address',`city`='$city',`state`='$state' WHERE `id` = $id";
	$conn->query($sql);
}
// update profile password

if(isset($_POST["newpassword"]))
{
	$id = $_POST['uid'];
	
	$password = $_POST["newpass"];

	$sql = "UPDATE `admin` SET `password`='$password' WHERE `id` = $id";
	$conn->query($sql);
}

// delete employee data

if(isset($_POST["deletedata"]))
{
	$id = $_POST['eid'];

	$sql = "DELETE FROM `employee` WHERE id = $id";
	$conn->query($sql);
}

// employee data view and load edit data
if(isset($_POST['empdata']))
{
	$eid = $_POST['eid'];
	$res_array = [];

	$sql = "SELECT * FROM `employee` WHERE `id` = '{$eid}'";
	$result = $conn->query($sql);

	if(mysqli_num_rows($result) > 0){
		foreach($result as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}
	
}

// update employee data
if(isset($_POST["empsubmitupdate"]))
{
	$eid = $_POST["euid"];

	$fname =$_POST['efname'];
	$lname =$_POST['elname'];
	$phone =$_POST['ephone'];
	$email =$_POST['eemail'];
	$address =$_POST['eaddress'];
	$city =$_POST['ecity'];
	$state =$_POST['estate'];
	$zip =$_POST['ezip'];
	$position =$_POST['epos'];

	$sql = "UPDATE `employee` SET `fname`='$fname',`lname`='$lname',`phone`='$phone',`email`='$email',`address`='$address',`city`='$city',`state`='$state',`zip`='$zip',`position`='$position' WHERE `id` = $eid";
	$conn->query($sql);
	echo $sql;
}

// delete product

if(isset($_POST["delitm"]))
{
	$pid = $_POST['pid'];

	$sql = "DELETE FROM `products` WHERE id = $pid";
	$conn->query($sql);
}

// view product details

if(isset($_POST["viewitm"]))
{
	$prodid = $_POST["pid"];
	$res_array = [];

	$sql = "SELECT * FROM `products` WHERE `id` = '{$prodid}'";
	$result = $conn->query($sql);

	if(mysqli_num_rows($result) > 0){
		foreach($result as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}
}

// order item details to neworder page

if(isset($_POST["placedbtn"]))
{
	$prodid = $_POST["pid"];
	$res_array = [];

	$sql = "SELECT * FROM `products` WHERE `id` = '{$prodid}'";
	$result = $conn->query($sql);

	if(mysqli_num_rows($result) > 0){
		foreach($result as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}
}


// take new order
if(isset($_POST["orderplaced"]))
{
	$pid = $_POST["pid"];

	$invid = mysqli_escape_string($conn, $_POST["invnum"]);

	$gprice = $_POST["atmgprice"];

	$gstcost = $_POST["pgst"];
	$gstpercent = $_POST["gstpercent"];
	$prodcost = $_POST["pcost"];
	$prodtotal = $_POST["psub"];

	$fname = $_POST["fname"];
	$lname = $_POST["lname"];

	$phone = $_POST["phone"];
	$email = $_POST["email"];

	$date = $_POST["date"];
	$time = $_POST["time"];

	$add1 =  mysqli_escape_string($conn,$_POST["address1"]);
	$add2 =  mysqli_escape_string($conn,$_POST["address2"]);
	$city = $_POST["city"];
	$region = $_POST["region"];
	$zip = $_POST["zip"];
	$country = $_POST["country"];

	// decrease prod quantity
	$sql_ = "SELECT * FROM `products` WHERE `id` = $pid";
	$result = $conn->query($sql_);
	$res = $result->fetch_assoc();
	$val = $res["qty"];

	// update quantity to 2
	$new_qty = $val - 1;

	$sql_ord = "INSERT INTO `orders`(`invoice`, `cfname`, `clname`, `cphone`, `cemail`, `caddress`, `caddresssecond`, `ccity`, `cregion`, `czip`, `ccountry`, `ord_date`, `ord_time`, `goldpriceatm`, `pid`, `pcost`, `pgst`, `pgstpercent`, `psubtotal`, `ordstatus`) 
								VALUES ('$invid','$fname','$lname','$phone','$email','$add1','$add2','$city','$region','$zip','$country','$date','$time','$gprice','$pid','$prodcost','$gstcost','$gstpercent','$prodtotal',0)";

	$sql_prod = "UPDATE `products` SET `qty`= '$new_qty' WHERE `id` = $pid";

	$conn->query($sql_ord);
	$conn->query($sql_prod);
	
	
	
}


// view order details current order

if(isset($_POST["viewitm"]))
{
	$ordid = $_POST["ordview"];
	$res_array = [];

	$sql = "SELECT * FROM `products` WHERE `id` = '{$prodid}'";
	$result = $conn->query($sql);

	if(mysqli_num_rows($result) > 0){
		foreach($result as $row)
		{
			array_push($res_array, $row);
			header('Content-type: application/json');
			echo json_encode($res_array);
		}
	}
}
// check username on useradd
if(isset($_POST["user_name"]))
{
    $username = $_POST["user_name"];
    $query = "SELECT * FROM `admin` WHERE `username` = '{$username}'";
    $res = $conn->query($query);
    echo mysqli_num_rows($res);
}
// email check on useradd
if(isset($_POST["user_email"]))
{
    $usermail = $_POST["user_email"];
    $query = "SELECT * FROM `admin` WHERE `email` = '{$usermail}'";
    $res = $conn->query($query);
    echo mysqli_num_rows($res);
}

// vGenerate order

if(isset($_POST["geninv"]))
{
	$invnum = $_POST["invid"];

	// check on invoice first
	$query1 = "SELECT * FROM `invoice` WHERE `invnum` = '{$invnum}'";
    $res1 = $conn->query($query1);
    echo mysqli_num_rows($res1);
	
	if( mysqli_num_rows($res1) == 0 )
	{
		// get cell data
		$sql = "SELECT * FROM `orders` WHERE `invoice` = '{$invnum}'";
		$res = $conn->query($sql);
		$data=$res->fetch_assoc();

		// sendf to invoice
		$sql2 = "INSERT INTO `invoice`( `invnum`, `ordid`, `generatedate`, `ordertotal`, `prodid`,`invordstatus`) 
		VALUES ('{$data["invoice"]}','{$data["id"]}','{$data["ord_date"]}','{$data["psubtotal"]}','{$data["pid"]}','{$data["ordstatus"]}')";
		$conn->query($sql2);
	}
	

	
}
?>