<?php

//$correo = $_POST['correo'];
//echo $correo;

//echo mail("t.antonandres@gmail.com", $correo, "satan es gay")? "todo bien":"todo mal";
/*
include_once '../../lib/swiftmailer-master/lib/swift_required.php';

$miServidor = "10.1.0.49";
$miPuertoSMTP = "6969";
$miUsuario = "desarrollo@softernium.com";
$miPassword = "d35arr0110";


$miSubject			=	"mensaje de correo con swiftmailer";
$miDestinatario		=	array('t.antonandres@gmail.com' => 'Anton');

$miMensaje 			=	"
	<html>
		<head></head>
		<body>
 
			<h3>Cuerpo del Mensaje</h3>
			<hr/>
			<p>Mensaje de prueba con swiftmailer y PHP</p>
			<hr/>
		</body>
	</html>
";

// Inicializamos el transporte
$transport = Swift_SmtpTransport::newInstance($miServidor, $miPuertoSMTP) // Puerto de salida SMTP
->setUsername($miUsuario)
->setPassword($miPassword)
;
 
// Inicializamos swiftmailer
$mailer = Swift_Mailer::newInstance($transport);
 
// Instanciamos el mensaje
$message = Swift_Message::newInstance()
 
// Asunto del mensaje
->setSubject($miSubject)
 
// Especificamos el remitente
->setFrom(array($miUsuario => 'WebDeveloper - CázaresLuis'))
 
// Especificamos el destinatario
->setTo($miDestinatario)
 
// Especificamos el cuerpo del mensaje indicando que es en formato HTML en el segundo parámetro
->setBody($miMensaje,'text/html')
 
// Especificamos el cuerpo del mensaje alternativo
->addPart('<q>Por favor utilice un cliente de correo compatible con HTML!!!!</q>', 'text/html');
 
// Enviamos el mensaje
echo $mailer->send($message)? "enviado":"no enviado";
*/

include_once '../../lib/swiftmailer-master/lib/swift_required.php';



require "vendor/swiftmailer/swiftmailer/lib/swift_required.php";

// Configuración
$transport = Swift_SmtpTransport::newInstance()
->setHost('smtp.gmail.com')
->setPort('587')
->setEncryption('tls')
->setUsername('admin@gmail.com')
->setPassword('password');

$mailer = Swift_Mailer::newInstance($transport);

// Si el formulario es enviado
if (isset($_POST["swiftmailer"]))
{
// Crear el mensaje
$message = Swift_Message::newInstance()
  // Asunto
  ->setSubject('Hola Mundo')
  // Remitente
  ->setFrom(array('admin@gmail.com' => 'Administrador'))
  // Destinatario/s
  ->setTo(array('destinatario1@gmail.com' => 'destinatario1'))
  // Body del mensaje
  ->setBody('<h1>Hola Mundo</h1>', 'text/html');

// Enviar el mensaje
if ($mailer->send($message))
{
    echo "Mensaje enviado correctamente";
}
else
{
    echo "Mensaje fallido";
}
}
?>
