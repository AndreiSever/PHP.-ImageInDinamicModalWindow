<?php
// разрешенные расширения файлов
	//$allowExt = array('gif', 'jpeg', 'jpg', 'png');
	// отдает расширение файла
	function getFileExt($filename) {
		$temp = explode('.', $filename);
		return strtolower(end($temp));
	}
	// проверка валиден ли тип и расширение
	function isPicture($type, $ext) {
		$allowExt = array('gif', 'jpeg', 'jpg', 'png');
		$result = false;
		switch ($type) {
			case 'image/jpeg':
			case 'image/jpg':
			case 'image/pjpeg':
			case 'image/x-png':
			case 'image/png':
			case 'image/gif':
				$result = true;
				break;
		}
		if ($result) {
			$result = in_array(strtolower($ext), $allowExt);
		}
		return $result;
	}
	if (isset($_POST['view'])){
		global $db;
		$EFabc = new EFabc();
		$id=$EFabc->user->sanitizeMySql($_POST['id']);
		$result = mysqli_query($db,"SELECT * FROM image WHERE id='".$id."'")or die(mysql_error());
		$myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if (!empty($myrow['id'])){
			$ans= array(
				  "image" => $myrow['image'],
				  "mes" => "Ok"
				);
			echo json_encode( $ans );
		}else{
			$ans = array(
			  "mes" => "No"
			);
			 
			echo json_encode( $ans );
		}
	}
	if (isset($_POST['delete'])){
		global $db;
		$EFabc = new EFabc();
		$id=$EFabc->user->sanitizeMySql($_POST['id']);
		$result = mysqli_query($db,"SELECT * FROM image WHERE id='".$id."'")or die(mysql_error());
		$myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if (!empty($myrow['id'])){
			$deleteImage=$myrow['image'];
			if ($deleteImage<>""){
				$uploaddir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR;
				$uploadfile = $uploaddir . basename($deleteImage);
				unlink($path.$uploadfile);
			}
			mysqli_query($db,"DELETE FROM image WHERE id='".$id."'")or die(mysql_error());
			echo "<mes>Ok</mes>";
		}else{
			echo "<mes>No</mes>";
		}
	}
	if (isset($_FILES['userfile']['name'])){
		$ext = getFileExt($_FILES['userfile']['name']);
		if (isPicture($_FILES['userfile']['type'], $ext)) {
			global $db;
			$EFabc = new EFabc();
				do{
					$login=$EFabc->user->generateCode(10);
					$login=$login.'.'.$ext;
					$result1 = mysqli_query($db,"SELECT * FROM image WHERE image='".$login."'")or die(mysql_error());
					$myrow1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
				}while (!empty($myrow1['id']));
				$uploaddir = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR;
				$uploadfile = $uploaddir . basename($login);
				move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
				$image=$EFabc->user->sanitizeMySql(basename($login));
				$ext=$EFabc->user->sanitizeMySql($ext);
				$id_user=$EFabc->user->sanitizeMySql($EFabc->user->getId());
				mysqli_query($db,"INSERT INTO image SET  image='".$image."' , extension='".$ext."', id_user='".$id_user."'")or die(mysql_error());
				$result = mysqli_query($db,"SELECT * FROM image WHERE id_user='".$id_user."' and image='".$image."' and extension='".$ext."'")or die(mysql_error());
				$myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$ans= array(
				  "id" => $myrow['id'],
				  "image" => $image,
				  "mes" => "Ok"
				);
				echo json_encode( $ans );
		} else {
			$ans = array(
			  "mes" => "No"
			);
			 
			echo json_encode( $ans );
		}
	}
?>