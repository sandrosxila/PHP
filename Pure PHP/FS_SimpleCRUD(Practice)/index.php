<?php
require_once __DIR__ . '/users/users.php';

$users = getUsers();
//echo '<pre>';
//var_dump($users);
//echo '</pre>';
require_once 'partials/header.php';
?>

<!--Generate table-->
<div class="container">
    <table>
        <thead>
            <th>Name</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Website</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['website']; ?></td>
                <td>
                    <a href="<?php echo '.\update.php?id='.$user['id']; ?>">Update</a>
                    <a href="<?php echo '.\view.php?id='.$user['id']; ?>">view</a>
                    <a href="<?php echo '.\delete.php?id='.$user['id'];; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <a href="<?php echo '.\create.php'; ?>" class="btn btn-success ">Create</a>
</div>
<!--/Generate table-->
<?php require_once 'partials/footer.php'; ?>

