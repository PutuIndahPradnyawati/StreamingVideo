<?php
  include('config.php');
  $id_user = $_GET['id'];
  $tampil = "SELECT * FROM stream s INNER JOIN user u ON s.id_user = u.id_user WHERE u.id_user= $id_user ORDER BY tgl_upload DESC";
  $res = mysqli_query($con, $tampil);
  $query = "SELECT * FROM user WHERE id_user = $id_user";
  $res2 = mysqli_query($con, $query);
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="volto.ico">
    <link rel="icon" href="volto.ico">

    <title>Streaming video</title>
    <style>
    .jumbotron {
      padding: 15px 0 5px 0;  
      background-color: #e9ecef;
      color: #00000;
      }
      .bg-light{
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.35);
    }   
   </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="" >
      <span><a class="navbar-brand" href="index.php"><img style="width: 90px;" src="images/volvo.png"></a></span>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
             <a class="nav-link" href="signUp.php">Sign Up <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        
    <!--   </div> -->
    </nav>
    <?php $row2 = mysqli_fetch_assoc($res2)?>
    <div class="jumbotron">
      <div class="container text-center">

        <img src="<?php if(empty($row2['path_profile'])) echo "images/avatar.png"; else echo $row2['path_profile'];?>" class="rounded-circle" alt="Cinque Terre" width="150" height="100">
        <h3><?php echo $row2['nama_user']; ?></h3>
      </div>
    </div>
     <div class="container-fluid bg-3 text-center" id="result" style="padding: 10px 20px 20px 20px;">
      <div class="row">
        <?php
          while ($row = mysqli_fetch_assoc($res)) {
            ?>
            <div class="col-sm-3 px-lg-2">
              <br>
              <div class="card-deck">
                <div class="card">
                   <span>
                    <a href="video_kunjungan.php?id=<?php echo $row['id_video'] ?>">
                      <img src="<?php echo $row['path_poster'];?>" width="100%" height="150px">
                    </a>
                   </span>
                   <h5 style="height: 50px; padding: 10px 0 10px 0"><strong><?php echo $row['name_video']; ?></strong></h5>
                   <span class="views">Upload pada tanggal <?= $row['tgl_upload'];  ?></span>
                   <span class="uploader" style="margin-bottom: 20px;">uploaded by <?php echo $row['nama_user'];  $_SESSION['id_user'] = $row['id_user'];?></span>
                </div>
              </div> 
            </div>
          <?php  } ?>
      </div>
    </div>
   <!--  -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        function search(){
          var judul = $("#search").val();
          if(judul!=""){
            $.ajax({
              type : "post",
              url : "search.php",
              data : "judul="+judul,
              success : function(data){
                $("$result").php(data);
                $("$search").val("");
              }
            });
          }
        }
        $("#button").click(function(){
            search();
        });
         $('#search').keyup(function(e) {
          if(e.keyCode == 13) {
             search();
          }
        });
      });
    </script>

  </body>
</html>