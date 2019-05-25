<?php
  include('config.php');
  session_start();
  $tampil = "SELECT * FROM stream s INNER JOIN user u ON s.id_user = u.id_user ORDER BY tgl_upload DESC";
  $res = mysqli_query($con, $tampil);
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

    <style type="text/css">
      .bg-light{
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.35);
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <span><a class="navbar-brand" href="index.php"><img style="width: 90px;" src="images/volvo.png"></a></span>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
             <a class="nav-link" href="signUp.php">Sign Up <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" id="search-form" method="post">
          <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" id="button" type="submit">Search</button>
        </form>
    <!--   </div> -->
    </nav>

    <div class="container-fluid bg-3 text-center" style="padding: 10px 20px 20px 20px;">
      <div class="row" id="result" >
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
                   <span class="uploader" style="margin-bottom: 20px;">uploaded by <a href="profile_kunjungan.php?id=<?=$row['id_user'];?>"><?= $row['nama_user'];?></a></span>
                </div>
              </div> 
            </div>
          <?php  } ?>
      </div>
    </div>

   <!--  -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        function search(){
          var judul = $("#search").val();
            $.ajax({
              type : "post",
              url : "search.php",
              data : {judul: $("#search").val()},
              success : function(data){
                $("#result").html(data);
                $("#search").val("");
              }
            });
  
        }
        $('#search-form').submit(function(e){
          e.preventDefault();

          search();
        })
      });
    </script>

  </body>
</html>