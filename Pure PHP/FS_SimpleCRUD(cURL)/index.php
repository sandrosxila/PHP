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
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>action</th>
        </thead>
        <tbody>

            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['phone'] ?></td>
                    <td><?php echo $user['website'] ?></td>
                    <td>
                        <a href="./update.php?id=<?php echo $user['id'] ?>" class="btn btn-success">update</a>
                        <a href="./view.php?id=<?php echo $user['id'] ?>" class="btn btn-primary">view</a>
                        <a href="./delete.php?id=<?php echo $user['id'] ?>" class="btn btn-danger">delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <a href="./create.php" class="btn btn-secondary">Create</a>
</div>
<!--/Generate table-->
<?php require_once 'partials/footer.php'; ?>

