<?php
session_start();
const DATA_FILE = __DIR__ . '/data.json';
const UPLOAD_DIR = __DIR__ . '/assets/uploads/';
const VISITOR_FILE = __DIR__ . '/visitor_stats.json';

function default_data(){
  return [
    'site'=>[
      'name'=>'Akıncı Yazılım','tagline'=>'Dijital ürünler ve özel yazılım çözümleri.','description'=>'Kurumsal web uygulamaları, özel yazılım sistemleri ve dijital ürünler geliştiriyoruz.','email'=>'info@akincıyazılım.rf.gd','phone'=>'','address'=>'Türkiye','maintenance'=>false,'show_intro'=>true,'intro_music'=>'','game_status'=>'Geliştiriliyor','game_url'=>'','adsense_pub_id'=>'ca-pub-1786600436043474','seo_title'=>'Akıncı Yazılım — Dijital Ürün Stüdyosu','seo_description'=>'Akıncı Yazılım; web, mobil ve özel yazılım çözümleri geliştiren dijital ürün stüdyosudur.','hero_title'=>'İşinizi dijitalde ileri taşıyoruz.','hero_text'=>'İhtiyacınıza göre tasarlanan, hızlı ve sürdürülebilir yazılım ürünleri geliştiriyoruz.','hero_kicker'=>'AKINCI YAZILIM · DİJİTAL ÜRÜN STÜDYOSU'
    ],
    'coming_projects'=>[
      ['id'=>'akinci-crm','name'=>'Akıncı CRM','category'=>'Kurumsal Yazılım','description'=>'Müşteri, teklif, görev ve iletişim süreçlerini tek merkezde yöneten masaüstü ürün konsepti.','status'=>'Çok Yakında','progress'=>35,'platform'=>'Windows','technology'=>'C# / .NET · SQL Server','enabled'=>true,'show_in_projects'=>true,'url'=>'csharp-crm.php','image'=>'assets/csharp-crm-visual.png'],
      ['id'=>'akinci-stok','name'=>'Akıncı Stok & Cari','category'=>'Kurumsal Yazılım','description'=>'Stok, cari hesap, satış ve raporlama akışlarını sade bir masaüstü deneyiminde birleştiren ürün konsepti.','status'=>'Çok Yakında','progress'=>25,'platform'=>'Windows','technology'=>'C# / .NET · SQL Server','enabled'=>true,'show_in_projects'=>true,'url'=>'csharp-stok.php','image'=>'assets/csharp-stok-visual.png'],
      ['id'=>'the-watcher','name'=>'THE WATCHER','category'=>'3D Korku Oyunu','description'=>'Modern bir semtte başlayan paranormal olaylar, görünmeyen bir varlık ve gerçek ile hayal arasındaki çizgi. Windows ve Android için geliştiriliyor.','status'=>'Çok Yakında','progress'=>15,'platform'=>'Windows · Android','technology'=>'3D · Korku · Paranormal','enabled'=>true,'show_in_projects'=>true,'url'=>'the-watcher.php','image'=>'assets/the-watcher-cover-v2.png'],
      ['id'=>'butce-pusulasi','name'=>'Bütçe Pusulası','category'=>'Android Uygulaması','description'=>'Kişisel bütçeni, gelir-gider akışını ve finansal hedeflerini tek yerde takip etmene yardımcı olan mobil uygulama.','status'=>'Android’e Hazırlanıyor','progress'=>20,'platform'=>'Android','technology'=>'Mobil · Finans · Takip','enabled'=>true,'show_in_projects'=>true,'url'=>'butce-pusulasi.php','image'=>''],
    ],
    'projects'=>[
      ['id'=>'ligbudur','name'=>'Lig Budur','category'=>'Dijital Ürün · Oyun','description'=>'Futbol menajerlik deneyimini web üzerinde yeniden tasarlayan yeni nesil oyun projesi.','status'=>'Geliştiriliyor','featured'=>true,'url'=>'ligbudur.php','image'=>'assets/ligbasi-logo.png'],
      ['id'=>'custom','name'=>'Özel Yazılım Sistemleri','category'=>'Kurumsal Çözümler','description'=>'İş süreçlerine özel web tabanlı yönetim ve otomasyon sistemleri.','status'=>'Proje Bazlı','featured'=>true,'url'=>'#iletisim','image'=>''],
      ['id'=>'mobile','name'=>'Mobil & Web Ürünleri','category'=>'Ürün Geliştirme','description'=>'Fikirden yayına kadar ölçeklenebilir dijital ürün geliştirme.','status'=>'Proje Bazlı','featured'=>false,'url'=>'#hizmetler','image'=>'']
    ],
    'watcher'=>[
      'status'=>'Çok Yakında','progress'=>15,
      'hero_kicker'=>'AKINCI YAZILIM · YENİ PROJE',
      'hero_text'=>'Gerçek ile hayal arasındaki çizgi… Modern bir semtte başlayan paranormal olayların içine gir. Seni izleyen şeyin ne olduğunu anlamaya çalışırken her ışığın, her kapının ve her sessizliğin bir anlamı var.',
      'cover'=>'assets/the-watcher-cover-v2.png',
      'platforms'=>['3D KORKU','WINDOWS','ANDROID','ÇOK YAKINDA'],
      'gallery'=>[
        ['image'=>'assets/the-watcher-street.png','title'=>'01 / SOKAK','caption'=>'Yağmur sonrası sessiz mahalle.'],
        ['image'=>'assets/the-watcher-hallway.png','title'=>'02 / KORİDOR','caption'=>'Işığın bittiği yerde başlayan gerilim.'],
        ['image'=>'assets/the-watcher-balcony.png','title'=>'03 / İZLEYEN','caption'=>'Camın arkasında gerçekten biri var mı?'],
        ['image'=>'assets/the-watcher-bedroom.png','title'=>'04 / ODA','caption'=>'Ekrandaki görüntü, odadakinden daha ürkütücü.']
      ]
    ],
    'messages'=>[],
    'stats'=>['projects'=>'24+','deliveries'=>'186+','uptime'=>'99.9%','experience'=>'5+']
  ];
}
function load_data(){
  if(!file_exists(DATA_FILE)){ $d=default_data(); save_data($d); return $d; }
  $raw=file_get_contents(DATA_FILE); $d=json_decode($raw,true); return is_array($d)?array_replace_recursive(default_data(),$d):default_data();
}
function save_data($d){ file_put_contents(DATA_FILE,json_encode($d,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE),LOCK_EX); }

function visitor_stats(){
  if(!file_exists(VISITOR_FILE)) return ['days'=>[]];
  $raw=file_get_contents(VISITOR_FILE); $d=json_decode($raw,true);
  return is_array($d)?array_replace(['days'=>[]],$d):['days'=>[]];
}
function save_visitor_stats($d){
  file_put_contents(VISITOR_FILE,json_encode($d,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE),LOCK_EX);
}
function track_visit(){
  if(admin_logged()) return;
  $day=date('Y-m-d');
  $cookie='ak_visit_'.$day;
  if(!empty($_COOKIE[$cookie])) return;
  $v=visitor_stats();
  if(!isset($v['days'][$day])) $v['days'][$day]=0;
  $v['days'][$day]++;
  // One cookie per day keeps this as a daily unique-browser count; no IP is stored.
  setcookie($cookie,'1',['expires'=>time()+86400,'path'=>'/','secure'=>!empty($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off','httponly'=>true,'samesite'=>'Lax']);
  save_visitor_stats($v);
}

function csrf(){ if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(16)); return $_SESSION['csrf']; }
function check_csrf(){ if(!hash_equals($_SESSION['csrf']??'', $_POST['csrf']??'')) die('Geçersiz istek.'); }
function admin_logged(){ return !empty($_SESSION['admin_ok']); }
function require_admin(){ if(!admin_logged()){ header('Location: login.php'); exit; } }
function e($v){ return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8'); }
function adsense_head(){
  return '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1786600436043474" crossorigin="anonymous"></script>';
}
function redirect($url){ header('Location: '.$url); exit; }
function current_password_hash(){
  $f=__DIR__.'/.admin_pass';
  if(!file_exists($f)) file_put_contents($f,password_hash('admin123',PASSWORD_DEFAULT),LOCK_EX);
  return trim(file_get_contents($f));
}
function set_admin_password($p){ file_put_contents(__DIR__.'/.admin_pass',password_hash($p,PASSWORD_DEFAULT),LOCK_EX); }
function upload_file($field,$allowed){
  if(empty($_FILES[$field]) || $_FILES[$field]['error']!==UPLOAD_ERR_OK) return '';
  $ext=strtolower(pathinfo($_FILES[$field]['name'],PATHINFO_EXTENSION));
  if(!in_array($ext,$allowed,true)) return '';
  if(!is_dir(UPLOAD_DIR)) mkdir(UPLOAD_DIR,0755,true);
  $name=bin2hex(random_bytes(8)).'.'.$ext;
  $target=UPLOAD_DIR.$name;
  if(move_uploaded_file($_FILES[$field]['tmp_name'],$target)) return 'assets/uploads/'.$name;
  return '';
}
