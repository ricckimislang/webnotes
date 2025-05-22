<?php
if($_SESSION['user'] ?? false){
    header('location: /');
    exit();
}
return require base_path('views/registration/create.view.php')
?>