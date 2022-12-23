<?php

require_once 'boot.php';

$rjwt = filter_input(INPUT_COOKIE, 'rjwt');
if ($rjwt) {
    $stmt = pdo()->prepare("DELETE FROM `refresh_token` WHERE `refresh_token` =?");

    $stmt->execute([$rjwt]);
}

setcookie('jwt','', 1);
setcookie('rjwt', '', 1);
header('Location: /');