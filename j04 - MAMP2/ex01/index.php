<?php
session_start();
if (!isset($_SESSION['log']))
{
    $_SESSION['log'] = TRUE;
    $_SESSION['user'] = "";
    $_SESSION['pass'] = "";
}
if (isset($_GET['submit']) && $_GET['submit'] === "OK")
{
    $_SESSION['user'] = (isset($_GET['login'])) ? $_GET['login'] : $_SESSION['user'];
    $_SESSION['pass'] = (isset($_GET['passwd'])) ? $_GET['passwd'] : $_SESSION['pass'];

}
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
?>
<html><body>
<form method="GET" action="./index.php">
        Identifiant: <input type="text" name="login" value="<?php echo $user; ?>" />
<br />
        Mot de passe: <input type="password" name="passwd" value="<?php echo $pass; ?>" />
<input type="submit" name="submit" value="OK" />
</form>
</body></html>