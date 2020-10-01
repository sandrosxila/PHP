<?php
require_once 'users/users-from-mysql.php';
require_once 'partials/header.php';
$id = $_GET['id'];
$user = getUserById($id);
//echo '<pre>';
//var_dump($user);
//echo '</pre>';
?>
<div class="container">
    <dl>
        <?php foreach ($user as $key => $value): ?>
        <dt>
            <?php echo $key; ?>
        </dt>
        <dd>
            <?php echo $value; ?>
        </dd>
        <?php endforeach;?>
    </dl>
</div>


<?php require_once 'partials/footer.php'; ?>
