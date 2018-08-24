<?php
if ((isset($_POST['to'])) AND
	(isset($_POST['subject'])) AND
	(isset($_POST['message'])) AND
	(isset($_POST['headers']))){
	if (mail($_POST['to'], $_POST['subject'], $_POST['message'], $_POST['headers'])) {echo 'ok';}	
	}
else {
	header('Location: /');
	}
?>