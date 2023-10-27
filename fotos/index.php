<?php require_once 'config.php';?>

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     
		
		<div class="form-container">
			<form enctype="multipart/form-data" name='imageform' role="form" id="imageform" method="post" action="ajax.php">
			<input value="<?php echo $_GET['id'] ?>" name="produto" type="hidden">
				<div class="form-group">
					<p><strong>Selecione as imagens</strong> </p>
					<input class='file' multiple="multiple" type="file" class="form-control" name="images[]" id="images" placeholder="Please choose your image">
					<span class="help-block"></span>
				</div>
				<div id="loader" style="display: none;">
					Aguarde, enviando imagens....
				</div>
				<input type="submit" value="Upload" name="image_upload" id="image_upload" class="btn btn-success"/>
			</form>
		</div>
		<div class="clearfix"></div>
		<div id="uploaded_images" class="uploaded-images">
			<div id="error_div">
			</div>
			<div id="success_div">
			</div>
		</div>
	</div>


	
	<input type="hidden" id='base_path' value="<?php echo BASE_PATH; ?>">
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.form.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>


