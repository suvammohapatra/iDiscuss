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
        #ques{
            min-height: 433px;
            justify-content: center;
            align-items: center;
        }
       .hp{
           text-align:center;
       }
       .container{
           align-items:center;
       }
       .my-1{
        /* margin: -165px;
        padding: -30px; */
        justify-content: center;
        align-items: center;
        row-gap: 25px;
        column-gap: 53px;

        }  
     
        
    </style>
    <title>Welcome to iDiscuss</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>


    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/5.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/6.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/4.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container my-4" id="ques">
        <b><h1 class="text-center my-3"> iDiscuss Catagories</h1></b>
        <hr>
        
        <div class="row my-1">

            <?php 
              $sql = "SELECT * FROM `catagories`";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_assoc($result)){
                //  echo $row['catagory_id'];
                $id = $row['catagory_id'];
                $cat = $row['catagory_name'];
                $desc = $row['catagory_description'];
                echo '<div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="img/card-'.$id.'.jpg" class="card-img-top"  alt="image for this '.$id.'catagory">
                        <div class="card-body">
                            <h5 class="card-title"><a href="threadlist.php?catid='. $id .'">'. $cat .'</h5></a>
                            <p class="card-text">' . substr($desc,0 ,90) .'...</p>
                             <a <p href="threadlist.php?catid='. $id .'" class="btn btn-primary" >Start Discuss</p> </a>
                        </div>
                    </div>
                </div>';

              }


            ?>


        </div>
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