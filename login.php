<?php require_once __DIR__.'/_common.php';
if(admin_logged()) redirect('admin.php');
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  check_csrf();
  if(($_POST['username']??'')==='admin' && password_verify($_POST['password']??'',current_password_hash())){ $_SESSION['admin_ok']=true; redirect('admin.php'); }
  $error='Şifre hatalı.';
}
?><!doctype html><html lang="tr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Yönetici Girişi · Akıncı Yazılım</title><link rel="stylesheet" href="styles.css?v=4"></head><body class="admin-body"><main class="login-card"><img src="assets/akinci-logo.png" class="login-logo"><p class="eyebrow">AKINCI YAZILIM</p><h1>Yönetici girişi</h1><p class="muted">Site ve Lig Budur yayın ayarlarını yönet.</p><?php if($error):?><div class="alert danger"><?=e($error)?></div><?php endif;?><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf())?>"><label>Kullanıcı adı<input type="text" name="username" value="admin" required autocomplete="username"></label><label>Yönetici şifresi<input type="password" name="password" required autofocus></label><button class="btn primary full">Panele gir</button></form><a href="index.php" class="back">← Siteye dön</a></main></body></html>
