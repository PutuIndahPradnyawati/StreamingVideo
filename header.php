<!doctype html>
<html lang="en">
<?php
  session_start();
  include'config.php';
  $id_user = $_SESSION['id_user'];
  $sql = "SELECT * FROM user WHERE id_user ='$id_user'";
  $result = mysqli_query($con,$sql);
 ?>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="author" content="Jake Rocheleau">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
  <link rel="shortcut icon" href="volto.ico">
  <link rel="icon" href="volto.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>Streaming Video on Demand</title>

  <!--  jquery -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../_nav/js/jquery.js"><\/script>')</script>

  <!-- demo scripts -->

  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/retina.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
  
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- nav script -->
</head>

<body>
  <div id="w" class="clearfix">
      <header id="fulltop" style="box-sizing: content-box">
          <span style="width: 90px; padding-left: 10px;" id="logomini"><a href="index.php"><img src="images/volvo.png" alt=""></a></span>
          <span id="userlogin">
              <?php while ($row2 = $result->fetch_array()){?>
            <img class="defaultphoto" style="width: 50px; height: 40px" src="<?php if(empty($row2['path_profile'])) echo "images/avatar.png"; else echo $row2['path_profile'];?>" alt="default user pic" > 
            <?php } ?>
            <a href="logout.php">Sign Out</a>
          </span>      
      </header>
      <nav>
          <ul id="sidenav">
          <li class="heading"><?php while($row = $result->fetch_array()) {echo 'Wellcome back, <br>' . $row['nama_user'];}?></li>
          <li><a href="dashboard_user.php" onclick="link('dashboard_user.php')" >Koleksi Video</a></li>
          <li><a href="upload.php" onclick="link('upload.php')">Posting Video</a></li>
          <li><a href="profile.php" onclick="link('profile.php')">Profile</a></li>
        </ul>
      </nav><!-- end navigation menu -->

      <script type="text/javascript">
        function link(url){
          window.location.href=url;
        }
      </script>
