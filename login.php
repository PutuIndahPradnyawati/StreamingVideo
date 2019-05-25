<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
  include 'config.php';
  
  // $pesan="";
  // if (isset($_SESSION['id_user'])) {
  //   header("location:upload.php");
  // }

  if(isset($_POST['login'])){
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $check = "SELECT * FROM user WHERE email_user = '$email' AND password_user ='$password'";
    $result = mysqli_query($con,$check);
    if(mysqli_num_rows($result)===1){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id_user'] = $row['id_user'];
      header('location: dashboard_user.php');
    }
   
    else{
      $pesan = "Login Gagal";
    }
  }
  ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Jake Rocheleau">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="volto.ico">
  <link rel="icon" href="volto.ico">

  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <img src="images/user@2x.png" alt="Avatar">
                </div>              
                <h4 class="modal-title">Member Login</h4>   
                <a href="index.php"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" required="required">     
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
                           <span class="glyphicon glyphicon-eye-open form-control-feedback" id="show-password" style="pointer-events: inherit;cursor: pointer;"></span>
                      </div>
                    
                         
                    </div>        
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="signUp.php">Not registered? <b>Create an account</b></a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function(){
        var input = document.getElementById('password');
        var show = document.getElementById('show-password');
        show.addEventListener('click', function(){
          // console.log(input.type)
          if(input.type == "password"){
            show.className = 'glyphicon glyphicon-eye-close form-control-feedback';
            input.type = "text";
          }else{
            show.className = 'glyphicon glyphicon-eye-open form-control-feedback';
            input.type = "password";
          }
        });
      });
    </script>
</div>     
</body>
</html>                            