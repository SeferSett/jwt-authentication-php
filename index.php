
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

<?php } else if (!$user) { ?>
<h1 class="mb-5">Login</h1>
<?php flash(); ?>
    <form method="post" action="do_login.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-outline-primary" href="register.php">Register</a>
        </div>
    </form>

<?php } ?>