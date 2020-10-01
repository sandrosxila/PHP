<?php
require_once __DIR__ . '/users/from-json-to-mysql.php';
$users = getUsers();
//echo '<pre>';
//var_dump($users);
//echo '</pre>';
require_once 'partials/header.php';
?>

<!--Generate table-->
<div class="container">
    <br>
    <br>
    <p>
        <a href="create.php" class="btn btn-primary">Create</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['username'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td>
                    <a target="_blank" href="http://<?php echo $user['website'] ?>">
                        Checkout his website
                    </a>
                </td>
                <td style="white-space: nowrap">
                    <a class="btn btn-sm btn-outline-primary" href="view.php?id=<?php echo $user['id'] ?>">View</a>
                    <a class="btn btn-sm btn-outline-info" href="update.php?id=<?php echo $user['id'] ?>">Update</a>
                    <a class="btn btn-sm btn-outline-danger" href="delete.php?id=<?php echo $user['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!--/Generate table-->
<?php require_once 'partials/footer.php'; ?>

