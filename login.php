<?php 
session_start();

if (!empty($_POST['userName']) && !empty($_POST['password'])) {
   $_SESSION['login'] = $_POST['userName'];
   $_SESSION['password'] = $_POST['password'];
   header ('Location: /profile.php');
   die();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign In</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="styles/album.css">
</head>
<body>
<?php require_once 'templates/menu.php'?>
<div class="wrapper wrapper_login">
   <div class="flex">
      <div class="container_form">
         <form action="" method="post">
            <div class="form-group">
               <input type="text" name="userName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter userName">
            </div>
            <div class="form-group">
               <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
   </div>
</div>
   
</body>
</html>
