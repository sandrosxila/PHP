<?php

$ch=curl_init();

curl_setopt($ch,CURLOPT_URL,'https://jsonplaceholder.typicode.com/posts');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
$response = json_decode($response,1);
curl_close($ch);
//echo "<pre>";
//var_dump($response);
//echo "</pre>";
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container">
    <table>
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Post</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach($response as $user): ?>
                <tr>
                    <td><?php echo $user['id'];?></td>
                    <td><?php echo $user['title'];?></td>
                    <td><?php echo $user['body'];?></td>
                    <td style="width:240px;">
                        <a href="./user-details.php?id=<?php echo $user['userId'];?>" class="btn btn btn-info">User Details</a>
                        <a href="./comments.php?id=<?php echo $user['userId'];?>" class="btn btn-dark">Comments</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
