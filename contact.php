<?php include 'partials/_header.php';?>
<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include 'partials/_dbconnect.php';
        $username=$_POST["username"];
		$emailid=$_POST["emailid"];
		$mobileno=$_POST["mobileno"];
		$description=$_POST["description"];
        
        $sql="INSERT INTO `contactus` (`username`, `emailid`, `mobileno`, `description`, `dt`) VALUES ('$username', '$emailid', '$mobileno', '$description', CURRENT_TIMESTAMP())";
        
        
        mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn)==true)
        {
            $msg="Submited Successfully";
        }else{
            $msg="Try again";
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"  href="img/f.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Welcome To iDiscuss/Contact Us</title>
    <style>
    .container {
        min-height: 100vh;
        text-align: center;
        border:3px solid black;
        border-radius:20px;
    }
    </style>



</head>


<body>

    <div class="container my-3">
        <strong><h1> CONTACT US </h1></strong>
        <hr><br><br>
        
        <form method="post" >
            <div class="mb-3">
               <h4><b> Full Name  </b></h4> <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
               
               
            </div>
            <div class="mb-3">
            <h4><b> Email Id  </b></h4>  <input type="email" class="form-control" id="exampleInputEmail1" name="emailid" aria-describedby="emailHelp">
               
                
            </div>
            <div class="mb-3">
            <h4><b> Mobile No  </b></h4> <input type="text" class="form-control" name="mobileno" id="exampleInputPassword1">
               
            </div>
            <div class="mb-3">
            <h4><b> What can i help you ?</b></h4> <input type="text" class="form-control" name="description" id="exampleInputPassword1">
                
            </div>
            
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        <h2><span><?php echo @$msg; ?> </span></h2>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php include 'partials/_footer.php';?>