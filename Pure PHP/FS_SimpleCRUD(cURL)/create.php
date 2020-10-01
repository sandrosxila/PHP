<?php
require_once 'users/users.php';
require_once 'partials/header.php';
$users = getUsers();
$id = $users[count($users)-1]['id']+1;
?>

<div class="container">
    <h1 style="margin-bottom: 30px;">create User</h1>
    <?php require_once __DIR__ .'/_form.php'; ?>
</div>

<?php
if($validName && $validUsername && $validEmail && $validPhone && $validWebsite && !empty($_POST)){
    createUser($_POST);
    $ch = curl_init();
    header("location:index.php");
}
require_once 'partials/footer.php';
?>
