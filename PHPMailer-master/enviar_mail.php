<?php




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 function enviar($email,$cuerpo){
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


 $mail = new PHPMailer(true);

 $mail->IsSMTP(); // enable SMTP
 $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "smtp.gmail.com";
 $mail->Port = 587; // or 465
 $mail->IsHTML(true);
 $mail->Username = "practicaprofesional38@gmail.com";
 $mail->Password = "wcvlhegsusoodzgg";
 $mail->SetFrom("practicaprofesional38@gmail.com");
 $mail->Subject = 'Activar Cuenta  - Sistema de Ropa';
 $mail->Body = $cuerpo;
 $mail->AddAddress($email);
 if($mail->Send())
 {
     return true;
 }else
 {
     return false;
 }

 

}



?>