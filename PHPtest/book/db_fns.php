<?php 

function db_connect() {
	$result = new mysqli('localhost','root','','bookmarks');
	if (!$result) {
		# code...
		throw new Exception("could not connect to database server");
		
	} else {
		return $result;
	}
}

 ?>