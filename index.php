<?php
$msg = '';
session_start();
if(isset($_SESSION["userrole"]))
{
    header("LOCATION: dashboard.php");
}

if(isset($_POST['loginbtn']))
{
	include('common/database.php');

	$username = $conn->real_escape_string($_POST["loginemail"]);
	$password = $conn->real_escape_string($_POST["loginpass"]);
	// $urole = $conn->real_escape_string($_POST["userrole"]);

   
        $sql = "SELECT `id`, `username`, `email`,`password`,`img`,`role` FROM `admin` WHERE (`email` = '{$username}' OR `email`= '{$username}') AND `password` = '{$password}' AND `role` = 0";
        
        $result = $conn->query($sql);
    
    
        if($row = mysqli_num_rows($result) > 0)
        {
            while($row = $result->fetch_assoc())
            {
            session_start();
            $_SESSION["username"] = $row["username"];
            $_SESSION["userid"] = $row["id"];
            $_SESSION["useremail"] = $row["email"];
            $_SESSION["userrole"] = $row["role"]; //0 admin,1 sales
            $_SESSION["imgname"] = $row["img"];
            
    
            header("LOCATION: dashboard.php");
            }
        
        }
        else
        {
            $msg = "EMAIL OR PASSWORD  NOT MATCHED";
        }
 
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        .form-style input {
            border: 0;
            height: 50px;
            border-radius: 0;
            border-bottom: 1px solid #ebebeb;
        }

        .form-style input:focus {
            border-bottom: 1px solid #007bff;
            box-shadow: none;
            outline: 0;
            background-color: #ebebeb;
        }

        .sideline {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #ccc;
        }

        button {
            height: 50px;
        }

        .sideline:before,
        .sideline:after {
            content: '';
            border-top: 1px solid #ebebeb;
            margin: 0 20px 0 0;
            flex: 1 0 20px;
        }

        .sideline:after {
            margin: 0 0 0 20px;
        }
        .img-fluid{
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
    <div class="container">
        <div class="row m-5 no-gutters shadow-lg  align-items-center">
            <div class="col-md-6 d-none d-md-block">
                <img src="img/loginspalsh.jpg" class="img-fluid" />
            </div>
            <div class="col-md-6 bg-white p-5">
                <h3 class="pb-3">Admin Login</h3>
                <div class="form-style">
                    <form method="POST" action="" >
                        <div class="form-group pb-3">
                            <input type="email" placeholder="Email" class="form-control" name="loginemail" >
                        </div>
                        <div class="form-group pb-3">
                            <input type="password" placeholder="Password" class="form-control" name="loginpass">
                        </div>
                        <!-- <div class="form-group pb-3">
                            <select name="userrole" class="form-control text-danger" required>
                                <option selected value="0">ADMIN</option>
                                <option value="1">SELLS</option>
                            </select>
                            
                        </div> -->

                        <p class="text-danger warning p-3"><?php echo $msg; ?></p>

                        <div class="pb-2">
                            <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2" name="loginbtn">Submit</button>
                        </div>
                    </form>
                    <div class="sideline">OR</div>
  <div>
  <a href="/nrmuser/index.php" class="btn btn-primary w-100 font-weight-bold mt-2 p-3"><i class="fa fa-facebook" aria-hidden="true"></i> Login As Sales  Account</a>
  </div>
 
</div>

</div>
</div>
</div>
</html>