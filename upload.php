<?php 
	include'header.php';
 ?>	    
	    <div id="pageWrapper">
	    	<div id="page">
	    		<div id="content" >
	    			<div class="col-md-8 col-md-offset-4">
            			<div class="tab-content">
            			  <br>
            			  <h2 align="center">Posting Video</h2>
            			  <br>
	    				  <form method="POST" action="upload_video.php" enctype="multipart/form-data">
							  <div class="form-group">
							    <h3>Judul Video</h3>
							    <input type="text" class="form-control" name="judul_video" aria-describedby="emailHelp" placeholder="Judul Video">
							  </div>
							  <div class="form-group">
							    <h3>Deskripsi Video</h3>
							    <textarea class="form-control" name="deskripsi_video" rows="4" cols="50" placeholder="Enter text here... "></textarea>
							  </div>
							  <div class="form-group">
							    <h3>Pilih Thumbnail</h3>
							    <input type="file" class="form-control-file" name="poster" aria-describedby="fileHelp">
							  </div>
							  <div class="form-group">
							    <h3>Pilih Video</h3>
							    <input type="file" class="form-control-file" name="video" aria-describedby="fileHelp">
							  </div>
							  <button type="submit" name="upload" class="btn btn-primary">Submit</button>
						  </form>
						</div>
					</div>
	    		</div>
			</div>
    	</div>
	</div>
     
</body>
</html>