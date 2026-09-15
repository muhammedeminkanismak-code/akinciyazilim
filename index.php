<?php
require_once __DIR__ . '/_common.php';
$d = load_data();
track_visit();
$s = $d['site'];
if ($s['maintenance'] && !admin_logged()) {
?><!doctype html><html lang="tr"><head>
<?php if(function_exists('adsense_head')) echo adsense_head(); ?><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=e($s['name'])?></title><link rel="stylesheet" href="styles.css?v=19"></head><body><main class="maintenance"><img src="assets/akinci-logo-white.png" class="maintenance-logo" alt="Akıncı Yazılım"><p class="eyebrow">AKINCI YAZILIM</p><h1>Bakım çalışması yapıyoruz.</h1><p>Site kısa süre içinde tekrar yayında olacak.</p></main></body></html><?php exit; }
$featured = array_values(array_filter($d['projects'], fn($p) => !empty($p['featured'])));
$coming = array_values(array_filter($d['coming_projects'] ?? [], fn($p) => !empty($p['enabled']) && !empty($p['show_in_projects'])));
?><!doctype html>
<html lang="tr">
<head>
<?php if(function_exists('adsense_head')) echo adsense_head(); ?>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="<?=e($s['seo_description'])?>"><meta name="theme-color" content="#071018">
<title><?=e($s['seo_title'])?></title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css?v=19">
</head>
<body class="corporate-body">
<header class="site-header">
  <div class="header-inner">
    <a href="index.php" class="brand" aria-label="Akıncı Yazılım ana sayfa">
      <span class="brand-image"><img src="assets/akinci-logo-white.png" alt="Akıncı Yazılım"></span>
      <span class="brand-word"><b>AKINCI</b><small>YAZILIM</small></span>
    </a>
    <nav class="desktop-nav" aria-label="Ana menü">
      <a href="#hizmetler">Hizmetler</a><a href="#projeler">Projeler</a><a href="#teknoloji">Teknoloji</a><a href="#yakinda">Yakında</a><a href="#yaklasim">Yaklaşım</a><a href="#hakkimizda">Hakkımızda</a><a href="#iletisim">İletişim</a>
    </nav>
    <a href="#iletisim" class="header-cta">Teklif Al <span>↗</span></a>
    <button class="menu-btn" type="button" aria-label="Menüyü aç" onclick="document.body.classList.toggle('nav-open')"><span></span><span></span></button>
  </div>
</header>
<div class="mobile-nav"><a href="#hizmetler">Hizmetler</a><a href="#projeler">Projeler</a><a href="#teknoloji">Teknoloji</a><a href="#yakinda">Yakında</a><a href="#yaklasim">Yaklaşım</a><a href="#hakkimizda">Hakkımızda</a><a href="#iletisim">İletişim</a></div>
<main>
<?php if(isset($_GET['sent'])): ?><div class="contact-flash <?=e($_GET['sent'])?> container"><?php if($_GET['sent']==='1'): ?>Mesajınız alındı. Teşekkürler; en kısa sürede dönüş yapacağız.<?php elseif($_GET['sent']==='wait'): ?>Kısa süre içinde tekrar mesaj göndermeden önce biraz bekleyin.<?php else: ?>Mesaj gönderilemedi. Lütfen bilgilerinizi kontrol edip tekrar deneyin.<?php endif; ?></div><?php endif; ?>
<section class="hero corporate-hero-video">
  <video class="corporate-hero-bg" id="corporateIntro" autoplay muted playsinline preload="auto" aria-hidden="true">
    <source src="assets/akinci-yazilim-intro.mp4" type="video/mp4">
  </video>
  <div class="corporate-hero-overlay"></div>
  <div class="hero-inner container">
    <div class="hero-copy">
      <p class="eyebrow">AKINCI YAZILIM <i></i> SOFTWARE & PRODUCT ENGINEERING</p>
      <h1>Yazılımı,<br><em>ürünün merkezine</em><br>koyuyoruz.</h1>
      <p class="hero-text">Dijital ürünleri; güçlü mühendislik, sade deneyim ve ölçeklenebilir altyapıyla tasarlıyor, geliştiriyor ve yayına hazırlıyoruz.</p>
      <div class="actions"><a class="btn primary" href="#projeler">Projeleri keşfedin <span>→</span></a><a class="text-link" href="#hizmetler">Ne yapıyoruz? <span>↘</span></a></div>
      <div class="hero-meta"><span>01 / STRATEJİ</span><span>02 / TASARIM</span><span>03 / MÜHENDİSLİK</span></div>
  </div>
</section>
<section class="metrics"><div class="container metrics-inner"><div><strong><?=e($d['stats']['projects'])?></strong><span>Proje ve ürün</span></div><div><strong><?=e($d['stats']['deliveries'])?></strong><span>Üretime alınan teslim</span></div><div><strong><?=e($d['stats']['uptime'])?></strong><span>Hedeflenen erişilebilirlik</span></div><div><strong><?=e($d['stats']['experience'])?></strong><span>Yıllık ürün deneyimi</span></div></div></section>
<section id="hizmetler" class="section container">
  <div class="section-intro"><div><p class="eyebrow dark">HİZMETLER</p><h2>Teknolojiyi fikirden<br>ürüne taşıyoruz.</h2></div><p>İhtiyacın büyüklüğü ne olursa olsun; doğru mimariyi, sade bir kullanıcı deneyimini ve sürdürülebilir bir geliştirme sürecini birlikte kuruyoruz.</p></div>
  <div class="service-grid"><article><div class="service-no">01</div><h3>Özel Yazılım</h3><p>İş süreçlerinize göre şekillenen yönetim panelleri, otomasyonlar, entegrasyonlar ve web tabanlı sistemler.</p><a href="#iletisim">Çözümünüzü konuşalım <span>→</span></a></article><article><div class="service-no">02</div><h3>Dijital Ürün</h3><p>Fikrin doğrulanmasından ürün deneyimine ve teknik altyapıya kadar uçtan uca dijital ürün geliştirme.</p><a href="#iletisim">Ürün fikrini anlat <span>→</span></a></article><article><div class="service-no">03</div><h3>Web & Mobil</h3><p>Hızlı, erişilebilir ve farklı ekranlarda tutarlı çalışan modern web ve mobil deneyimler.</p><a href="#iletisim">Proje başlat <span>→</span></a></article></div>
</section>
<section id="teknoloji" class="tech-studio">
  <div class="container">
    <div class="section-intro tech-studio-head">
      <div><p class="eyebrow dark">ÜRÜN STÜDYOSU</p><h2>Fikri değil,<br>çalışan ürünü tasarlıyoruz.</h2></div>
      <p>Modern teknoloji ekiplerinin sevdiğimiz yaklaşımını Akıncı'ya uyarladık: kısa anlatım, gerçek üretim akışı ve ürünü gösteren net yüzeyler. Gösteriş yerine ne yaptığımızı görünür kılıyoruz.</p>
    </div>
    <div class="tech-pillars">
      <article><span>01</span><div><h3>Ürün düşüncesi</h3><p>İhtiyacı, kullanıcıyı ve başarı ölçüsünü geliştirmeden önce netleştiriyoruz.</p></div><b>DISCOVER</b></article>
      <article><span>02</span><div><h3>Hızlı prototip</h3><p>Fikri erken görünür hale getiriyor, doğru akışı gerçek ekranlarla doğruluyoruz.</p></div><b>PROTOTYPE</b></article>
      <article><span>03</span><div><h3>Mühendislik</h3><p>Performans, erişilebilirlik ve sürdürülebilirlik düşünülerek ürünü inşa ediyoruz.</p></div><b>BUILD</b></article>
      <article><span>04</span><div><h3>Canlıya geçiş</h3><p>Yayın sonrası ölçüyor, geliştiriyor ve ürünün büyümesine devam ediyoruz.</p></div><b>EVOLVE</b></article>
    </div>
    <div class="tech-flow"><span>FİKİR</span><i></i><span>ÜRÜN</span><i></i><span>YAYIN</span><i></i><span>GELİŞİM</span></div>
  </div>
</section>
<section id="projeler" class="projects-section"><div class="container"><div class="section-intro project-intro"><div><p class="eyebrow dark">SEÇİLİ PROJELER</p><h2>Üretimin arkasındaki<br>ürünleri keşfedin.</h2></div><p>Akıncı Yazılım'ın projeleri farklı ihtiyaçlar için farklı deneyimler sunar. <strong>Lig Başı</strong> için oyun dünyasına özel tasarlanmış ayrı bir deneyim hazırladık.</p></div><div class="project-grid"><?php foreach($featured as $p): ?><a class="project-card <?= $p['id']==='ligbudur'?'game-project':'' ?>" href="<?=e($p['url'])?>"><div class="project-art <?=!empty($p['image'])?'has-image':''?>" <?php if(!empty($p['image'])): ?>style="background-image:url('<?=e($p['image'])?>')"<?php endif; ?>><span class="project-tag"><?=e($p['category'])?></span><span class="project-arrow">↗</span></div><div class="project-meta"><div><h3><?=e($p['id']==='ligbudur'?'Lig Başı':$p['name'])?></h3><p><?=e($p['id']==='ligbudur'?'Yeni nesil futbol menajerlik oyunu.':$p['description'])?></p></div><span><?=e($p['status'])?></span></div></a><?php endforeach; ?><?php foreach($coming as $p): ?><a class="project-card coming-project-card" href="<?=e($p['url'])?>"><div class="project-art <?=!empty($p['image'])?'has-image':''?>" <?php if(!empty($p['image'])): ?>style="background-image:url('<?=e($p['image'])?>')"<?php endif; ?> ><span class="project-tag"><?=e($p['category'])?></span><span class="project-arrow">↗</span></div><div class="project-meta"><div><h3><?=e($p['name'])?></h3><p><?=e($p['description'])?></p></div><span><?=e($p['status'])?></span></div></a><?php endforeach; ?></div></div></section>
<section id="yakinda" class="coming-projects">
  <div class="container">
    <div class="coming-head">
      <div><p class="eyebrow dark">YAKINDA · C# / .NET</p><h2>Yeni masaüstü<br>ürünleri geliştiriyoruz.</h2></div>
      <p>Akıncı'nın yazılım tarafında sıradaki iki konsepti: işletmeler için güçlü masaüstü araçları. Her proje ayrı bir ürün sayfasında; kapsam, teknoloji ve geliştirme durumu şeffaf biçimde gösteriliyor.</p>
    </div>
    <div class="coming-visual"><img src="assets/akinci-code-lab.jpg" alt="Akıncı Yazılım geliştirme stüdyosu görseli"><div><span>BUILD / TEST / SHIP</span><b>C# ile fikirden çalışan ürüne.</b></div></div>
    <div class="coming-grid">
      <a class="coming-card" href="csharp-crm.php"><div class="coming-art"><img src="assets/csharp-crm-visual.png" alt="Akıncı CRM önizleme"></div><div class="coming-card-body"><span>01 · C# / .NET</span><h3>Akıncı CRM</h3><p>Müşteri, teklif, görev ve iletişim süreçlerini tek masaüstü merkezinde toplamak için tasarlanan CRM ürünü.</p><div><b>ÇOK YAKINDA</b><i>Projeyi incele ↗</i></div></div></a>
      <a class="coming-card" href="csharp-stok.php"><div class="coming-art"><img src="assets/csharp-stok-visual.png" alt="Akıncı Stok ve Cari önizleme"></div><div class="coming-card-body"><span>02 · C# / .NET</span><h3>Akıncı Stok & Cari</h3><p>Stok, cari, satış ve temel raporlama akışlarını sade bir masaüstü deneyiminde birleştiren ürün konsepti.</p><div><b>ÇOK YAKINDA</b><i>Projeyi incele ↗</i></div></div></a>
    </div>
  </div>
</section>
<section id="yaklasim" class="approach"><div class="container approach-inner"><div><p class="eyebrow">YAKLAŞIM</p><h2>Net hedef.<br>Doğru teknoloji.<br>Ölçülebilir sonuç.</h2><p class="approach-copy">Gereksiz karmaşıklık yerine; ihtiyacı anlayan, hızla doğrulayan ve büyümeye hazır çözümler geliştiriyoruz.</p></div><div class="steps"><article><b>01</b><h3>Keşif</h3><p>İhtiyaçları, kullanıcıları ve başarı kriterlerini netleştiriyoruz.</p></article><article><b>02</b><h3>Üretim</h3><p>Tasarım ve mühendisliği aynı ekip içinde ilerletiyoruz.</p></article><article><b>03</b><h3>Yayın</h3><p>Test, optimizasyon ve canlıya alma sürecini birlikte yönetiyoruz.</p></article></div></div></section>
<section id="hakkimizda" class="about container"><div><p class="eyebrow dark">AKINCI YAZILIM</p><h2>Sadece yazılım değil,<br>çalışan sistemler kuruyoruz.</h2></div><div class="about-copy"><p>Amacımız yalnızca çalışan bir uygulama teslim etmek değil; işiniz büyüdükçe büyüyebilen, yönetilebilir ve güvenilir dijital altyapılar oluşturmak.</p><p>Stratejiden kullanıcı deneyimine, geliştirmeden yayına kadar sürecin tamamını tek bir üretim yaklaşımıyla ele alıyoruz.</p></div></section>
<section id="iletisim" class="contact"><div class="container contact-inner"><div><p class="eyebrow">İLETİŞİM</p><h2>Bir fikriniz varsa,<br>konuşalım.</h2><p>Projenizi birkaç cümleyle anlatın. İhtiyacınızı değerlendirip size dönüş yapalım.</p><div class="contact-note"><span>AKINCI YAZILIM</span><span>Türkiye · Dijital Ürün & Yazılım</span></div><p class="contact-privacy">Mesajınız herkese açık olarak yayınlanmaz. Gönderdiğiniz bilgiler, iletişim talebinizi değerlendirmek amacıyla yetkili yönetici panelinde görüntülenir. <a href="kvkk.php">KVKK Aydınlatma Metni</a></p></div><form method="post" action="send-message.php"><input type="hidden" name="csrf" value="<?=e(csrf())?>"><div class="form-honeypot" aria-hidden="true"><label>Website<input name="website" tabindex="-1" autocomplete="off"></label></div><label><span>Ad Soyad</span><input name="name" maxlength="120" placeholder="Adınız ve soyadınız" required></label><label><span>E-posta</span><input name="email" type="email" maxlength="180" placeholder="ornek@firma.com" required></label><label><span>Konu</span><input name="subject" maxlength="180" placeholder="Proje / iş birliği / bilgi"></label><label><span>Mesaj</span><textarea name="message" maxlength="5000" placeholder="Projenizden, hedefinizden veya ihtiyacınızdan bahsedin..." required></textarea></label><label class="privacy-check"><input type="checkbox" required><span>KVKK Aydınlatma Metni'ni okudum ve bilgilendirildim. <a href="kvkk.php" target="_blank" rel="noopener">Metni görüntüle</a></span></label><button class="btn light" type="submit">Mesaj gönder <span>→</span></button></form></div></section>
</main>
<footer><div class="container footer-inner"><a href="index.php" class="footer-brand"><img src="assets/akinci-logo-white.png" alt="Akıncı Yazılım"><span>AKINCI YAZILIM</span></a><p>© <?=date('Y')?> Akıncı Yazılım. Tüm hakları saklıdır.</p><span class="footer-legal"><a href="kvkk.php">KVKK &amp; Yasal Bilgilendirme</a><a class="footer-admin" href="login.php">Yönetici Girişi ↗</a></span></div></footer>
<script>
document.querySelectorAll('.mobile-nav a').forEach(a=>a.addEventListener('click',()=>document.body.classList.remove('nav-open')));
const corporateIntro=document.getElementById('corporateIntro');
if(corporateIntro){
  corporateIntro.addEventListener('ended',()=>{ corporateIntro.pause(); });
}
</script>
</body></html>
