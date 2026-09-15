<?php
require_once __DIR__.'/_common.php';
if($_SERVER['REQUEST_METHOD']!=='POST') redirect('index.php#iletisim');
check_csrf();

// Basit spam/honeypot ve alan doğrulaması.
if(!empty($_POST['website'])) redirect('index.php?sent=1#iletisim');
$name=trim($_POST['name']??'');
$email=trim($_POST['email']??'');
$subject=trim($_POST['subject']??'');
$message=trim($_POST['message']??'');

if($name==='' || mb_strlen($name)>120 || !filter_var($email,FILTER_VALIDATE_EMAIL) || mb_strlen($email)>180 || $message==='' || mb_strlen($message)>5000){
  redirect('index.php?sent=0#iletisim');
}
if(mb_strlen($subject)>180) $subject=mb_substr($subject,0,180);

// Aynı oturumdan çok kısa aralıklarla otomatik mesaj yağmurunu azaltır.
$now=time();
if(!empty($_SESSION['last_message_at']) && ($now-(int)$_SESSION['last_message_at'])<30){
  redirect('index.php?sent=wait#iletisim');
}
$_SESSION['last_message_at']=$now;

$d=load_data();
$d['messages'][]=[
  'id'=>bin2hex(random_bytes(6)),
  'date'=>date('Y-m-d H:i'),
  'name'=>$name,
  'email'=>$email,
  'subject'=>$subject,
  'message'=>$message,
  'read'=>false
];
save_data($d);
redirect('index.php?sent=1#iletisim');
