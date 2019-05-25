<?php 
  include'header.php';

  $tampil = "SELECT * FROM stream s INNER JOIN user u ON s.id_user = u.id_user WHERE u.id_user = $id_user ORDER BY tgl_upload DESC";
  $res = mysqli_query($con, $tampil);
 
   ?>    
    
    <div id="pageWrapper">
     <div id="page">
        <div id="content">
        <h2>Koleksi Video</h2>
        <?php   while ($row = mysqli_fetch_assoc($res)){?>
         
        <div class="videospecial clearfix">
          <a href="video.php?id=<?= $row['id_video'];?>"><img src="<?= $row['path_poster']; ?>" class="vidthumb"></a>
          <div class="context">
            <h4><a href=""><?= $row['name_video'];  ?></a></h4>
            <span class="views">Dipublikasi pada tanggal <?= $row['tgl_upload'];  ?></span>
          </div>
        </div><!-- main video listing #01 -->
        <?php
         } 
        ?>
      </div>
     </div>
    </div><!-- end pageWrapper -->
  </div>

</body>
</html>