<?php
require_once 'users/users.php';
require_once 'partials/header.php';
$id=isset($_GET['id'])?$_GET['id']:$_POST['id'];
echo "update user ". $id;
$users = getUsers();
$name="";
$username="";
$email="";
$phone="";
$website="";
$filename=basename(__FILE__);
$new = getUserById($id);
?>
<div class="container">
    <?php include_once __DIR__ .'/_form.php'; ?>
</div>

<?php

if($valid_name && $valid_username && $valid_phone && $valid_website && isset($_POST) && count($_POST)>0){
    if(isset($_FILES) && count($_FILES)>0) move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . "/users/images/${id}.png");
    $new['name']=$_POST['name'];
    $new['username']=$_POST['username'];
    $new['email']=$_POST['email'];
    $new['phone']=$_POST['phone'];
    $new['website']=$_POST['website'];
    if(strlen($_POST['name'])>0 && strlen($_POST['username'])>0 && strlen($_POST['email'])>0 && strlen($_POST['website'])>0 && strlen($_POST['phone'])>0){
        updateUser($new, $id);
        header("location:index.php");
    }
    else echo "Please Fill all fields";
}



require_once 'partials/footer.php';
?>
