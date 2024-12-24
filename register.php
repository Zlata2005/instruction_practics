<?php
if (isset(['registration'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (!$login || !$password)
    {
        $error = 'Вы не ввели логин или пароль';
    }
    if (!$error) {
        $query = "INSERT INTO `users` (`id`, `login`, `password`) VALUES (NULL, '$login', '$password');";
        mysqli_query($link, $query);
        echo 'Вы успешно создали пользователя';
    } else {echo $error; exit;}
}
?>