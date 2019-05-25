<?php
 session_start();
  include'config.php';
  $id_user = $_SESSION['id_user'];
  
  if(isset($_POST['upload'])){
    $judul_video = $_POST["judul_video"];
    $deskripsi_video = $_POST["deskripsi_video"];

    $max_size_video = 104857600;
    $max_size_poster = 104857600;

    $target_dir_video = "video/";
    $target_dir_poster = "poster/";
    $file_video = $_FILES["video"]["name"];
    $file_poster = $_FILES["poster"]["name"];
    $target_file_video = $target_dir_video . $_FILES["video"]["name"];
    $target_file_poster = $target_dir_poster . $_FILES["poster"]["name"];

    $file_type_video = strtolower(pathinfo($target_file_video, PATHINFO_EXTENSION));
    $file_type_poster = strtolower(pathinfo($target_file_poster, PATHINFO_EXTENSION));

    $fileName_video = pathinfo($target_dir_video . $file_video, PATHINFO_FILENAME);
    $fileName_poster = pathinfo($target_dir_poster . $file_poster, PATHINFO_FILENAME);
    $fileExtensionVideo = "." . pathinfo($target_dir_video . $file_video, PATHINFO_EXTENSION);
    $fileExtensionPoster = "." . pathinfo($target_dir_poster . $file_poster, PATHINFO_EXTENSION);

    $returnValueVideo = $fileName_video . $fileExtensionVideo;
    $returnValuePoster = $fileName_poster . $fileExtensionPoster;

    $copy_video = 1;
    $copy_poster = 1;
    while(file_exists($target_dir_video . $returnValueVideo))
    {
      $returnValueVideo = $fileName_video . '-'. $copy_video . $fileExtensionVideo;
      $copy_video++;
    }

    while(file_exists($target_dir_poster . $returnValuePoster))
    {
      $returnValuePoster = $fileName_poster . '-'. $copy_poster . $fileExtensionPoster;
      $copy_poster++;
    }

    $target_file_video = $target_dir_video . $returnValueVideo;
    $target_file_poster = $target_dir_poster . $returnValuePoster;

    $ekstensi_video_arr = array("mp4", "ogg", "webm");
    $ekstensi_poster_arr = array("png", "jpg", "jpeg");

    if(in_array($file_type_video, $ekstensi_video_arr) && in_array($file_type_poster, $ekstensi_poster_arr)){
        if(move_uploaded_file($_FILES['video']['tmp_name'], $target_file_video)){
          if(move_uploaded_file($_FILES['poster']['tmp_name'], $target_file_poster)){
            $upload = "INSERT INTO stream(name_video, path_video, path_poster, deskripsi_video, id_user, tgl_upload) VALUES ('".$judul_video."', '".$target_file_video."', '".$target_file_poster."', '".$deskripsi_video."', '".$id_user."', now())";
            if($res = mysqli_query($con, $upload)){
              header('location:dashboard_user.php');
            }
            else{
              echo "failed to upload";
            }
          }
        }
    }
    else{
      echo "salah";
    }
  }
 ?>
