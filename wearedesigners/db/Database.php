<?php
	function getConn(){
		$conn = new mysqli("localhost", "root","","wad");
		// Check connection
		if ($conn->connect_error) {
		    $conn= null;
		}
		return $conn;
	}

?>
