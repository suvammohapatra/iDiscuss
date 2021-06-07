<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"  href="img/f.png"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Welcome To iDiscuss/Comments</title>
</head>

<body>
    <?php include 'partials/_header.php';?>
    <?php include 'partials/_dbconnect.php';?>
    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `catagories` WHERE catagory_id=$id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['catagory_name'];
        $catdesc = $row['catagory_description'];
    }


    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', CURRENT_TIMESTAMP())";
        $result = mysqli_query($conn,$sql);
        $showAlert = true;
        if($showAlert){
            echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Question has been Added.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                    
            
            
        }
    }
    
    ?>


    <div class="container my-4">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome to <?php echo $catname;?> forums!</h4>
            <p><?php echo $catdesc;?>.</p>
            <hr>

        </div>

    </div>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '<div class="container">
            <h1>Start Discussion </h1>
            <form action="'. $_SERVER["REQUEST_URI"]. '" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Keep your title .</div>
                </div>
                <input type="hidden" name="sno" value="'.$_SESSION['sno']. '">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Discuss your Problem</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';
    }
    else{
        echo '
        
        <div class="container">
        <h1>Start Discussion </h1>
        <p> You are not Logged in , Please Logged in to start a discussion.</p>
        </div>';
    }    
    ?>
    <div class="container my-3" id="ques">
        <h2> Questions</h2>
        <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
    $result = mysqli_query($conn,$sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_time = $row['timestamp'];
        $thread_user_id =$row['thread_user_id'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'" ;
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);

   
      echo '<div class="d-flex">
            <div class="flex-shrink-0">
                <img src="img/8.png" width="70px" alt="...">
            </div><br>
            
            <div class="flex-grow-1 ms-3">'.
               '<h5 class="mt-0"> <a href="thread.php?threadid= ' . $id . '" > '. $title .'</a></h5>
                '. $desc .'</div>'. '<p class="fw-bold my-0">Asked by : ' . $row2['user_email'] .' at ('. $thread_time .') </p> '.
           
        '</div>';
    }
    
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <p class="display-4">No Threads Found</p>
                    <p class="lead"> Be the first person to ask a question</p>
                </div>
            </div>';
        }
        
        
    ?>








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
      <br>  <?php include 'partials/_footer.php';?>