<?php 
//echo "1";
//echo var_dump($_POST);
$EFabc = new EFabc();
		if (isset($_POST['insert']))
			{
				$nickname=$_POST['login'];
				$forename=$_POST['forename'];
				$name=$_POST['name'];
				$thirdname=$_POST['thirdname'];
				$_POST['login']="";
				$_POST['forename']="";
				$_POST['name']="";
				$_POST['thirdname']="";
				$nickname=$EFabc->user->sanitizeMySql($nickname);
				$forename=$EFabc->user->sanitizeMySql($forename);
				$name=$EFabc->user->sanitizeMySql($name);
				$thirdname=$EFabc->user->sanitizeMySql($thirdname);
				global $db;
				$result = mysqli_query($db,"SELECT * FROM users WHERE nickname='".$nickname."'")or die(mysql_error());
				$myrow=mysqli_fetch_array($result,MYSQLI_ASSOC);
				if (empty($myrow['id'])){
					$passwordNew=$_POST['password'];
					$passwordReapet=$_POST['password2'];
					$passwordNew=$EFabc->user->sanitizeMySql($passwordNew);
					$passwordReapet=$EFabc->user->sanitizeMySql($passwordReapet);
					if (($passwordNew !=="") && ($passwordReapet !=="")&&($passwordReapet==$passwordNew)){
							$passwordNew=sha1("Не бейте".$passwordNew."я новичок");
							$role='user';
							$result = mysqli_query($db,"INSERT INTO users (nickname,email,password,hash_pass,remote_addr,user_agent,name,secondname,thirdname,registration,role) VALUES('".$nickname."','','".$passwordNew."','','','','".$name."','".$forename."','".$thirdname."',now(), '$role')")or die(mysql_error());
							echo "<mes>Ok</mes>";
						}else{
							echo "<mes>Nopass</mes>";
						}
				}else{
					echo "<mes>No</mes>";
				}

			}
	//}

?>