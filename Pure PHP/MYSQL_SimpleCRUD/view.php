<?php
require_once 'users/users-from-mysql.php';
require_once 'partials/header.php';

$userId = $_GET['id'];
$user = getUserById($userId);

//echo '<pre>';
//var_dump($user);
//echo '</pre>';
?>

<div class="container">
    <?php if ($user): ?>
        <dl>
            <dt>Name:</dt>
            <dd><?php echo $user['name'] ?></dd>
            <dt>Username:</dt>
            <dd><?php echo $user['username'] ?></dd>
            <dt>Email:</dt>
            <dd><?php echo $user['email'] ?></dd>
        </dl>
    <?php else: ?>
        <div class="alert alert-warning">
            <h3>User was not found</h3>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'partials/footer.php'; ?>
