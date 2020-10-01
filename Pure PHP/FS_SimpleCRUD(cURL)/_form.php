<?php
require_once __DIR__ . '/users/users.php';
//echo '<pre>';
//var_dump($_POST,$_FILES);
//echo '</pre>';
//        @todo validate all fields
$validName = TRUE;
if(isset($_POST['name'])){
    $arr = explode(' ',$_POST['name']);
    foreach ($arr as $word){
        if(ctype_lower($word[0])){$validName=FALSE;break;}
    }
    if(empty($_POST['name']))$validName=FALSE;
}
$validUsername = True;
if(isset($_POST['username'])){
    $data = getUsers();
    foreach($data as $p){
        if($p['id']!=$id && $p['username']==$_POST['username']){
            $validUsername=False;
        }
    }
    if(empty($_POST['username']))$validUsername=FALSE;
}
$validEmail = isset($_POST['email'])?filter_var($_POST['email'],FILTER_VALIDATE_EMAIL):TRUE;
$validPhone = True;
if(isset($_POST['phone'])){
    $arr=str_split($_POST['phone']);
    foreach ($arr as $c){
        if(!(is_numeric($c) || $c=='+' || $c=='-' || $c==' ' || $c=='.' || $c=='x'))$validPhone=False;
    }
    if(empty($_POST['phone']))$validPhone=FALSE;
}
$validWebsite = isset($_POST['website'])?filter_var($_POST['website'],FILTER_VALIDATE_DOMAIN):TRUE;
?>

<form action="<?php echo basename($_SERVER["PHP_SELF"])."?id=".$id; ?>" method="POST" enctype="multipart/form-data">

    <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="name" value="<?php if(isset($user['name']))echo $user['name']; ?>">
            <?php if(!$validName) echo "<p class=\"danger\">Invalid Name</p>" ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="username" value="<?php if(isset($user['username']))echo $user['username']; ?>">
            <?php if(!$validUsername) echo "<p class=\"danger\">Username you entered is empty or Already Exists</p>" ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="email" value="<?php if(isset($user['email']))echo $user['email']; ?>">
            <?php if(!$validEmail) echo "<p class=\"danger\">Invalid Email</p>" ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input class="form-control" name="phone" type="text" value="<?php if(isset($user['phone']))echo $user['phone']; ?>">
            <?php if(!$validPhone) echo "<p class=\"danger\">Invalid Phone</p>" ?>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Website</label>
        <div class="col-sm-10">
            <input class="form-control" name = "website" type="text" value="<?php if(isset($user['website']))echo $user['website']; ?>">
            <?php if(!$validName) echo "<p class=\"danger\">Invalid Website</p>" ?>
        </div>
    </div>

    <div class="form-group">
        <label>Upload Image</label>
        <div class="input-group">
        <span class="input-group-btn">
            <span class="btn btn-default btn-file">
                Browse… <input type="file" name="picture">
            </span>
        </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload'/>
    </div>

    <div class="form-group row">
        <div class="col-sm-10 ">
            <input class="btn btn-dark" type="submit">
        </div>
    </div>
</form>