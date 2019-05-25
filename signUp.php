<!DOCTYPE html>
<html lang="en">
<?php 
  include 'config.php';
  if(mysqli_connect_errno()){
    echo("Gagal Koneksi ke database: ".mysqli_connect_errno());
  }
  // $_SESSION['message'] = "";
  if(isset($_POST['submit'])){
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $insert = "INSERT INTO user(nama_user, email_user, password_user) VALUES ('$nama', '$email', '$password')";
    $result = mysqli_query($con,$insert);

    if ($result) {
      echo "Berhasil";
       header('location: login.php');
    }
    else{
      echo "Gagal";
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

  <title>Sign Up</title>
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
                <h4 class="modal-title">Creat Account </h4>   
                <a href="index.php"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required="required">     
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" required="required"> 
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                        <span class="glyphicon glyphicon-eye-open form-control-feedback" id="show-password" style="pointer-events: inherit;cursor: pointer;"></span>
                    </div>   

                    <div class="form-group has-feedback">
                        <input type="password" id="repassword" class="form-control" name="confirmPassword" placeholder="Confirm Password" required="required"> 
                       <span class="glyphicon glyphicon-eye-open form-control-feedback" id="show-repassword" style="pointer-events: inherit;cursor: pointer;"></span>
                    </div>     
<!-- 
                    <input type="checkbox" class="inline" onchange="change()"> Show passwor -->
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-btn">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="login.php">I'm already member. <b>Login Now!</b></a>
            </div>
        </div>
    </div>
</div>     

<!-- <script type="text/javascript">
  function change(){
    var x = document.getElementById('pass').type;
    if (x =='password') {
      document.getElementById('pass').type ='text';
      document.getElementById('repass').type ='text';
      // document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-close"></i>';
    }
    else {
      document.getElementById('pass').type = 'password';
      document.getElementById('repass').type ='password';
      // document.getElementById('mybutton').innerHTML = '<i class="glyphicon glyphicon-eye-open"></i>';
    }
  }
</script> -->

  <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function(){
        var input = document.getElementById('password');
        var show = document.getElementById('show-password');
        var input2 = document.getElementById('repassword');
        var show2 = document.getElementById('show-repassword');

        show.addEventListener('click', function(){
          if(input.type == "password"){
            show.className = 'glyphicon glyphicon-eye-close form-control-feedback';
            input.type = "text";
          }else{
            show.className = 'glyphicon glyphicon-eye-open form-control-feedback';
            input.type = "password";
          }
        });

        show2.addEventListener('click', function(){
          if(input2.type == "password"){
            show2.className = 'glyphicon glyphicon-eye-close form-control-feedback';
            input2.type = "text";
          }else{
            show2.className = 'glyphicon glyphicon-eye-open form-control-feedback';
            input2.type = "password";
          }
        });        
      });
    </script>
</body>

</html>                            