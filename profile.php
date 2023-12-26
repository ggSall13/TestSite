<?php 
session_start();



if (empty($_SESSION)) {
   header ('Location: login.php');
   die();
}

$news = [];

$files = scandir($_SERVER['DOCUMENT_ROOT'] . '/data');
foreach ($files as $file) {
  if ($file == '.' || $file == '..') continue;

  $content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/' . $file);
  $news[] = unserialize($content);
}

if (!empty($_GET['act'] && $_GET['act'] == 'edit')){
   $id = $_GET['id'];
   $contentItem = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/' . $id . '.txt');
   $newsItem = unserialize($contentItem);
}


if (!empty($_POST['text']) && !empty($_POST['title']) && !empty($_POST['id'])) {
   $id = $_GET['id'];
   $data = [
      'id' => $id,
      'title' => $_POST['title'],
      'text' => $_POST['text'],
   ];
   $data = serialize($data);
   file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/' . $id . '.txt', $data);
   header ('Location: /profile');

} elseif (!empty($_POST['text']) && !empty($_POST['title'])) {

   $i = 1;
   $files = scandir($_SERVER['DOCUMENT_ROOT'] . '/data');
   foreach ($files as $file) {
      if ($file == '.' || $file == '..') continue;
      $i++;
   }

   $data = [
      'id' => $i,
      'title' => $_POST['title'],
      'text' => $_POST['text'],
   ];
   $data = serialize($data);
   file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/' . $i . '.txt', $data);
   header ('Location: /profile');
}



$title = "Profile"; //Динамический тайтл
$link = "<a class=\"link\" href='logout.php'>Exit from profile</a>"; //Динамическая ссылка

require_once 'templates/header.php';
require_once 'templates/menu.php';

?>
<body>
   
<div class="container">
   <table class="table">
   <thead>
      <tr>
         <th scope="col">Id</th>
         <th scope="col">Title</th>
         <th scope="col">Action</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($news as $item) :?>
      <tr>
         <th scope="row"><?php echo $item['id'];?></th>
         <td><?php echo mb_substr($item['title'], 0, 15);?></td>
         <td><a href="/profile.php/?act=edit&id=<?=$item['id'];?>">Edit</a></td>
      </tr>
      <?php endforeach ?>
   </tbody>
   </table>
</div>

<div class="container">
   <form method="post">
      <input type="hidden" name="id" value="<?=$newsItem['id'] ?? '';?>">
   <div class="form-group">
      <label for="exampleFormControlInput1">Enter Title</label>
      <input name="title" type="text" class="form-control" value="<?=$newsItem['title'] ?? '';?>" id="exampleFormControlInput1" placeholder="">
   </div>
   <div class="form-group">
      <label for="exampleFormControlTextarea1">Enter text</label>
      <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$newsItem['text'] ?? '';?></textarea>
   </div>
   <div class="form-group">
      <button type="submit" class="btn btn-primary">Send</button>
   </div>
   </form>
</div>

</body>
</html>
