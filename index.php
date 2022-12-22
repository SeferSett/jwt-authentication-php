
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
if (verifyCookieToken()) {

}
?>
<?php if ($user) { ?>

    <h1>Welcome back, <?=htmlspecialchars($user['username'])?>!</h1>

    <form class="mt-5" method="post" action="do_logout.php">
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>

<?php } else { ?>
<h1 class="mb-5">Registration</h1>
<?php flash(); ?>
<form method="post" action="do_register.php">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php } ?>