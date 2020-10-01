<?php
require_once __DIR__ . '/users/users.php';
        echo '<pre>';
        var_dump($_POST,$_FILES);
        echo '</pre>';
//        @todo validate all fields
// validate name
        $valid_name=True;
        if(isset($_POST['name']) && strlen($_POST['name'])>0){
            $name = $_POST['name'];
            $arr=explode(" ",$name);
            foreach ($arr as $word){
                if(ctype_lower($word[0])){
                    $valid_name = False;
                }
            }
        }
var_dump($valid_name);
// validate Username
        $valid_username=True;
        if(isset($_POST['username']) && strlen($_POST['username'])>0) {
            $username = $_POST['username'];
            foreach ($users as $user) {
                if ($user['username'] == $username && $id!=$user['id']) {
                        $valid_username=False;
                }
            }
        }
var_dump($valid_username);
// validate phone
        $valid_phone=True;
        if(isset($_POST['phone']) && strlen($_POST['phone'])>0){
            $phone=str_split($_POST['phone']);
            foreach ($phone as $c){
                if(!(is_numeric($c)||$c=='-'||$c=='x'||$c=='+'||$c=='('||$c==')'||$c==' '||$c=='.')) $valid_phone=false;
            }
        }
var_dump($valid_phone);
// validate website
        $valid_website=True;
        if(isset($_POST['website']) && strlen($_POST['website'])>0){
            $website=str_split($_POST['website']);
            $pos=strpos($_POST['website'],'.');
            if($pos==False || $pos==strlen($_POST['website'])-1 || $pos==0) $valid_website=False;
        }

var_dump($valid_website);
?>


<form action="./<?php echo $filename;?>" method="post" enctype="multipart/form-data">
    <pre>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <span>Name:</span><input type="text" name="name" <?php if($filename=="update.php")echo 'value="'.$new['name'].'"' ?>>
        <?php if(!$valid_name)echo "<p>* invlaid name</p>"; ?>
        <span>Username:</span><input type="text" name="username" <?php if($filename=="update.php")echo 'value="'.$new['username'].'"' ?>>
        <?php if(!$valid_username)echo "<p>* invlaid username</p>"; ?>
        <span>E-mail:</span><input type="email" name="email" <?php if($filename=="update.php")echo 'value="'.$new['email'].'"' ?>>
        <span>Phone:</span><input type="text" name="phone" <?php if($filename=="update.php")echo 'value="'.$new['phone'].'"' ?>>
        <?php if(!$valid_phone)echo "<p>* invlaid phone</p>"; ?>
        <span>Website:</span><input type="text" name="website" <?php if($filename=="update.php")echo 'value="'.$new['website'].'"' ?>>
        <?php if(!$valid_website)echo "<p>* invlaid website</p>"; ?>
        <input type="file" name="picture">
        <input type="submit">
    </pre>
</form>