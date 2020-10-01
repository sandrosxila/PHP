<?php
require_once 'users/users.php';
$users = getUsers();
    $valid=TRUE;
    if(isset($_GET['name']) && strlen($_GET['name'])==0){
        $valid=FALSE;
    }
    if(isset($_GET['username']) && strlen($_GET['username'])==0){
        $valid=FALSE;
    }
    if(isset($_GET['email']) && strlen($_GET['email'])==0){
        $valid=FALSE;
    }
    if(isset($_GET['phone']) && strlen($_GET['phone'])==0){
        $valid=FALSE;
    }
    if(isset($_GET['website']) && strlen($_GET['website'])==0){
        $valid=FALSE;
    }
require_once 'partials/header.php';
?>
<div class="container">
    <h1>Add User</h1>
    <form action="create.php" method="GET">
        <div class="input-group">
            <div class="input-group-prepend mb-3">
                <span class="input-group-text">Name</span>
            </div>
            <input type="hidden" class="form-control" name="id" value="<?php echo (int)count($users)+1;?>">
            <input type="text" class="form-control" name="name">
        </div>
        <div class="input-group">
            <div class="input-group-prepend mb-3">
                <span class="input-group-text">Username</span>
            </div>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="input-group">
            <div class="input-group-prepend mb-3">
                <span class="input-group-text">Email</span>
            </div>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="input-group">
            <div class="input-group-prepend mb-3">
                <span class="input-group-text">Phone</span>
            </div>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="input-group">
            <div class="input-group-prepend mb-3">
                <span class="input-group-text">Website</span>
            </div>
            <input type="text" class="form-control" name="website">
        </div>
        <input type="submit" class="btn btn-success mb-3" value="Create">
        <?php if(!$valid)echo "<span class=\"text-danger ml-4\">Please Fill all fields</span>";?>
    </form>
</div>
<?php
    if(isset($_GET['name']) && $valid && isset($_GET['username']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['website'])){
        $_GET['id']=(int)$_GET['id'];
        createUser($_GET);
    }
?>
