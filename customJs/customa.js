var d = document;
	function del_spaces(str)
	{
		str = str.replace(/\s/g, '');
		return str;
	}
	$(function(){
		$("#registr").on("click", function(){
				var login = del_spaces(d.getElementById('login').value);
				var forename = d.getElementById('forename').value;
				var name = d.getElementById('name').value;
				var thirdname = d.getElementById('thirdname').value;
				var password = d.getElementById('password').value;
				var password2 = d.getElementById('password2').value;
				var flag=0;
				var text="";
				
				if (login==""){
					flag=1;
					text+="Поле с логином обязательно к заполнению!\r\n";
				}
				if (password=="" || password2=="" || password!=password2){
					flag=1;
					text+="Пароли не совпадают!Или пусты вовсе!";
				}
				if (flag==1) alert(text);

				if (flag==0){
					uri="/users/registration/";
					params="insert=ok";
					params+="&login="+login;
					params+="&forename="+forename;
					params+="&name="+name;
					params+="&thirdname="+thirdname;
					params+="&password="+password;
					params+="&password2="+password2;
					sqlRegistration(params,uri);
				}
			});
	});
	function sqlRegistration(params,uri){
		var request = new ajaxRequest();

		request.onreadystatechange = function()
		{
			if (request.readyState==4)
			{
				if (request.status==200)
				{
					if (request.responseText != null)
					{	

						var mes= request.responseText.match(/<mes>(.*)<\/mes>/)[1];
						if (mes=="No"){
							alert("Такой логин уже существует!");
						}
						if (mes=="Ok"){
							alert("Регистрация прошла успешно!");
						} 
						if (mes=="Nopass"){
							alert("Пароли не совпадают!");
						}
					}
					else alert ("Данные не полученны");
				}
				else alert ("Ошибка Ajax"+this.statusText);
			}
		}
		request.open("POST", uri, true);
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send(params);
	}
	$(function(){
		$("#profile").on("click", function(){
				var login = del_spaces(d.getElementById('login').value);
				var forename = d.getElementById('forename').value;
				var name = d.getElementById('name').value;
				var thirdname = d.getElementById('thirdname').value;
				var oldPassword = d.getElementById('oldPassword').value;
				var password = d.getElementById('password').value;
				var password2 = d.getElementById('password2').value;
				var flag=0;
				var text="";
				
				if (login==""){
					flag=1;
					text+="Поле с логином обязательно к заполнению!\r\n";

				}
				if (password!="" && password2!="" && password!=password2){
					flag=1;
					text+="Пароли не совпадают!";

				}
				if (flag==1) alert(text);

				if (flag==0){
					uri="/users/profile_sql/";
					params="edit=ok";
					params+="&login="+login;
					params+="&forename="+forename;
					params+="&name="+name;
					params+="&thirdname="+thirdname;
					params+="&oldPassword="+oldPassword;
					params+="&password="+password;
					params+="&password2="+password2;
					sqlEditProfile(params,uri);
				}
			});
	});
	function sqlEditProfile(params,uri){
		var request = new ajaxRequest();

		request.onreadystatechange = function()
		{
			if (request.readyState==4)
			{
				if (request.status==200)
				{
					if (request.responseText != null)
					{	
						//document.getElementById("foot").innerHTML = request.responseText;
						var mes= request.responseText.match(/<mes>(.*)<\/mes>/)[1];
						var mesemail= request.responseText.match(/<mesemail>(.*)<\/mesemail>/)[1];
						var mespass= request.responseText.match(/<mespass>(.*)<\/mespass>/)[1];
						if (mes=="No"){
							alert("Такой логин уже существует!");
						}
						if (mes=="Ok"){
							alert("Данные успешно сохранены!(Логин,Фамилия,Имя,Отчество)");
						} 
						if (mespass=="Nopass"){
							alert("Не вверно введен старый пароль!");
						}
						if (mespass=="Okpass"){
							alert("Новый пароль успешно сохранен!");
						} 
						if (mesemail=="No"){
							alert("Такой email уже существует!");
						}
						if (mesemail=="Ok"){
							alert("Новый email успешно сохранен!Письмо с подтверждением отправлено на новую почту.");
						} 

					}
					else alert ("Данные не полученны");
				}
				else alert ("Ошибка Ajax"+this.statusText);
			}
		}
		request.open("POST", uri, true);
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send(params);
	}
	
	$(document).ready(function() {
		$("a.demo-2").simplePopup({ 
			type: "html", 
			htmlSelector: "#popupEdit", 
			beforeOpen: function(){
			
			}
		});
	});
	
	function ViewImage(r){

		var q = document.getElementById(r).parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByTagName("p")[0].innerHTML;
		uri="/adminpanel/img_question_sql/";
		params="view=ok";
		params+="&id="+q;
		sqlViewWithCallback(params,uri,q,callbackForView);


	}
	function callbackForView(id,request){
		var mes = JSON.parse(request.responseText);
		if (mes.mes=="Ok"){
				document.getElementById("simple-popup").getElementsByClassName('image')[0].innerHTML="<img src='/image/"+mes.image+"' alt='' />";
		}
		if (mes.mes=="No")	{
			$("#simple-popup-backdrop").remove();
			$("#simple-popup").remove();
		}
	}


	function sqlViewWithCallback(params,uri,id,callback){
		var request = new ajaxRequest();

		request.onreadystatechange = function()
		{
			if (request.readyState==4)
			{
				if (request.status==200)
				{
					if (request.responseText != null)
					{
						 callback(id,request);
					}
					else alert ("Данные не полученны");
				}
				else alert ("Ошибка Ajax"+this.statusText);
			}
		}
		request.open("POST", uri, true);
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send(params);
	}


	function deleteImage(r){
		uri='/adminpanel/img_question_sql/';
		params="delete=ok";
		params+="&id="+document.getElementById(r+'del').parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByTagName("p")[0].innerHTML;
		sqlDeleteImage(params,uri,r);
	}
	function sqlDeleteImage(params,uri,r){
		var request = new ajaxRequest();

		request.onreadystatechange = function()
		{
			if (request.readyState==4)
			{
				if (request.status==200)
				{
					if (request.responseText != null)
					{
						var mes=request.responseText.match(/<mes>(.+)<\/mes>/)[1];
						if (mes=="Ok"){
							d.getElementById(r+'del').parentNode.parentNode.parentNode.parentNode.parentNode.remove();
							
						}
					}
					else alert ("Данные не полученны");
				}
				else alert ("Ошибка Ajax"+this.statusText);
			}
		}
		request.open("POST", uri, true);
		request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		request.send(params);
	}

	function imgAdd(){
		$("form[name='img']").off('change.file').on('change.file', function(e) {
			var formData = new FormData($(this)[0]);	
			$("#preview").html('');
			$("#preview").html('<div id="block_1" class="barlittle"></div>'+
								'<div id="block_2" class="barlittle"></div>'+
								'<div id="block_3" class="barlittle"></div>'+
								'<div id="block_4" class="barlittle"></div>'+
								'<div id="block_5" class="barlittle"></div>');
			
			$.ajax({
				url: '/adminpanel/img_question_sql/',
				type: "POST",
				data: formData,
				async: true,
				success: function (msg) {
					var mes = JSON.parse(msg);
					if (mes.mes=="Ok"){
						document.getElementsByClassName("x_content")[0].innerHTML+=("<div class='col-md-55'>"+
																				"<p  hidden='true'>"+mes.id+
																				"<div class='thumbnail' style='height:auto;'>"+
																				  "<div class='image view view-first'>"+
																					"<img style='max-height:100%;height:100%;width:100%;max-width: 100%; display: block;' src='/image/"+mes.image+"' alt='image' />"+
																					"<div class='mask no-caption'>"+
																					  "<div  class='tools tools-bottom'>"+
																						"<a href='#' id='"+mes.id+"'  class='demo-2'><i class='fa fa-arrows-alt'></i></a>"+
																						"<a  href='#' id='"+mes.id+"del'  ><i class='fa fa-remove'></i></a>"+
																					  "</div>"+
																					"</div>"+
																				  "</div>"+
																				"</div>"+
																			  "</div>");

					$('#'+mes.id).on('click', function(e){
						  ViewImage(mes.id);
						});
					$('#'+mes.id+'del').on('click', function(e){
						  deleteImage(mes.id);
						});
					}
					if (mes.mes=="No"){
						alert("Ошибка!Вы вытаетесь загрузить не картинку!");
					}
				},
				error: function(msg) {
					alert('Ошибка!');
				},
				cache: false,
				contentType: false,
				processData: false
			});	
			$("#preview").html('');
			//$("form[name='img']")[0].reset();
		});
	}
	function ajaxRequest()
	{
		try // IE
		{
			var request = new XMLHttpRequest()
		}
		catch(e1)
		{
			try//This IE 6+?
			{
				request = new ActiveXObject("Msxml2.XMLHTTP")
			}
			catch(e2)
			{
				try // This IE 5?
				{
					request = new ActiveXObject("Microsoft.XMLHTTP")
				}
				catch(e3)// This brouser not supported Ajax
				{
					request = false
				}
			}
		}
		return request
	}
	////////