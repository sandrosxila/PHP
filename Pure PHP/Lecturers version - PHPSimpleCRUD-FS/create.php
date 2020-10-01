<?php
include 'partials/header.php';
require __DIR__ . '/users/users.php';


// ვქმნით ცარიელ იუზერს რომელიც საჭიროა _form.php ში.
// დააკომენტარეთ ამ ცვლადის გამოცხადება და ნახეთ რა მოხდება
$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

// ვქმნით ცარიელ ერორების ცვლადს რომელიც საჭიროა _form.php ში.
// დააკომენტარეთ ამ ცვლადის გამოცხადება და ნახეთ რა მოხდება
$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];
$isValid = true;

// ვამოწმებთ, თუ ფორმა დასაბმითდა
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    // ვახდენთ იუზერის ვალიდაციას
    $isValid = validateUser($user, $errors);

    // თუ ვალიდაცია წარმატებით დასრულდა...
    if ($isValid) {
        // ვქმნით ახალ იუზერს
        $user = createUser($_POST);

        // ვქვირთავთ სურათს
        uploadImage($_FILES['picture'], $user);

        // იუზერი გადაგვყავს index.php გვერდზე
        header("Location: index.php");
    }

    // თუ ვალიდაცია არ დასრულდა წარმატებით მაშინ $errors ცვლადში ჩაიწერებოდა ერორები validateUser ფუნქციის მიერ
    // რომელიც უკვე გამოჩნდება _form.php-ში. ნახეთ _form.php.
}

?>

<?php include '_form.php' ?>

