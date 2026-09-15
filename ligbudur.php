<?php
require_once __DIR__.'/_common.php';
$d=load_data();
track_visit();
$s=$d['site'];
$music=$s['intro_music']??'';
$betaEnabled = !empty($s['game_beta_enabled']);
$betaProgress = max(0,min(100,(int)($s['game_beta_progress']??35)));
$betaLabel = $s['game_beta_label']??'Geliştirme aşamasında';
$platforms = [
  ['key'=>'windows','name'=>'Windows','status'=>$s['windows_status']??'Çok Yakında','url'=>$s['windows_url']??''],
  ['key'=>'android','name'=>'Android','status'=>$s['android_status']??'Çok Yakında','url'=>$s['android_url']??''],
  ['key'=>'mac','name'=>'Mac','status'=>$s['mac_status']??'Bekleniyor','url'=>''],
  ['key'=>'apple','name'=>'Apple','status'=>$s['apple_status']??'Bekleniyor','url'=>'']
];
?><!doctype html>
<html lang="tr">
<head>
<?php if(function_exists('adsense_head')) echo adsense_head(); ?>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="Lig Başı — yeni nesil futbol menajerlik oyunu.">
<title>Lig Başı — Futbol Menajerlik Oyunu</title>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700;800&family=Inter:wght@500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css?v=15">
</head>
<body class="game-body">
<header class="game-header">
  <a href="index.php" class="game-brand"><img src="assets/ligbasi-logo-wide.png" alt="Lig Başı"><span>LİG BAŞI<small>FUTBOL MANAJERLİK OYUNU</small></span></a>
  <nav><a href="#oyun">Oyun</a><a href="#ozellikler">Özellikler</a><a href="#ekranlar">Ekranlar</a><a href="#android">Android</a><a href="#indirme">Yayın</a><a href="#vizyon">Vizyon</a></nav>
  <a href="#indirme" class="game-cta"><?=e($s['game_status'])?> <span>→</span></a>
</header>
<main>
<section id="oyun" class="game-hero game-hero-image" style="background-image:url('assets/ligbasi-hero.png')">
  <div class="game-hero-overlay"></div>
  <div class="game-hero-copy">
    <p class="game-kicker">YENİ NESİL FUTBOL MANAJERLİĞİ</p>
    <h1>Takımını kur.<br><em>Ligini yönet.</em></h1>
    <p>Transferleri planla, kadronu şekillendir, taktiklerini belirle ve kulübünü zirveye taşı. Lig Başı'nda her kararın sahada bir karşılığı var.</p>
    <div class="game-actions"><button class="play-btn" onclick="openIntro()">▶ INTRO'YU İZLE</button><span class="game-outline disabled">YAKINDA</span></div>
    <div class="game-status-rail"><div><span>GELİŞTİRME</span><b>AKTİF</b></div><div><span>BETA</span><b>HAZIRLANIYOR</b></div><div><span>PLATFORM</span><b>WINDOWS · ANDROID</b></div></div>
  </div>
</section>
<section id="ozellikler" class="game-section">
  <div class="game-section-head"><p>OYUN DÜNYASI</p><h2>Menajerlik oyununun<br>temeli kararların.</h2></div>
  <div class="feature-grid">
    <article><span>01 / KADRO</span><h3>Kadronu kur.</h3><p>Oyuncularını değerlendir, rotasyonunu oluştur ve sahaya en güçlü 11'ini çıkar.</p></article>
    <article><span>02 / TAKTİK</span><h3>Taktiğini belirle.</h3><p>Formasyonunu seç, oyun planını oluştur ve rakibe göre maç planını değiştir.</p></article>
    <article><span>03 / TRANSFER</span><h3>Doğru transferi yap.</h3><p>Scout raporlarını incele, bütçeni yönet ve takımına değer katacak oyuncuları bul.</p></article>
    <article><span>04 / GELİŞİM</span><h3>Takımını geliştir.</h3><p>Oyuncularının gelişimini takip et, kulübünü sezonlar boyunca büyüt.</p></article>
  </div>
</section>
<section class="game-command">
  <div class="game-section-head"><p>MENAJER MERKEZİ</p><h2>Her karar,<br>tek bir merkezde.</h2></div>
  <div class="command-grid">
    <article><span>01</span><h3>Günün özeti</h3><p>Fikstür, takım haberleri ve bekleyen kararları tek ekranda gör.</p><b>MAÇLAR · HABERLER · GÖREVLER</b></article>
    <article><span>02</span><h3>Taktik çalışma alanı</h3><p>Rakibe göre planını değiştir, formasyonu sahada doğrudan gör.</p><b>FORMASYON · PRES · OYUN PLANI</b></article>
    <article><span>03</span><h3>Transfer ve scout</h3><p>Oyuncuları karşılaştır, bütçeyi koru ve doğru hamleyi yap.</p><b>SCOUT · BÜTÇE · TRANSFER</b></article>
  </div>
</section>
<section class="game-loop">
  <div class="game-section-head"><p>OYUN DÖNGÜSÜ</p><h2>Her sezon,<br>yeni bir karar zinciri.</h2></div>
  <div class="loop-grid">
    <article><span>01</span><strong>KULÜP</strong><h3>Planını kur.</h3><p>Hedefini belirle, bütçeni gör ve sezonun rotasını çiz.</p></article>
    <article><span>02</span><strong>KADRO</strong><h3>Takımı hazırla.</h3><p>Oyuncu rollerini dağıt, rotasyonu oluştur ve eksikleri bul.</p></article>
    <article><span>03</span><strong>TAKTİK</strong><h3>Rakibe göre oyna.</h3><p>Formasyonunu ve oyun planını maçın şartlarına göre değiştir.</p></article>
    <article><span>04</span><strong>MAÇ</strong><h3>Sonucu yönet.</h3><p>Kararlarının sahadaki karşılığını gör ve bir sonraki hamleye geç.</p></article>
  </div>
  <div class="loop-line"><span></span><i></i><i></i><i></i><i></i><span></span></div>
</section>
<section id="ekranlar" class="game-screens">
  <div class="game-section-head"><p>OYUNDAN GÖRÜNTÜLER</p><h2>Karar verdiğin<br>ekranlar.</h2></div>
  <div class="screen-spotlight">
    <div class="screen-main">
      <img id="screenMain" src="assets/ligbasi-kadro.png" alt="Lig Başı kadro yönetimi ekranı">
      <div class="screen-main-caption"><span id="screenIndex">01 / 04</span><div><b id="screenTitle">KADRO YÖNETİMİ</b><p id="screenDesc">Oyuncularını yönet, takımını sahaya hazırla.</p></div></div>
    </div>
    <div class="screen-tabs" role="tablist" aria-label="Oyun ekranları">
      <button class="screen-tab active" data-image="assets/ligbasi-kadro.png" data-title="KADRO YÖNETİMİ" data-desc="Oyuncularını yönet, takımını sahaya hazırla." data-index="01 / 04"><span>01</span><b>Kadro</b><i></i></button>
      <button class="screen-tab" data-image="assets/ligbasi-taktik.png" data-title="TAKTİK EKRANI" data-desc="Formasyonunu ve oyun planını belirle." data-index="02 / 04"><span>02</span><b>Taktik</b><i></i></button>
      <button class="screen-tab" data-image="assets/ligbasi-transfer.png" data-title="TRANSFER MERKEZİ" data-desc="Scout, listele, görüş ve transfer et." data-index="03 / 04"><span>03</span><b>Transfer</b><i></i></button>
      <button class="screen-tab" data-image="assets/ligbasi-macgunu.png" data-title="MAÇ GÜNÜ" data-desc="90 dakikanın sonucunu kendi kararların belirlesin." data-index="04 / 04"><span>04</span><b>Maç Günü</b><i></i></button>
    </div>
  </div>
</section>
<section id="android" class="android-showcase">
  <div class="android-wrap">
    <div class="android-banner">
      <div class="android-banner-copy">
        <p class="android-kicker">MOBİL DENEYİM · ANDROID</p>
        <h2>Lig Başı artık<br><em>cebinizde.</em></h2>
        <p>Takımını, taktiğini ve transferlerini Android cihazından yönet. Dokunmatik arayüz için optimize edilen mobil deneyim çok yakında.</p>
        <span class="android-badge">ANDROID · ÇOK YAKINDA</span>
      </div>
      <img src="assets/ligbasi-android-banner.jpg" alt="Lig Başı Android mobil deneyimi" loading="lazy">
    </div>
    <div class="android-head">
      <div><p>ANDROID EKRANLARI</p><h3>Menajerlik deneyimi<br>ekranına sığar.</h3></div>
      <span>04 MOBİL EKRAN</span>
    </div>
    <div class="android-grid">
      <article><img src="assets/ligbasi-android-kadro.jpg" alt="Lig Başı Android kadro yönetimi" loading="lazy"><div><span>01</span><b>KADRO YÖNETİMİ</b><p>İlk 11'ini oluştur, oyuncularını yönet.</p></div></article>
      <article><img src="assets/ligbasi-android-taktik.jpg" alt="Lig Başı Android taktik ekranı" loading="lazy"><div><span>02</span><b>TAKTİK MERKEZİ</b><p>Formasyonunu ve oyun planını belirle.</p></div></article>
      <article><img src="assets/ligbasi-android-transfer.jpg" alt="Lig Başı Android transfer merkezi" loading="lazy"><div><span>03</span><b>TRANSFER MERKEZİ</b><p>Oyuncuları incele, doğru hamleyi yap.</p></div></article>
      <article><img src="assets/ligbasi-android-macgunu.jpg" alt="Lig Başı Android maç günü" loading="lazy"><div><span>04</span><b>MAÇ GÜNÜ</b><p>Maç istatistiklerini takip et, karar ver.</p></div></article>
    </div>
    <div class="android-note"><span>ANDROID</span><strong>Dokunmatik kontroller · hızlı erişim · optimize performans</strong><b>ÇOK YAKINDA</b></div>
  </div>
</section>
<section id="indirme" class="game-release">
  <div class="game-section-head"><p>YAYIN DURUMU</p><h2>Bir sonraki sezon<br>burada başlıyor.</h2></div>
  <?php if($betaEnabled): ?>
  <div class="beta-panel">
    <div class="beta-top"><div><span class="beta-label">LİG BAŞI / <?=e($betaLabel)?></span><h3>Oyun geliştiriliyor.</h3></div><strong><?=e((string)$betaProgress)?>%</strong></div>
    <div class="beta-track"><span style="width:<?=$betaProgress?>%"></span></div>
    <div class="beta-foot"><span>Geliştirme devam ediyor</span><span>Beta hazırlığı</span></div>
  </div>
  <?php endif; ?>
  <div class="release-table-wrap">
    <table class="release-table">
      <thead><tr><th>PLATFORM</th><th>DURUM</th><th>YAYIN</th><th></th></tr></thead>
      <tbody>
      <?php foreach($platforms as $platform):
        $icon='assets/platform-'.$platform['key'].($platform['key']==='windows'||$platform['key']==='mac'?'.png':'.webp');
        if($platform['key']==='windows') $icon='assets/platform-windows.png';
        if($platform['key']==='android') $icon='assets/platform-android.webp';
        if($platform['key']==='mac') $icon='assets/platform-mac.png';
        if($platform['key']==='apple') $icon='assets/platform-apple.webp';
      ?>
        <tr>
          <td><div class="release-platform"><span class="release-icon"><img src="<?=e($icon)?>" alt="<?=e($platform['name'])?>"></span><strong><?=e($platform['name'])?></strong></div></td>
          <td><span class="release-status <?=!empty($platform['url'])?'online':''?>"><i></i><?=!empty($platform['url'])?'İNDİRİME AÇIK':e($platform['status'])?></span></td>
          <td><span class="release-date"><?=!empty($platform['url'])?'Şimdi':'Bekleniyor'?></span></td>
          <td><?php if(!empty($platform['url'])): ?><a class="platform-download" href="<?=e($platform['url'])?>" target="_blank" rel="noopener">İNDİR ↗</a><?php else: ?><span class="release-soon">ÇOK YAKINDA</span><?php endif; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="release-note"><b>Platform planı</b><span>Windows ve Android yayın bağlantıları Yönetim Merkezi'nden ayrı ayrı açılabilir. Mac ve Apple sürümleri için yayın tarihi daha sonra duyurulacaktır.</span></div>
</section>
<section id="vizyon" class="game-quote"><p>“Sadece maç kazanma.<br><strong>Bir futbol kulübü inşa et.</strong>”</p><small>LİG BAŞI · ÇOK YAKINDA</small></section>
</main>
<footer class="game-footer"><span>© <?=date('Y')?> Lig Başı · Akıncı Yazılım</span><a href="index.php">Akıncı Yazılım ↗</a></footer>
<?php if(!empty($s['show_intro'])): ?>
<div class="intro-modal auto-intro" id="introModal" aria-hidden="true">
  <div class="intro-shell intro-fullscreen">
    <button class="intro-close" onclick="closeIntro()" aria-label="İntroyu kapat">×</button>
    <video id="introVideo" autoplay muted playsinline preload="auto" poster="assets/ligbasi-hero.png"><source src="assets/ligbasi-intro.mp4" type="video/mp4"></video>
    <?php if($music): ?><audio id="introMusic" preload="auto"><source src="<?=e($music)?>"></audio><?php endif; ?>
    <div class="intro-actions"><button onclick="enableSound()">🔊 Sesi Aç</button><button onclick="closeIntro()">İntroyu Geç →</button></div>
  </div>
</div>
<?php endif; ?>
<script>
const screenTabs=document.querySelectorAll('.screen-tab');
const screenMain=document.getElementById('screenMain');
const screenTitle=document.getElementById('screenTitle');
const screenDesc=document.getElementById('screenDesc');
const screenIndex=document.getElementById('screenIndex');
screenTabs.forEach(tab=>tab.addEventListener('click',()=>{
  screenTabs.forEach(t=>t.classList.remove('active')); tab.classList.add('active');
  if(screenMain){screenMain.classList.add('changing');setTimeout(()=>{screenMain.src=tab.dataset.image;screenMain.alt='Lig Başı '+tab.dataset.title.toLowerCase();screenTitle.textContent=tab.dataset.title;screenDesc.textContent=tab.dataset.desc;screenIndex.textContent=tab.dataset.index;screenMain.classList.remove('changing');},140);}
}));
const introModal=document.getElementById('introModal'), introVideo=document.getElementById('introVideo'), introMusic=document.getElementById('introMusic');
function openIntro(){if(!introModal)return;introModal.classList.add('open');introModal.setAttribute('aria-hidden','false');if(introVideo){introVideo.currentTime=0;introVideo.muted=true;const playIntro=()=>introVideo.play().catch(()=>{});if(introVideo.readyState>=2)playIntro();else introVideo.addEventListener('canplay',playIntro,{once:true});}if(introMusic){introMusic.currentTime=0;introMusic.volume=.48;introMusic.play().catch(()=>{});}}
function closeIntro(){if(!introModal)return;introModal.classList.remove('open');introModal.setAttribute('aria-hidden','true');if(introVideo)introVideo.pause();if(introMusic){introMusic.pause();introMusic.currentTime=0;}}
function enableSound(){if(introVideo){introVideo.muted=false;introVideo.volume=.8;}if(introMusic)introMusic.play().catch(()=>{});}
if(introVideo){introVideo.addEventListener('ended',closeIntro);window.addEventListener('load',()=>setTimeout(openIntro,250));}
</script>
</body></html>
