<?php

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'https://jsonplaceholder.typicode.com/users');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$userdata = curl_exec($ch);
$userdata = json_decode($userdata,1);
curl_close($ch);
$id=$_GET['id'];
$person;
foreach ($userdata as $user){
    if($user['id']==$id){
        $person=$user;
    }
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<table class="table">
  <thead>
    <tr>
      <th scope="col">View User <?php echo $person['name'];?></th>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td >Name</td>
            <td><?php echo $person['name'];?></td>
        </tr>
        <tr>
            <td >Username</td>
            <td><?php echo $person['username'];?></td>
        </tr>
        <tr>
            <td >Email</td>
            <td><?php echo $person['email'];?></td>
        </tr>
        <tr>
            <td >Street</td>
            <td><?php echo $person['address']['street'];?></td>
        </tr>
        <tr>
            <td >City</td>
            <td><?php echo $person['address']['city'];?></td>
        </tr>
        <tr>
            <td >ZipCode</td>
            <td><?php echo $person['address']['zipcode'];?></td>
        </tr>
        <tr>
            <td >Website</td>
            <td><?php echo $person['website'];?></td>
        </tr>
  </tbody>
</table>