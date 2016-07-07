<div class = "col-md-8">
	<div class = "err">
		<?php
		if(isset($error))
			echo $error;
		?>
	</div>
	<?php
     echo form_open_multipart('photo_uploader/do_upload');
    ?>
    <div class = "from-group">
    	upload your photo:
    	<input type = "file" size="20" name="userfile">
    	<button class = "btn-success form-control" type = "submit">Upload</button>
    </div>

</div>