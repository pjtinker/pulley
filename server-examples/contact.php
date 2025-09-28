<?php
// server-examples/contact.php - SMTP example for non-Netlify hosts
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ . '/vendor/autoload.php';
header('Content-Type: application/json');
try {
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['ok'=>false,'error'=>'Method not allowed']); exit; }
  $name=trim($_POST['Name']??''); $phone=trim($_POST['Phone']??''); $city=trim($_POST['City']??''); $desc=trim($_POST['Description']??'');
  if($name===''||$phone===''||$city===''||$desc===''){ http_response_code(400); echo json_encode(['ok'=>false,'error'=>'Missing required fields']); exit; }
  $mail=new PHPMailer(true); $mail->isSMTP(); $mail->Host='smtp.yourprovider.com'; $mail->SMTPAuth=true; $mail->Username='no-reply@pulleyexcavating.com'; $mail->Password='REPLACE_ME'; $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS; $mail->Port=587;
  $mail->setFrom('no-reply@pulleyexcavating.com','Website Quote'); $mail->addAddress('info@pulleyexcavating.com','Pulley Excavating'); $mail->isHTML(true);
  $mail->Subject='New Quote Request';
  $mail->Body=sprintf('<p><strong>Name:</strong> %s</p><p><strong>Phone:</strong> %s</p><p><strong>City:</strong> %s</p><p><strong>Description:</strong> %s</p>', htmlspecialchars($name), htmlspecialchars($phone), htmlspecialchars($city), nl2br(htmlspecialchars($desc)));
  $mail->AltBody="Name: $name\nPhone: $phone\nCity: $city\nDescription:\n$desc";
  $mail->send(); echo json_encode(['ok'=>true]);
} catch (Exception $e) { http_response_code(500); echo json_encode(['ok'=>false,'error'=>$e->getMessage()]); }
