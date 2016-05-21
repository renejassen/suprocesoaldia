<?php

/////////// Add your own email below //////////////// 

	define("WEBMASTER_EMAIL", 'javiervaron1@gmail.com');
	
	error_reporting (E_ALL ^ E_NOTICE);

//////////////////////////////////////////////////////

	function ValidateEmail($email)
	{
		$regex = '/([a-z0-9_.-]+)'. # name
		'@'. # at
		'([a-z0-9.-]+){2,255}'. # domain & possibly subdomains
		'.'. # period
		'([a-z]+){2,10}/i'; # domain extension 
		
		if($email == '') 
			return false;
		else
			$eregi = preg_replace($regex, '', $email);
		return empty($eregi) ? true : false;
	}

//////////////////////////////////////////////////////

	$post = (!empty($_POST)) ? true : false;
	
	if($post)
	{
		$name 	 = stripslashes($_POST['name']);
		$email 	 = trim($_POST['email']);
		$phone 	 = trim($_POST['phone']);
		// $subject = trim($_POST['subject']);
		$subject = 'Contacto desde pagina web';
		$message = stripslashes($_POST['message']);
	
		$error = '';
	
		// Check name
		if(!$name)
			$error .= 'Nombre es requerido! ';
	
		// Check email
		if(!$email)
			$error .= 'E-mail es requerido! ';
	
		if($email && !ValidateEmail($email))
			$error .= 'E-mail no es válido! ';
	
		// Check message
		if(!$message)
			$error .= "Por favor ingrese su mensaje!";
	
		if(!$error)
		{
			$mail = @mail(WEBMASTER_EMAIL, $subject, $message,
				 "From: ".$name." <".$email.">\r\n"
				."Reply-To: ".$email."\r\n"
				."Return-Path: " .$email. "\r\n"
				."MIME-Version: 1.0\r\n"	
				."Content-type: text/html; charset=UTF-8\r\n");
			
			if($mail){
				echo 'OK';
			}else{
				echo 'No se pudo enviar email!';
			}
		}
		else
			echo $error;
	}

?>