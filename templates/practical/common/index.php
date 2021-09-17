<?php 

$EFabc = new EFabc();  
if ($EFabc->user->isGuest()){
	echo <<<_END
	<body class="login">
		<div>
		  <a class="hiddenanchor" id="signup"></a>
		  <a class="hiddenanchor" id="signin"></a>

		  <div class="login_wrapper">
			<div class="animate form login_form">
			  <section class="login_content">
				<form action='/users/login/' method='Post'>
				  <h1>Авторизация</h1>
				  <div>
					<input type="text" class="form-control" name='nickname' placeholder="Логин" required="" />
				  </div>
				  <div>
					<input type="password" class="form-control" name='password' placeholder="Пароль" required="" />
				  </div>
				  <div>
					<input  style="margin-left:140px;" class="btn btn-default submit" type='submit' name='login' value='Вход'/> 
				  </div>

				  <div class="clearfix"></div>

				  <div class="separator">
					<p class="change_link">Не зарегистрированны?
					  <a href="#signup" class="to_register"> Регистрация </a>
					</p>

					<div class="clearfix"></div>
					<br />

					<div>
					  <p>©2017 Все права защищены.</p>
					</div>
				  </div>
				</form>
			  </section>
			</div>

			<div id="register" class="animate form registration_form">
			  <section class="login_content">
				<form >
				  <h1>Регистрация</h1>
				  <p>Введите логин<p/>
				  <div>
					<input id="login" type="text" class="form-control" placeholder="Логин" name="login" required="" />
				  </div>
				  <p>Введите Имя<p/>
				  <div>
					<input id="name" type="text" class="form-control" placeholder="Имя" name="name" required="" />
				  </div>
				  <p>Введите Фамилию<p/>
				  <div>
					<input id="forename" type="text" class="form-control" placeholder="Фамилия" name="forename" required="" />
				  </div>
				  <p>Введите Отчество<p/>
				  <div>
					<input id="thirdname" type="text" class="form-control" placeholder="Отчество" name="thirdname" required="" />
				  </div>
				  <p>Введите пароль<p/>
				  <div>
					<input id="password" type="password" class="form-control" placeholder="Пароль" name="password" required="" />
				  </div>
				  <p>Повторите пароль<p/>
				  <div>
					<input id="password2" type="password" class="form-control" placeholder="Повторите пароль" name="repeatpassword" required="" />
				  </div>
				  </form>
				  <div>
					<input id="registr" style="align:center;" class="btn btn-default" type='submit' name="submit" value='Регистрация'/> 
				  </div>

				  <div class="clearfix"></div>

				  <div class="separator">
					<p class="change_link">Зарегистрировался ?
					  <a href="#signin" class="to_register"> Вход </a>
					</p>

					<div class="clearfix"></div>
					<br />

					<div>
					  <p>©2017 Все права защищены.</p>
					</div> 
				  </div>
			  </section>
			</div>
		  </div>
		</div>
_END;
	}
 ?>