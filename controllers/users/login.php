<?php
	if ((isset($_POST['nickname']))&&(isset($_POST['password']))) {
		$nickname = $_POST['nickname'];
		$password = $_POST['password'];
		//$EFabc = new EFabc();
		$user = new user();
		
		$nickname=$user->sanitizeMySql($nickname);
		$password=$user->sanitizeMySql($password);
		//echo $password;
		$user->authorization($nickname, $password);
		header('Location: http://testlocal.home');
	}
?>