<?php

require_once 'users/users.php';

$userId = (int)$_GET['id'];
$user = getUserById($userId);
$Name = isset($_GET['name'])?$_GET['name']:$user['name'];
$userName = isset($_GET['username'])?$_GET['username']:$user['username'];
$Email = isset($_GET['email'])?$_GET['email']:$user['email'];
$Phone = isset($_GET['phone'])?$_GET['phone']:$user['phone'];
$Website = isset($_GET['website'])?$_GET['website']:$user['website'];
require_once 'partials/header.php';
?>
    <form action="update.php" method="get">
        <div class="container">
            <h1>Update User at Row <?php echo $userId; ?></h1>
            <div>
                <div class="input-group-prepend">
                    <span>Name</span>
                </div><input type="text" class="form-control mb-3" name="name" value="<?php echo $Name;?>">
                <div class="input-group-prepend">
                    <span>Username</span>
                </div><input type="text" class="form-control mb-3" name="username" value="<?php echo $userName;?>">
                <div class="input-group-prepend">
                    <span>E-mail</span>
                </div><input type="text" class="form-control mb-3" name="email" value="<?php echo $Email;?>">
                <div class="input-group-prepend">
                    <span>Phone</span>
                </div><input type="text" class="form-control mb-3" name="phone" value="<?php echo $Phone;?>">
                <div class="input-group-prepend">
                    <span>Website</span>
                </div><input type="text" class="form-control mb-3" name="website" value="<?php echo $Website;?>">
                <input type="hidden" class="form-control" name="id" value="<?php echo $userId;?>">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" >update</button>
                </div>
            </div>
        </div>
    </form>
<?php
if(isset($_GET['name'])) {
    $user['name'] = $_GET['name'];
    updateUser($user, $userId);
}
if(isset($_GET['username'])) {
    $user['username'] = $_GET['username'];
    updateUser($user, $userId);
}
if(isset($_GET['email'])) {
    $user['email'] = $_GET['email'];
    updateUser($user, $userId);
}
if(isset($_GET['phone'])) {
    $user['phone'] = $_GET['phone'];
    updateUser($user, $userId);
}
if(isset($_GET['website'])) {
    $user['website'] = $_GET['website'];
    updateUser($user, $userId);
}
require_once 'partials/footer.php'; ?>