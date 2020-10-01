<?php
require_once 'users/users.php';
require_once 'partials/header.php';
$id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
$user = getUserById($id);
?>

<div class="container">
    <h1 style="margin-bottom: 30px;">Update User <?php echo $id; ?></h1>
    <?php require_once __DIR__ .'/_form.php'; ?>
</div>

<?php
if($validName && $validUsername && $validEmail && $validPhone && $validWebsite && !empty($_POST)){
    updateUser($_POST,$id);
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'http://localhost:8080/API_For_Curl(CRUD)/index.php');
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,array(
        'tmp_name'=>$_FILES['picture']['tmp_name'],
        'filename'=>$id,
        'type'=>$_FILES['picture']['type']
    ));
    curl_exec($ch);
    curl_close($ch);
    header("location:index.php");
}
require_once 'partials/footer.php';
?>
