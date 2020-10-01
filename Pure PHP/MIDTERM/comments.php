<?php
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'https://jsonplaceholder.typicode.com/comments');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$commentdata = curl_exec($ch);
$commentdata = json_decode($commentdata,1);
curl_close($ch);
$id=$_GET['id'];
$person;
$data = [];
foreach ($commentdata as $c){
    if($c['postId']==$id){
        array_push($data,$c);
    }
}
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
    <table>
        <thead>
            <tr>
                <th width="300px;">
                    Comments For post#<?php echo $id?>
                </th>
            </tr>
            <tr>
                <th>
                    ID
                </th>

                <th>
                    Name
                </th>

                <th>
                    Email
                </th>

                <th>
                    Body
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $value):?>
            <tr>
                <td><?php echo $value['id'];?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['email'];?></td>
                <td><?php echo $value['body'];?></td>
            </tr>

            <?php endforeach;?>
        </tbody>
    </table>
</div>
