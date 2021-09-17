<?php
$EFabc = new EFabc();
global $db;
if ($EFabc->user->privateRoleOnly() || $EFabc->user->getRole()== "user"){ 
?>
<div class="row">
<div class="page-title">
              <div class="title_left">
                <h3><small></small></h3>
              </div>
              <div class="title_right">  
				
                </div>
              </div>
            

            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Мои картинки</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
				    <div class="btn-group">
					  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Действие <span class="caret"></span></button> 
					  <ul class="dropdown-menu" role="menu">
						<li>
							<div class="file-upload btn-default" >
								 <label>
								 <form name="img" enctype="multipart/form-data" method="POST">
									  <input type="file" name="userfile" accept='image/*' onchange="imgAdd()" >
									  <span>Загрухить картинку</span>
								 </form>
								 </label>
						  </div>
						</li>
					  </ul>
					 <div  id="preview" style="float:right;margin-top:10px;">	
					 </div>
					<div id="popupEdit">
						<div class="image"></div>
					</div>
					</div>
					<br/>
                    <p class="text-muted font-13 m-b-30">  
                    </p>
					<?php
					$id_user=$EFabc->user->sanitizeMySql($EFabc->user->getId());
					$result = mysqli_query($db,"SELECT * FROM image WHERE id_user='".$id_user."'")or die(mysql_error());
					if (mysqli_num_rows ($result) !== 0){
						while ($group=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						echo    '<div class="col-md-55">
									<p hidden="true">'.$group['id'].'
									<div class="thumbnail" style="height:auto;">
									  <div class="image view view-first">
										<img style="max-height:100%;height:100%;width:100%;max-width: 100%; display: block;" src="/image/'.$group['image'].'" alt="image" />
										<div class="mask no-caption">
										  <div class="tools tools-bottom">
											<a href="#" id="'.$group['id'].'" onclick="ViewImage('.$group['id'].');return false;" class="demo-2"><i class="fa fa-arrows-alt"></i></a>
											<a href="#" id="'.$group['id'].'del"  onclick="deleteImage('.$group['id'].');return false;"><i class="fa fa-remove"></i></a>
										  </div>
										</div>
									  </div>
									</div>
								  </div>';
						}
					}
                      ?> 
					  
                  </div>
                </div>
              </div>
			  </div>
 <?php 
}	
?>   