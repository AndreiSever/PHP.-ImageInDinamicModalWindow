<?php 
	$EFabc=new EFabc();
	
	if ($EFabc->route->getControll()!== "create_group_sql" && $EFabc->route->getControll()!=="create_student_sql" && $EFabc->route->getControll()!=="directions_sql"&&$EFabc->route->getControll()!=="question_sql"&&$EFabc->route->getControll()!=="create_config_test_sql"&&$EFabc->route->getControll()!=="result_table_sql"&&$EFabc->route->getControll()!=="img_question_sql"){ 
	//header('X-Accel-Buffering: no');
	header("Cache-Control:no-cache,no-store, must-revalidate, max-age=0");
	header("Pragma:no-cache");
	header("Expires:0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru-ru" xml:lang="ru-ru">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
	<meta http-equiv="Cache-control" content="no-cache,no-store, must-revalidate, max-age=0"> <!--,post-check=0,pre-check=0">-->
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Vary" content="*">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap -->
	<link href="<?php echo $siteName; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
    <!-- Font Awesome -->
    <link href="<?php echo $siteName; ?>/adminLibrary/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link href="<?php echo $siteName; ?>/adminLibrary/vendors/animate.css/animate.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
     <link href="<?php echo $siteName; ?>/adminLibrary/build/css/custom.css" rel="stylesheet"> 
	<link href="<?php echo $siteName; ?>/simple-popup-js/dist/jquery.simple-popup.min.css" rel="stylesheet">
	<link href="<?php echo $siteName; ?>/customCss/custom12.css" rel="stylesheet">
    <title></title>
	<style>
	
	</style>
 </head>
  
		<?php 
		//echo $_SERVER['HTTP_USER_AGENT'];
		$EFabc->route->getWidget('working_panel');
		$EFabc->route->intro();
		//$EFabc->route->startController();
		if ($EFabc->user->privateRoleOnly() || $EFabc->user->getRole()== "user"){
			echo  '<div class="clearfix"></div></div>
			
			<footer id="foot">
				<div class="pull-right">
				</div>
			<div class="clearfix"></div>
			</footer></div></div>';
		}
		?>

    <!-- jQuery -->
    <script src="<?php echo $siteName; ?>/adminLibrary/vendors/jquery/dist/jquery.min.js"></script>
   <!-- Bootstrap -->
	<script src="<?php echo $siteName; ?>/bootstrap/js/bootstrap.min.js"></script>
	<!-- Custom Theme Scripts -->
    <script src="<?php echo $siteName; ?>/adminLibrary/build/js/custom.min.js"></script>
	<script src="<?php echo $siteName; ?>/simple-popup-js/src/jquery.simple-popup12.js"></script>
	<script src="<?php echo $siteName; ?>/customJs/customa.js"></script>
	<script>
	//Можно вставить код из customJs

	</script>
  </body>
</html>
<?php }?>	