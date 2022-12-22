<?php
require_once 'decodeJWT.php';

function pdo(): PDO {
    static $pdo;

    if (!$pdo) {
        $config = require 'config.php';
        $dsn = 'mysql:dbname='.$config['db_name'].';host='.$config['db_host'];
        $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}
function flash (?string $message = null){
    if ($message) {
        $_COOKIE['flash'] = $message;
    } else {
        if (!empty($_COOKIE['flash'])) { ?>
        <div class="alert alert-danger mb-3">
            <?=$_COOKIE['flash']?>
        </div>
        <?php }
        unset($_COOKIE['flash']);
    }
}

function chech_auth(): bool{
    return !!($_COOKIE['user_id'] ?? false);
}