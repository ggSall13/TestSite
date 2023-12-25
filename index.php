<?php
// Php code

$news = [];

$files = scandir($_SERVER['DOCUMENT_ROOT'] . '/data');
foreach ($files as $file) {
  if ($file == '.' || $file == '..') continue;

  $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/' . $file);
  $news[] = unserialize($content);
}


if (!empty($_GET['act']) && $_GET['act'] == 'view') {
  require_once 'news.php';
  die();
}





// Header and Menu
$title = "Main"; //Динамический тайтл
$link = "<a class=\"link\" href='profile.php'>Profile</a>"; //Динамическая ссылка

require_once 'templates/header.php';
require_once 'templates/menu.php';
?>

<body>
<main>
<div class="album py-5 bg-light">
  <div class="container">

    <div class="row">
      <?php foreach ($news as $item) : ?>
      <div class="col-md-4">
        <div class="card mb-4 box-shadow">
          <div class="card-body">
            <h2 class="card-text"><?=mb_substr($item['title'], 0, 25); ?></h2>
            <p class="card-text"><?=mb_substr($item['text'], 0, 25); ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              <a href="/?act=view&id=<?=$item['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div> <!-- row  -->
  </div> <!-- container  -->
</div> <!-- album py-5 bg-light  -->


</main>
  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
      <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/holder.min.js"></script>
</body>
</html>
