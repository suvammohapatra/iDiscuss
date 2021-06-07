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
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno=$thread_user_id" ;
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];
       
    }
     ?>

    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $comment = $_POST['comment'];
            $sno = $_POST['sno'];
            $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', CURRENT_TIMESTAMP())";
            $result = mysqli_query($conn,$sql);
            $showAlert = true;
            if($showAlert){
                echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your Comment has been Added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                        
            }
        }
            
    
    ?>
    <div class="container my-4">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"><?php echo $title;?></h4>
            <p><?php echo $desc;?>.</p>
            <hr>
            <p>Posted by:<em> <?php echo $posted_by;?></em></p>
            
        </div>
    </div>



    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '<div class="container">
            <h1>Post Your Comments </h1>
          <form action="' .$_SERVER['REQUEST_URI'].'" method="post">
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Give your answer / solution.</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            <input type="hidden" name="sno" value="'.$_SESSION['sno']. '">
           </div>
           <button type="submit" class="btn btn-success">Post Comment</button>
          </form>
        </div>';
     
    }
    else{
    echo '
        
        <div class="container">
        <h1>Post Your Comments </h1>
            <p>
             You are not Logged in , Please Logged in to post a comment.
            </p>
        </div>';
    }
    ?>

    <div class="container my-3" id="ques">
        <h2> Comments </h2>
        <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
    $result = mysqli_query($conn,$sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];
        $comment_by=$row['comment_by'];

        $sql2 = "SELECT user_email FROM `users` WHERE sno='$comment_by'" ;
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
       
   
      echo '<div class="d-flex">
            <div class="flex-shrink-0">
                <img src="img/8.png" width="80px" alt="...">
            </div>

            <div class="flex-grow-1 ms-3">
            <p class="fw-bold my-0">Posted by : ' . $row2['user_email'] .' at ('. $comment_time .').</p>
                '. $content .'
            </div>
        </div>';  
            
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

    </div>

    <?php include 'partials/_footer.php';?>





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