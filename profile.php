<?php 
  include'header.php';
  include'config.php';
  $id_user = $_SESSION['id_user'];
  $sql = "SELECT * FROM user WHERE id_user ='$id_user'";
  $result = mysqli_query($con,$sql);
  $data = mysqli_fetch_array($result);

  if (isset($_POST['upload'])){
    $foto = $_FILES['foto'];

    $sqlfoto = '';
     if(!empty($foto['tmp_name']))
     {
      $sqlfoto = "profile/". $_FILES["foto"]["name"];
      move_uploaded_file($foto['tmp_name'], 'profile/'.$foto['name']);
     }

     $insert = "UPDATE user SET path_profile = '$sqlfoto' WHERE id_user= '$id_user'";
     $result2 = mysqli_query($con,$insert);
       if ($result2){
                echo "Sukses";
                header("location:dashboard_user.php");
       }
      
  };
 ?>     
      <div id="pageWrapper">
        <div id="page">
          <div id="content" >
            <h1 style="font-size: 20px; padding-bottom: 20px;">Upload Foto Profile</h1>
            <div class="container bootstrap snippet">
                    <div class="row">
                      <div class="col-sm-3"><!--left col-->
                        <div class="text-center">
                          <img style="width: 200px" src="<?php if(empty($data['path_profile'])) echo "http://ssl.gstatic.com/accounts/ui/avatar_2x.png"; else echo $data['path_profile']; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                          <form method="post" enctype="multipart/form-data">
                          <div id="foto">
                            <h6>Upload a different photo...</h6>
                            <input type="file" class="text-center center-block file-upload" name="foto">
                            <br><br>
                            <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                          </div>
                        </div></hr><br>
                        </form>
                      </div><!--/col-3-->
                     
                      <div class="col-sm-9">
                         <div class="form-group">
                          <div class="col-sm-9" style="padding-bottom: 10px;">
                             <h3>Nama</h3>
                            <input type="text" class="form-control" name="judul_video" aria-describedby="emailHelp" placeholder="<?php echo $data['nama_user']; ?>" disabled>
                          </div>
                         </div>

                         <div class="form-group">
                          <div class="col-sm-9" style="padding-bottom: 10px;">
                             <h3>Email</h3>
                            <input type="text" class="form-control" name="judul_video" aria-describedby="emailHelp" placeholder="<?php echo $data['email_user']; ?>" disabled>
                          </div>
                         </div>

                         <div class="form-group">
                          <div class="col-sm-9" style="padding-bottom: 10px;">
                             <h3>Password</h3>
                            <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="<?php echo $data['password_user']; ?>" disabled>
                          </div>
                         </div>
                         
                      </div>
                    </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>