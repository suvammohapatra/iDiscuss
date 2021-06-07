<?php
include 'partials/_loginmodal.php';
session_start();

 echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container-fluid">
  <a class="navbar-brand" href="index.php">iDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link " href="contact.php" tabindex="-1" >Contact Us</a>
      </li>
    </ul>
    <div class="mx-2 my-1">';
    
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
      echo '<p class="text-light"> Welcome to :-  ' . $_SESSION['user_email'] . ' <a href="/test/forum/partials/_logout.php" class="btn btn-primary ml-2" >Logout</a></p>';
    }
    else{
      echo '<button class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
            <button class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#signupmodal">SignUp</button>';
      }
    

    
       echo '</div>
          </div> 
          </div>
            </nav>';

         



   

 
 include 'partials/_signupmodal.php';

 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
      echo  '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Success!</strong> You can now Login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
 }
?>