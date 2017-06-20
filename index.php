<!DOCTYPE html>
<html>
<head>
	<title>Facebook Post API</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		// Creating an Ajax Call on Click of Submit Button
		$("#btn_submit").click(function(){
			$.get("post_image.php?quote="+$("#quote").val()+"&back_col="+encodeURIComponent($("#background_color").val())+"&text_col="+encodeURIComponent($("#text_color").val()), function(data){
				$("#result").text(data.message);	// It will show the result in an alert
			});
		});
	});
	</script>
</head>
<body bgcolor="#1A237E">
	<div class="w3-container">
			<div class="w3-container w3-display-middle w3-round w3-white w3-card-4" style="padding:0">
		<div class="w3-row w3-card-4 w3-padding"><h2 style="color:#1A237E">Give a Quote to post on Facebook as an Image</h2></div>
		<br><br>
		<div class="w3-row w3-padding">
				<input type="text" id="quote" placeholder="Give a Quote" class="w3-input" autofocus="true" maxlength=250 required/><br>
		</div>
		<div class="w3-row w3-padding">
				<span class="w3-text" style="color:#1A237E" align=left><b>Select Background Color</b></span>
				<input style="float:right" type="color" id="background_color" value="#ff0000"/><br>
		</div>
		<div class="w3-row w3-padding">
				<span  class="w3-text" style="color:#1A237E"><b>Select Text Color</b></span>
				<input style="float:right" class=""type="color" id="text_color" value="#ffff00"/><br>
		</div>
		<div class="w3-row w3-padding">
				<center><input style="" type="submit" id="btn_submit" class="w3-button w3-grey w3-hover-green w3-round"/></center>
		</div>
		</div>
		<center>
		<h3 style="color:#FFFFFF" id="result"></h3>
				</center>
	</div>
</body>
</html>
