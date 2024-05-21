<?php 

include 'partials/conn_database.php';
$showAlert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"]=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    $existsqli = "SELECT * FROM user_data where username='$username'";
    $result = mysqli_query($conn,$existsqli);
    $num = mysqli_num_rows($result);
    if($num>0){
        $showerror = "user already exists";
    }
    else
    {
        if(($password == $cpassword)){
            $datainsert = "INSERT INTO user_data(username, password, tstamp) values ('$username', '$password', current_timestamp())";
            
            $result = mysqli_query($conn, $datainsert);
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showerror = "password didn't match";
        }
    }

}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
      
  <?php 
    if($showAlert){
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>success!</strong> You account created successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    if($showerror){
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>error! </strong> '.$showerror.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }



  ?>
      
        
        <?php  require 'partials/_nav.php' ?>

      <div class="container my-4">
          <h1 class="text-center">signup to our website</h1>
      
            <form action="/log_system/sign_up.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  </body>
</html>