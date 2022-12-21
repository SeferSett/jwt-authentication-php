<?php
require 'decodeJWT.php';

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
        $_SESSION['flash'] = $message;
    } else {
        if (!empty($_SESSION['flash'])) { ?>
        <div class="alert alert-danger mb-3">
            <?=$_SESSION['flash']?>
        </div>
        <?php }
        unset($_SESSION['flash']);
    }
}

function chech_auth(): bool{
    return !!($_SESSION['user_id'] ?? false);
}