<?php 
	session_start();

	session_destroy();

	header('Location: ../index.php?&toast=t&status=Successfully Logged Out!');
 ?>