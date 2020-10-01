<?php
require_once __DIR__ . '/users/users.php';

$users = getUsers();
require_once 'partials/header.php';
?>

<!--Generate table-->
<div class="container">
    <br>
    <div class="table-responsive-xl">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user):?>
                <tr>
                    <td><?php echo $user['name'];?></td>
                    <td><?php echo $user['username'];?></td>
                    <td><?php echo $user['email'];?></td>
                    <td><?php echo $user['phone'];?></td>
                    <td>
                        <a target="_blank" href="<?php echo "https://".$user['website'];?>">check out this Website</a>
                    </td>
                    <td style="white-space: nowrap">
                            <a target="_blank" href="view.php?id=<?php echo $user['id'];?>">
                                <button type="button" class="btn btn-outline-primary btn-sm">
                                    View
                                </button>
                            </a>
                            <a target="_blank" href="update.php?id=<?php echo $user['id'];?>">
                                <button type="button" class="btn btn-outline-success btn-sm">
                                Update
                                </button>
                            </a>
                            <a href="delete.php?id=<?php echo $user['id'];?>">
                                <button type="button" class="btn btn-outline-danger btn-sm">
                                    Delete
                                </button>
                            </a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>

        </table>
    </div>
    <br>
    <p>
        <a target="_blank" href="create.php" class="btn btn-success">Create</a>
    </p>
</div>

<?php require_once 'partials/footer.php'; ?>

