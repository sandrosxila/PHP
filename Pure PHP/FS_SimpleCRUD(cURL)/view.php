<?php
require_once 'users/users.php';
require_once 'partials/header.php';
$user = getUserById($_GET['id']);
?>
<div class="container">
    <dl>
        <dt>Name</dt>
        <dd><?php echo $user['name']; ?></dd>
        <dt>Username</dt>
        <dd><?php echo $user['username']; ?></dd>
        <dt>E-mail</dt>
        <dd><?php echo $user['email']; ?></dd>
        <dt>Phone</dt>
        <dd><?php echo $user['phone']; ?></dd>
        <dt>Website</dt>
        <dd><?php echo $user['website']; ?></dd>
    </dl>
</div>
<?php require_once 'partials/footer.php'; ?>
