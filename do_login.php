<?php
require_once 'decodeJWT.php';
require_once 'boot.php';


$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");
$stmt->execute(['username' => $_POST['login']]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$user or !password_verify($_POST['password'], $user['password'])) {
    flash('Пользователь с такими данными не зарегистрирован');
    header('Location: login.php');
    die;
}
unset($user['password']);

$user['iat'] = time();
$key = 1234567;
$token = createTokenHS256($user,$key);
setcookie('jwt', $token, time()+3600);
$refreshToken = createRefreshToken();
setcookie('rjwt', $refreshToken, time()+10800);
 header('Location: index.php');





/*
if (password_verify($_POST['password'], $user['password'])){

    if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
        $newHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = pdo()->prepare("UPDATE `users` SET `password` = :password WHERE `username` = :username");
        $stmt->execute([
            'username' => $_POST['username'],
            'password' => $newHash,
        ]);
    }
    $_SESSION['user_id'] = $user['id'];
    header('Location: /');
    die;
}
flash('Пароль неверен');
header('Location: login.php');

*/