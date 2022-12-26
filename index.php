
<?php
require_once 'boot.php';
require_once 'decodeJWT.php';
$user = null;


/*
if (chech_auth()) {
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` =:id");
    $stmt->execute(['id' => $_COOKIE['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
*/

$user = verifyCookieToken();

?>
<?php if (($user))  { ?>

    <h1>Welcome back, <?=htmlspecialchars($user->username)?>!</h1>

    <form class="mt-5" method="post" action="do_logout.php">
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>

<?php } else if (!$user)
{  header('Location: /login.php'); }

