<?php
  
  require 'vendor/autoload.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  function limpiar_cadena($cadena){ 
    $patron = '/<script>.*<\/script>/isU';
    $cadena = preg_replace($patron, '',$cadena);
    $cadema = htmlspecialchars($cadena);
    return $cadena;
  }
  
  function limpiar_entradas(){
    if(isset($_POST))
    {
        foreach($_POST as $Key => $value)
        {
            $_POST[$Key] = limpiar_cadena($value);
        }
    }
  }

  function regenerar_cookie()	{
		{
		// Obliga a la sesión a utilizar solo cookies.
		// Habilitar este ajuste previene ataques que impican pasar el id de sesión en la URL.
		if (ini_set('session.use_only_cookies', 1) === FALSE) {
			$action = "error";
			$error = "No puedo iniciar una sesion segura (ini_set)";
		}
	
		// Obtener los parámetros de la cookie de sesión
		$cookieParams = session_get_cookie_params();
		$path = $cookieParams["path"];

		// Inicio y control de la sesión		
		$secure = false;
		$httponly = true;
		$samesite = 'strict';
		
		session_set_cookie_params([
			'lifetime' => $cookieParams["lifetime"],
			'path' => $path,
			'domain' => $_SERVER['HTTP_HOST'],
			'secure' => $secure,
			'httponly' => $httponly,
			'samesite' => $samesite
		]);

		session_start();
		session_regenerate_id(true);
		}
	}

  function sendMail($email, $subject, $body){
    try{
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = 'tenjoculturayturismo.gov.co';
      $mail->SMTPAuth = true;
      $mail->Username = 'inscripciones@tenjoculturayturismo.gov.co';
      $mail->Password = 'inscripciones_2022';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port = 465;
      $mail->Timeout = 30;
      $mail->AuthType = 'LOGIN';
      $mail->CharSet = 'UTF-8';

      $mail->setFrom('inscripciones@tenjoculturayturismo.gov.co');
      $mail->addAddress($email);

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body = $body;
      
      $mail->send();
      return true;
    }
    catch (Exception $e){
      return false;
    }
  }

  function generarCodigo() {
    $codigo = "";
    for ($i = 0; $i < 6; $i++) {
      $codigo .= rand(0, 9);
    }
    return $codigo;
  }

?>
