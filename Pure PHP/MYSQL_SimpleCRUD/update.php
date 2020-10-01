<?php

require_once 'users/users-from-mysql.php';
$users = getUsers();
if(isset($_GET['id']))$userId = $_GET['id'];
if(isset($_POST['id']))$userId = $_POST['id'];

$user = getUserById($userId);
require_once 'partials/header.php';
?>

    <div class="container">
        <h3>Update user: <?php echo $user['name'] ?></h3>
        <?php require __DIR__ . "/_form.php" ?>
    </div>

<?php require_once 'partials/footer.php'; ?>