
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Başlığı -->
    <title>Görev YS Esat Yucel Software</title>

    <!-- Meta Açıklama -->
    <meta name="description" content="Esat Yücel tarafından geliştirilmiş PHP, MVC ve OOP prensiplerine uygun görev yönetim uygulaması. Kullanıcı giriş, kayıt, görev ekleme, güncelleme ve silme işlemleri içerir.">

    <!-- Anahtar Kelimeler -->
    <meta name="keywords" content="Esat Yücel, PHP, MVC, OOP, Görev Yönetimi, Task Manager, Web Uygulaması">

    <!-- Yazar -->
    <meta name="author" content="Esat Yücel">
   <link rel="stylesheet" href="/../../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }
    main {
      flex: 1 0 auto;
      width: 100vw;
      padding: 0;
      margin: 0;
    }
  </style>
</head>
<body>

<nav>
    <ul style="list-style: none; display: flex; gap: 10px;">
      <li>
      <a href="/">ANA SAYFA</a>
    </li>
        <li><a href="/tasks">Görevler</a></li>
        <?php if(!empty($_SESSION['user_id'])): ?>
            <li><a href="/logout">Çıkış Yap</a></li>
        <?php else: ?>
            <li><a href="/login">Giriş Yap</a></li>
            <li><a href="/register">Kayıt Ol</a></li>
        <?php endif; ?>
    </ul>
</nav>
<main>
  
<!-- main açıldı, içerik burada olacak -->