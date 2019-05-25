<?php
  include "config.php";
  $judul = $_POST["judul"];

  if(empty($judul)){
  	$result=mysqli_query($con,"SELECT * FROM stream s INNER JOIN user u ON s.id_user = u.id_user ORDER BY tgl_upload DESC");
  }else{
  	$result=mysqli_query($con,"SELECT * FROM stream s INNER JOIN user u ON s.id_user = u.id_user WHERE name_video LIKE '%".$judul."%'");
  }
  $found=mysqli_num_rows($result);
 
  if($found>0){

   while ($row = mysqli_fetch_assoc($result)) {
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
<?php
    }   
 }
 else{
    echo "<li>Tidak ada Video yang ditemukan <li>";
 }
?> 