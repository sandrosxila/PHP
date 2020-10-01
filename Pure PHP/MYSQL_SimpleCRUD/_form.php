<?php
//        echo '<pre>';
//        var_dump($_POST, $_FILES);
//        echo '</pre>';
//        @todo validate all fields
$valid_name=TRUE;
if (isset($_POST['name'])) {
    if(trim($_POST['name'])==' '||$_POST['name']=='')$valid_name=FALSE;
    if (!empty($_POST['name'])) {
        $a = explode(' ', trim($_POST['name']));
        foreach ($a as $word) {
            if (ctype_lower($word[0])) $valid_name = FALSE;
        }
    }

}
//var_dump($valid_name);
$valid_username=TRUE;
if(isset($_POST['username']) && (bool)strpos($_SERVER["PHP_SELF"],"/create.php")){
    if(trim($_POST['username'])==' '||$_POST['username']=='')$valid_username=FALSE;
    if(!empty($_POST['username'])){
        foreach($users as $usr){
            if($usr['username']==$_POST['username'])$valid_username=FALSE;
        }
    }
    //var_dump($valid_username,(bool)strpos($_SERVER["PHP_SELF"],"/update.php"));
}
if(isset($_POST['username']) && (bool)strpos($_SERVER["PHP_SELF"],"/update.php")){
    if(trim($_POST['username'])==' '||$_POST['username']=='')$valid_username=FALSE;
    if(!empty($_POST['username'])){
        foreach($users as $usr){
            if($usr['username']==$_POST['username'] && $usr['id']!=$userId)$valid_username=FALSE;
        }
    }
}
//var_dump($valid_username);
$valid_phone=TRUE;
if(isset($_POST['phone'])){
    if(trim($_POST['phone'])==' '||$_POST['phone']=='')$valid_phone=FALSE;
    for($i=0;$i<strlen($_POST['phone']);$i++){
        if (!(is_numeric($_POST['phone'][$i]) ||  $_POST['phone'][$i]=='-' || $_POST['phone'][$i]=='x' || $_POST['phone'][$i]=='.' || $_POST['phone'][$i]==' '|| $_POST['phone'][$i]=='+'))$valid_phone=FALSE;
    }
    $string = str_replace(' ', '', $_POST['phone']);
    if(strlen($string)==0)$valid_phone=false;
}
//var_dump($valid_phone);
$valid_website=TRUE;
if(isset($_POST['website'])){
    if(trim($_POST['website'])==' '||$_POST['website']=='')$valid_website=FALSE;
    if(!((bool)strpos($_POST['website'],".")==true && strpos($_POST['website'],".")<strlen($_POST['website'])-1))$valid_website=FALSE;
}
//var_dump($valid_website,strpos($_POST['website'],"."));
// When validation passes

//@todo Save user in JSON or update depending if $_POST['id'] exists or not
if (isset($_POST['id']) && $_POST['id']!='') {
    if($valid_name && $valid_username && $valid_phone && $valid_website) {
        $user['name']=$_POST['name'];
        $user['username']=$_POST['username'];
        $user['phone']=$_POST['phone'];
        $user['website']=$_POST['website'];
        $userId = $_POST['id'];
        updateUser($user, $userId);
    }
}
if (isset($_POST['id']) && $_POST['id']=='') {
    if($valid_name && $valid_username && $valid_phone && $valid_website) {
        $userId = createUser($_POST);
    }
}
if (!empty($_FILES)) {
    //@todo Save uploaded file
    if($valid_name && $valid_username && $valid_phone && $valid_website) {
        move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . "/users/images/${userId}.png");
    }
}

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['website']) && isset($_POST['email']) && $valid_name && $valid_username && $valid_phone && $valid_website )header('Location: index.php');

?>

<form action="update.php" method="POST" enctype="multipart/form-data">
    <!--    Hidden field for saving id and submitting it to determine if we need to create user or updated it-->
    <!--    @todo Finish form-->
    <input type="hidden" name="id"
           value="<?php echo isset($user['id']) ? $user['id'] : '' ?>">
    <div class="form-group">
        <label>Name</label>
        <input name="name"
               value="<?php echo isset($user['name']) ? $user['name'] : '' ?>" class="form-control">
        <?php if (!$valid_name) echo "<p class='text-danger'>Enter Valid Name</p>" ?>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input name="username"
               value="<?php echo isset($user['username']) ? $user['username'] : '' ?>" class="form-control">
        <?php if (!$valid_username) echo "<p class='text-danger'>username you entered already exists</p>" ?>
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input name="email" type="email"
               value="<?php echo isset($user['email']) ? $user['email'] : '' ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input name="phone"
               value="<?php echo isset($user['phone']) ? $user['phone'] : '' ?>" class="form-control">
        <?php if (!$valid_phone) echo "<p class='text-danger'>Enter Valid Phone</p>" ?>
    </div>
    <div class="form-group">
        <label>Website</label>
        <input name="website"
               value="<?php echo isset($user['website']) ? $user['website'] : '' ?>" class="form-control">
        <?php if (!$valid_website) echo "<p class='text-danger'>Enter Valid Website</p>" ?>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input name="picture" type="file" class="form-control-file">
    </div>

    <button class="btn btn-success">Submit</button>
</form>
