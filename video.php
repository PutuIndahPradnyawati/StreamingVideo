<?php 
  session_start();
  include'config.php';
  $id_user = $_SESSION['id_user'];
  $id_video = $_GET['id'];
  $tampil = "SELECT * FROM stream WHERE id_video = $id_video";
  $tampil_list = "SELECT * FROM stream s INNER JOIN user u ON s.id_user = u.id_user WHERE u.id_user = $id_user AND id_video != $id_video ORDER BY tgl_upload DESC LIMIT 5";
  $res = mysqli_query($con, $tampil);
  $res2 = mysqli_query($con, $tampil_list);


 ?><!doctype html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="author" content="Jake Rocheleau">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" href="favicon.ico">

<title>Video</title>

<!--  jquery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../_nav/js/jquery.js"><\/script>')</script>

<!-- demo scripts -->

<link rel="stylesheet" type="text/css" href="css/video.css">
<link rel="stylesheet" type="text/css" href="css/responsive_video.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/retina.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- nav script -->
<script src="../_nav/js/nav.js" type="text/javascript"></script>
</head>

<body>
<!-- demo content -->
  <div id="w" class="clearfix">
    <header id="fulltop">
      <span id="logomini"><a href="dashboard_user.php"><img src="images/logo-mini.png" alt="YouTube - Broadcast Yourself"></a></span>
      
      <span id="userlogin">
        <img src="images/avatar-sm.png" alt="default user pic" class="defaultphoto"> 
        <a href="logout.php">Sign Out</a>
      </span>      
    </header>
    
   
    <div id="pageWrapper">
      <div id="secondary">
        <h2>Featured Videos</h2>
        <?php   while ($row2 = mysqli_fetch_assoc($res2)){?>
        <div class="videospecial clearfix">
          <a href="#"><img src="<?= $row2['path_poster'];?>" class="vidthumb"></a>
          <div class="context">
            <h4><a href="#"><?= $row2['name_video'];?></a></h4>
            <span class="views"><?= $row2['tgl_upload'];?></span>
          
            <span class="uploader">uploaded by <a href="#"><?= $row2['nama_user'];?></a></span>
          </div>
        </div><!-- main video listing #01 -->
          <?php } ?>
        
     </div><!-- end secondary -->

     <div id="page">
      <header id="topbar">
        <a href="#" id="slidelink"></a>
        <span id="logo"><a href="index.html"><img src="images/logo.png" alt="YouTube - Broadcast Yourself"></a></span>
      </header>

      <?php   while ($row = mysqli_fetch_assoc($res))
      {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                $share = "https";
            } else {
                $share = 'http';
            }

            $path = $row['path_video'];
             $share = $share . "://" . getHostByName(getHostName()) . "/" . $_SERVER['PHP_SELF'] . "?id=" . $id_video;
            // $share = $share . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?id=" . $id_video;
            ?>
      <div id="content">
        <h2><?= $row['name_video'];?></h2>
        <ul>
          <li>
            <video id="video_player" width="700" height="400" poster="<?= $row['path_poster'];?>" controls>
              <source src="<?= $row['path_video'];?>" type="video/mp4">
             </video>
          </li>
          <li style="display: flex; justify-content: space-between; align-items: center; width: 700px;" >
              <input type="button" id="embed" name="embed" onclick="show_embed()" value="Get Embed Video">
              <div id="fb-root"></div>
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2"></script>
              <div class="fb-share-button" data-href="<?= $share; ?>" data-layout="button_count" data-size="large"> <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.samehadaku.tv%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Bagikan</a>
              </div>  
          </li>
          <li>
            <textarea name="embeded" id="embeded" cols="98" rows="5" style="display: none;"></textarea>
          </li>
          <li>
          </li>
        </ul>
      </div>
      <div class="card-body" style="width: 700px;">
              <h5 style="padding:10px 0 10px 0; font-size: 20px; border-top: 1px solid #e8e8e8;">Deskripsi Video</h5>
              <p style="font-size: 12px; display: flex; justify-content: space-between; align-items: center; width: 700px;" class="mb-0"><?php echo nl2br(str_replace('',' ', htmlspecialchars($row['deskripsi_video']))) ; ?></p>
           </div>
      <?php
         } 
        ?>
     </div>
    </div><!-- end pageWrapper -->    
  </div>
</body>

<script type="text/javascript">
    function show_embed() {
        var url = window.location.protocol + "//" + window.location.hostname + "/StreamingVideo/video/<?= $path;?>";
        var link = "<iframe src=' " + url + " ' height=' 500 px ' width=' 1000 px ' frameborder=' 0 ' allow=' accelerometer; autoplay; encrypted - media; gyroscope; picture - in -picture ' allowfullscreen></iframe>";
        var show_embed = document.getElementById('embeded');
        show_embed.style.display ='block';
        show_embed.innerHTML = link;
    }
</script>
</html>