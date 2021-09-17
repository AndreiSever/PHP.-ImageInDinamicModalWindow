<?php
$EFabc = new EFabc();
global $db;
if ($EFabc->user->privateRoleOnly()){
echo '
  <body class="nav-md" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
      
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Навигация</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-photo"></i> Галерея <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu add">
					  <li><a href="/adminpanel/photo">Посмотреть фотографии</a></li>';
                  echo  '</ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Выход" href="/users/logout/">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
         <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
			  <ul class="nav navbar-nav navbar-right">
                <li class>
                  <a  class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
				  $id_user=$EFabc->user->sanitizeMySql($EFabc->user->getId());
                  $result = mysqli_query($db,"SELECT * FROM users WHERE id='".$id_user."'")or die(mysql_error());
				  $name=mysqli_fetch_array($result,MYSQLI_ASSOC);  
				  echo "Админ: ".$name['secondname']." ".$name['name']." ".$name['thirdname']." ";
                  echo  '<span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="/users/profile/"> Профиль</a></li>
                    <li><a href="/users/logout/"><i class="fa fa-sign-out pull-right"></i> Выход</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
		<div class="right_col" role="main" style="min-height: 660px;">
		<!-- page content -->';
}else{ if ($EFabc->user->getRole()== "user"){
	echo '
	  <body class="nav-md" >
		<div class="container body">
		  <div class="main_container">
			<div class="col-md-3 left_col">
			  <div class="left_col scroll-view">
				<div class="clearfix"></div>

				<!-- menu profile quick info -->
		  
				<!-- /menu profile quick info -->

				<br/>

				<!-- sidebar menu -->
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
				  <div class="menu_section">
					<h3>Навигация</h3>
					<ul class="nav side-menu">
                  <li><a><i class="fa fa-photo"></i> Галерея <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu add">
					  <li><a href="/adminpanel/photo">Посмотреть фотографии</a></li>';
                  echo  '</ul>
                  </li>
                </ul>
				  </div>
				</div>
				<!-- /sidebar menu -->

				<!-- /menu footer buttons -->
				<div class="sidebar-footer hidden-small">
				  <a data-toggle="tooltip" data-placement="top" title="Logout" href="/users/logout/">
					<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
				  </a>
				</div>
				<!-- /menu footer buttons -->
			  </div>
			</div>

			<!-- top navigation -->
			 <div class="top_nav">
			  <div class="nav_menu">
				<nav>
				  <div class="nav toggle">
					<a id="menu_toggle"><i class="fa fa-bars"></i></a>
				  </div>
				  <ul class="nav navbar-nav navbar-right">
					<li class>
					  <a  class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
					  $id_user=$EFabc->user->sanitizeMySql($EFabc->user->getId());
					  $result = mysqli_query($db,"SELECT * FROM users WHERE id='".$id_user."'")or die(mysql_error());
					  $name=mysqli_fetch_array($result,MYSQLI_ASSOC);  
					  echo "Пользователь: ".$name['secondname']." ".$name['name']." ".$name['thirdname']." ";
					  echo  '<span class=" fa fa-angle-down"></span>
					  </a>
					  <ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a href="/users/profile/"> Профиль</a></li>
						<li><a href="/users/logout/"><i class="fa fa-sign-out pull-right"></i> Выход</a></li>
					  </ul>
					</li>
				  </ul>
				</nav>
			  </div>
			</div>
			<!-- /top navigation -->

			<!-- page content -->
			<div class="right_col" role="main" style="height: 660px;">

			
			<!-- page content -->';
	}	
}
?>