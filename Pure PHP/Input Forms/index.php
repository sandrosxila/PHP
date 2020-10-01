<html>
<head>
    <title>PHP Forms</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
    var_dump($_POST);
    $c1 =isset($_POST['UserName'])?strlen($_POST['UserName']):-1 ;
    $c2 =isset($_POST['LastName'])?strlen($_POST['LastName']):-1 ;
    $c3 =isset($_POST['Email'])?strlen($_POST['Email']):-1;
    $c4=isset($_POST['Pass'])?strlen($_POST['Pass']):-1;
    if($c1*$c2*$c3*$c4==0) {
        if($c1==0||$c2==0||$c3==0||$c4==0) echo "PLEASE ENTER ALL FIELDS";
    }
?>
<body>
    <div class="container">
        <h1>Registration Form</h1>
        <form action="index.php" method="POST" style="border:solid darkgray 1px;padding:8px;border-radius:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <label>User Name</label>
            <input type="text" class="form-control input-group mb-3" name="UserName" placeholder="UserName">
            <label>Last Name</label>
            <input type="text" class="form-control input-group mb-3" name="LastName" placeholder="LastName">
            <label>Email address</label>
            <input type="email" class="form-control" placeholder="Enter email" name="Email">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="Pass">
            <?php if(isset($_POST['Pass'])==true && strlen($_POST['Pass'])<6 ||$c1+$c2+$c3+$c4>0 && strlen($_POST['Pass'])<6 ) print "<small style=\"display: block;\" class=\"text-danger\">Password is weak</small>"; ?>
            <button type="submit" class="btn btn-success" style="margin-top:20px;">Register</button>
            <?php
                if($c1>0 && $c2>0 && $c3>0 && $c4>=6){
                    $data=json_decode(file_get_contents('package.json'),1);
                    if(!array_key_exists($_POST['Email'],$data)){
                        $data[$_POST['Email']]=$_POST;
                        $data=json_encode($data,JSON_PRETTY_PRINT);
                        $file=fopen('package.json',"w");
                        fwrite($file,$data);
                        fclose($file);
                    }
                    else{
                        echo "<p class=\"text-danger\">Account Already Exists</p>";
                        //header('Location: '.$_SERVER["PHP_SELF"], true, 303);
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>
