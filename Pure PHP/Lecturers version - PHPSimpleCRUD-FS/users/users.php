<?php

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function createUser($data)
{
    $users = getUsers();

    $data['id'] = rand(1000000, 2000000);

    $users[] = $data;

    putJson($users);

    return $data;
}

function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

function deleteUser($id)
{
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
    }

    putJson($users);
}

function uploadImage($file, $user)
{
    // ვამოწმებთ ფაილი გადმოეცა თუ არა და აქვს თუ არა name ფროფერთი
    if (isset($file) && $file['name']) {
        // შემდეგ ვამოწმებთ არსებობს თუ არა images დირექტორია და თუ არ არსებობს ვქმნით
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        // შემდეგი 3 ხაზი კოდი ეკუთვნის extension-ის ამოღებას ფაილიდან
        // ვიღებს ფაილის დასახელებას
        $fileName = $file['name'];
        // ვპოულობთ წერტილის პოზიციას
        $dotPosition = strpos($fileName, '.');
        // და ვიღებთ ქვესტრინგს წერტილის შემდეგ ბოლომდე
        $extension = substr($fileName, $dotPosition + 1);

        // სურათის ატვირთვის მომენტში ვუთითებთ რეალურ extension-ს
        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${user['id']}.$extension");

        // და extension-ს ვინახავთ JSON-ში რომელიც გამოიყენება შემდეგ უკვე index.php-ში
        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}

function putJson($users)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

/**
 * ფუნქცია იღებ იუზერს და ერორების მასივს არგუმენტად და ერორების მასივში წერს ერორების თუ იუზერის რომელიმე
 * ფროფერთი ვერ გაივლის ვალიდაციას. ამ შემთხვევაში ფუნქცია აბრუნებს false. თუ ყველაფერმა გაიარა ვალიდაცია
 * ფუნქცია აბრუნებს true
 *
 * @author Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @param $user
 * @param $errors
 * @return bool
 */
function validateUser($user, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }
    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
        $isValid = false;
        $errors['username'] = 'Username is required and it must be more than 6 and less then 16 character';
    }
    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'This must be a valid email address';
    }

    if (!filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = 'This must be a valid phone number';
    }
    // End Of validation

    return $isValid;
}