<?php
$id = $_GET['id'];
$content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/' . $id . '.txt');
$news = unserialize($content);


$link = '';
$title = mb_substr($news['title'], 0, 20);
require_once 'templates/header.php';
?>

<body>
<?php require_once 'templates/menu.php';?>

<main>
   <div class="container_row">
      <div class="row">
         <h2 class="title_news"><?=$news['title'];?></h2>
         <p class="text_news"><?=$news['text'];?></p>
      </div>
   </div>
</main>


   
</body>
</html>