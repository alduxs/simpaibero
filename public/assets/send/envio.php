<?php
header('Content-Type: application/json; charset=utf-8');
ob_start(); // capture any unexpected output (warnings/notices) for debugging

$raw = filter_input_array(INPUT_POST);

$name = isset($raw['name']) ? trim(strip_tags($raw['name'])) : '';
$localidad = isset($raw['localidad']) ? trim(strip_tags($raw['localidad'])) : '';
$email = isset($raw['email']) ? trim($raw['email']) : '';
$telefono = isset($raw['telefono']) ? trim(strip_tags($raw['telefono'])) : '';
$asunto = isset($raw['casunto']) ? trim(strip_tags($raw['casunto'])) : '';
$comment = isset($raw['comment']) ? trim($raw['comment']) : '';

// Server-side validation / normalization
$errors = [];
if (empty($name)) $errors[] = 'El campo Nombre y Apellido es obligatorio.';
if (empty($asunto)) $errors[] = 'El campo Asunto es obligatorio.';
if (empty($comment)) $errors[] = 'El campo Consulta es obligatorio.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'El Email no es válido.';

if (!empty($errors)){
	$out = json_encode(['success' => false, 'message' => 'Error de validación', 'errors' => $errors]);
	$extra = trim(ob_get_clean());
	if ($extra) {
		// include unexpected output for debugging
		echo json_encode(['success' => false, 'message' => 'Error de validación', 'errors' => $errors, 'debug' => $extra]);
	} else {
		echo $out;
	}
	exit;
}

// Normalize and escape for safe emailing
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$localidad = htmlspecialchars($localidad, ENT_QUOTES, 'UTF-8');
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$telefono = htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8');
$asunto = htmlspecialchars($asunto, ENT_QUOTES, 'UTF-8');
$comment = nl2br(htmlspecialchars($comment, ENT_QUOTES, 'UTF-8'));

require(__DIR__ . "/PHPMailerAutoload.php");
$mail = new PHPMailer();

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'c1690638.ferozo.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'envio@simpaibero.com';                 // SMTP username
$mail->Password = 'HcDZsY/8gZ';                           // SMTP password
//$mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
//$mail->Port       = 465;

$mail->From = $email;
$mail->FromName = $name;
$mail->addAddress('agi.iniguez@gmail.com');     // Add a recipient
//$mail->addAddress('leandro@simpaibero.com');     // Add a recipient
//$mail->addAddress('ekaplan@simpaibero.com');     // Add a recipient


$mail->isHTML(true);
$mail->Subject = $asunto;
$body = "<strong>Nombre y Apellido:</strong> ".$name."<br />";
$body .= "<strong>Localidad:</strong> ".$localidad."<br />";
$body .= "<strong>E-mail:</strong> ".$email."<br />";
$body .= "<strong>Teléfono:</strong> ".$telefono."<br />";
$body .= "<strong>Mensaje:</strong> <br />".$comment."";
$mail->Body = $body; // Mensaje a enviar


if ($mail->send()){
	$response = ['success' => true, 'message' => 'Mensaje enviado correctamente.'];
} else {
	$errorInfo = property_exists($mail, 'ErrorInfo') ? $mail->ErrorInfo : 'Error desconocido al enviar correo.';
	$response = ['success' => false, 'message' => 'Error al enviar el correo.', 'error' => $errorInfo];
}

$extra = trim(ob_get_clean());
if ($extra) $response['debug'] = $extra;
echo json_encode($response);

