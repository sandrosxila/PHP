<?php

require_once 'users/users.php';

require_once 'partials/header.php';
$users=getUsers();
?>

<div class="container">
    <h3>Create new user</h3>
    <?php require __DIR__ . "/_form.php" ?>
</div>

<?php require_once 'partials/footer.php'; ?>
