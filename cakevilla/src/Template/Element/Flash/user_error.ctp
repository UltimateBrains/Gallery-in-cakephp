<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-dismissible alert-primary" onclick="this.classList.add('hidden');">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
		
	<?php
		// array: $message
		if(isset($message["name"]["_empty"])){
			echo "<p><b>Name</b>: ".$message["name"]["_empty"]."</p>";
		}
		if(isset($message["name"]["length"])){
			echo "<p><b>Name</b>: ".$message["name"]["length"]."</p>";
		}
        if(isset($message["email"]["_empty"])){
			echo "<p><b>Email</b>: ".$message["email"]["_empty"]."</p>";
		}
		if(isset($message["author"]["_empty"])){
			echo "<p><b>Author</b>: ".$message["author"]["_empty"]."</p>";
		}
		if(isset($message["email"]["valid_email"])){
			echo "<p><b>Email</b>: ".$message["email"]["valid_email"]."</p>";
		}
		if(isset($message["email"]["unique_email"])){
			echo "<p><b>Email</b>: ".$message["email"]["unique_email"]."</p>";
		}
		



    ?>
</div>


